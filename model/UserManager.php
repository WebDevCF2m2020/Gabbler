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
                }else{
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
        var_dump($user);
        $cryptPassword = $this->cryptPassword($user->getPwdUser());
        $signUpValidationKey = $this->signUpValidationKey();

        $sql = "INSERT INTO user (nickname_user, pwd_user, mail_user, color_user, confirmation_key_user) VALUES (?,?,?,?,?)";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute([
                $user->getNicknameUser(),
                $cryptPassword,
                $user->getMailUser(),
                '{"background":"#f6f6f6","color":"#505352"}',
                $signUpValidationKey
            ]);
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
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

}
