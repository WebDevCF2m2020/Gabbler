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

    // Checks the user's connection in the DB and retrieves the necessary parameters to create the session
    public function signIn(User $user): array {

        // call $this->verifyPassword()
        // call $this->createSession()
    }

    // Disconnecting from the session
    public static function signOut(User $user): bool {

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
    public function signUp(User $user): array {

        // call $this->cryptPassword()
        // call $this->signUpValidationKey()
    }

    // When clicking from the mailbox with a confirmation link containing its nickname_user and its unique key, the validation field is updated by mail
    public function registrationUpdateUser(string $userName, string $validateKey): bool {
        
    }

    // Create the session with the values coming from signIn ()
    protected function createSession(array $datas): bool {
        
    }

    // Allows you to create a random character string of up to 60 characters
    protected function signUpValidationKey(): string {
        
    }

    // crypt password with password_hash
    protected function cryptPassword(string $pwd): string {
        
    }

    // verify password crypted (password_hash) with password_verify
    protected function verifyPassword(string $cryptPwd, string $pwd): bool {
        
    }

}
