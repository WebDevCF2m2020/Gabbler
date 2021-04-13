<?php

class UserManager extends ManagerTableAbstract implements ManagerTableInterface
{

    //put your query for selected all datas in this table
    public function selectAll(): array
    {
        $sql = "SELECT * FROM user;";
        $query = $this->db->query($sql);
        // if we have at least one result
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // else an empty array
        return [];
    }

    // To fetch the datas for the sign up mail
    public function selectUserDataSignUp(string $email): array {
        $sql="SELECT nickname_user, confirmation_key_user FROM user WHERE mail_user = ? ;
        ";
        $request = $this->db->prepare($sql);
        $request->execute([$email]);
        // if there is a result
        if($request->rowCount()){
            return $request->fetch(PDO::FETCH_ASSOC);
        }
        // if not
        return [];
    }

    public function signInRightVerification(User $user): string {
        $sql = "SELECT user.nickname_user, user.validation_status_user, user_right.date_authorized_user_right, status.id_status
	      FROM user
	      LEFT JOIN user_right ON user.id_user = user_right.fkey_user_id
	      LEFT JOIN status ON status.id_status = user_right.fkey_status_id
	      WHERE user.nickname_user = ? ;";
        $req = $this->db->prepare($sql);
        $req->bindValue(1,$user->getNicknameUser(),PDO::PARAM_STR);
        try{
            $req->execute();
            if($req->rowCount()){
                $userInfo = $req->fetch(PDO::FETCH_ASSOC);
                if ($userInfo['validation_status_user'] == 1 ){
                    return "You will have to confirm your email address before trying to sign in";
                } else if ($userInfo['id_status'] == 3){
                    return "You have been banned.";
                } else if ($userInfo['id_status'] == 2 && $userInfo['date_authorized_user_right'] > date('Y/m/d G:i:s',time())){
                    return "You're suspended";
                } else {
                    return "";
                }
            }else{
                return "Something went wrong, please retry";
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    // Checks the user's connection in the DB and retrieves the necessary parameters to create the session
    public function signIn(User $user): bool {
        $query = "SELECT u.*, r.*
	      FROM user u
	      LEFT JOIN role_has_user h ON u.id_user = h.role_has_user_id_user
	      LEFT JOIN role r ON r.id_role = h.role_has_user_id_role
	      WHERE u.nickname_user = ? ;";
        $req = $this->db->prepare($query);
        $req->bindValue(1,$user->getNicknameUser(),PDO::PARAM_STR);
        try{
            $req->execute();
            if($req->rowCount()){
                $connectUser = $req->fetch(PDO::FETCH_ASSOC);
                if($this->verifyPassword($connectUser['pwd_user'], $user->getPwdUser())){
                    $this->createSession($connectUser);
                    return true;
                } else {
                    return false;
                }
            }else{
                return false;
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }


        // call $this->verifyPassword()
        // call $this->createSession()
    }
    // Disconnecting from the session

    public static function signOut(): bool {

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        return true;

    }

    // Allows you to create a new user, if inserted, an email must be sent to him with a confirmation link containing his id and his unique key
    public function signUp(User $user): bool
    {
        $cryptPassword = $this->cryptPassword($user->getPwdUser());
        $signUpValidationKey = $this->signUpValidationKey();
        $imgRandom = rand(1, 10);

        // USER
        $sqlUser = "INSERT INTO user (nickname_user, pwd_user, mail_user, color_user, confirmation_key_user) VALUES (?,?,?,?,?)";
        $prepareUser = $this->db->prepare($sqlUser);
        // USER ROLE
        $sqlRoleUser = "INSERT INTO `role_has_user` (role_has_user_id_role, role_has_user_id_user) VALUES (? , ? )";
        $prepareRoleUser = $this->db->prepare($sqlRoleUser);
        // IMG
        $sqlImgUser =  "INSERT INTO `user_has_img` (user_has_img_id_user, user_has_img_id_img) VALUES ( ? , ? )";
        $prepareImgUser = $this->db->prepare($sqlImgUser);
        // USER RIGHT
        $sqlRightUser ="INSERT INTO `user_right` (fkey_status_id, fkey_user_id) VALUES (? , ? )";
        $prepareRightUser = $this->db->prepare($sqlRightUser);
        try {
            $this->db->beginTransaction();

            $prepareUser->execute([
                $user->getNicknameUser(),
                $cryptPassword,
                $user->getMailUser(),
                '{"background":"#f6f6f6","color":"#505352"}',
                $signUpValidationKey
            ]);

            $idUser = $this->db->lastInsertId();

            $prepareRoleUser->execute([3, $idUser]);

            $prepareImgUser->execute([$idUser, $imgRandom]);

            $prepareRightUser->execute([4, $idUser]);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            $this->db->rollBack();
            return false;
        }
    }

    // When clicking from the mailbox with a confirmation link containing its nickname_user and its unique key, the validation field is updated by mail

    public function registrationUpdateUser(string $nickname, string $confirmationKey): bool {
        $query = "UPDATE user SET validation_status_user = 2 WHERE nickname_user = ? AND confirmation_key_user = ?;";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1,$nickname, PDO::PARAM_STR);
        $prepare->bindValue(2,$confirmationKey,PDO::PARAM_STR);
        return $prepare->execute();

    }

    // Create the session with the values coming from signIn ()
    protected function createSession(array $datas): bool
    {
        unset($datas['pwd_user']);
        $_SESSION = $datas;
        $_SESSION['session_id'] = session_id();
        return true;
    }

    // Allows you to create a random character string of up to 60 characters

    protected function signUpValidationKey(): string {
        return md5(microtime(TRUE) * 100000);
    }
      
    // crypt password with password_hash
    protected function cryptPassword(string $pwd): string {
        return password_hash($pwd,PASSWORD_DEFAULT);
    }

    // verify password crypted (password_hash) with password_verify
    protected function verifyPassword(string $cryptPwd, string $pwd): bool {
        return password_verify($pwd,$cryptPwd);


    }

    // verify if the nickname or email is already used
    public function verifyExistence(string $nickname, string $email) : int {
        $query = "SELECT * FROM user WHERE nickname_user = ? OR mail_user = ?;";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1,$nickname, PDO::PARAM_STR);
        $prepare->bindValue(2,$email,PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->rowCount();
    }

    // Select on the new user for SwiftMailer
    public function selectConfirmationKey(string $nickname) : array {
        $query = "SELECT confirmation_key_user FROM user WHERE nickname_user = ?;";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1,$nickname, PDO::PARAM_STR);
        $prepare->execute();
        if($prepare->rowCount()){
            return $prepare->fetch(PDO::FETCH_ASSOC);
        }
        return [];
    }

}
