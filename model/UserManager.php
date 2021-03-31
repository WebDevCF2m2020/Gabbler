<?php

class UserManager extends ManagerTableAbstract implements ManagerTableInterface {

    //put your query for selected all datas in this table
    public function selectAll(): array {
        $sql = "SELECT * FROM user;";
        $query = $this->db->query($sql);
        // if we have at least one result
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // else an empty array
        return [];
    }

    // checks the user's connection in the DB and retrieves the necessary parameters to create the session
    public function signIn(User $user): array {
        $query = "SELECT u.`nickname_user`,u.`pwd_user` 
	FROM user u
	LEFT JOIN role_has_user h ON u.id_user = h.role_has_user_id_user
	LEFT JOIN role r ON r.id_role = h.role_has_user_id_role
	WHERE nickname_user = ? AND pwd_user = ? ;";
        $req = $this->db->prepare($query);
        $req->bindValue(1,$user-getNicknameUser(),PDO::PARAM_STR);
        $req->bindValue(2,$user->getPwdUser(),PDO::PARAM_STR);
        try{
            $req->execute();
            if($req->rowCount()){
                $_SESSION = $req->fetch(PDO::FETCH_ASSOC);
                $_SESSION['sessionId'] = session_id();
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }
    // Disconnecting from the session
    public static function signOut(User $user): bool {
        
    }

    // Create the session with the values coming from signIn ()
    protected function createSession(array $datas): bool {
        
    }

}
