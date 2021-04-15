<?php

//User right managing class.
class UserRightManager extends ManagerTableAbstract implements ManagerTableInterface
{

    //Fetch all user_right content.
    public function selectAll(): array
    {
        $sql = "SELECT * FROM user_right;";
        $query = $this->db->query($sql);
        //If there's something to fetch, the sent back data wil be in associative array form.
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        //If not returns an empty array!! 
        return [];
    }

    public function newUserRight(int $idUser): bool
    {
        $sql = "INSERT INTO user_right (date_authorized_user_right, fkey_status_id, fkey_user_id) VALUES (?,?,?)";
        $prepare = $this->db->prepare($sql);

        $newDate = new DateTime();

        // test if the request works
        try {
            $prepare->execute([
                $newDate->format("Y-m-d H:i:s"),
                1,
                $idUser
            ]);
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }

    public function updateUserRight(UserRight $datas): bool
    {
        $query = "UPDATE user_right SET date_authorized_user_right = ?, fkey_status_id = ?  WHERE fkey_user_id = ?";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1, $datas->getDateAuthorizedUserRight(), PDO::PARAM_STR);
        $prepare->bindValue(2, $datas->getFkeyStatusId(), PDO::PARAM_INT);
        $prepare->bindValue(3, $datas->getFkeyUserId(), PDO::PARAM_INT);
        return $prepare->execute();
    }

    public function viewUserRight(int $idUser): array
    {
        $sql = "SELECT * FROM user_right WHERE fkey_user_id = ?";
        $prepare = $this->db->prepare($sql);

        // test if the request works
        try {
            $prepare->execute([$idUser]);
            // The return when there is one result
            if ($prepare->rowCount()) {
                return $prepare->fetch(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return [];
        }
    }

    public function mailUserRight(User $user, UserRight $right): bool
    {
        // TODO
    }

    public function verifyDateAuthorizedStatus(int $idUser): bool
    {
        $dateVerify = $this->viewUserRight($idUser);
        $dateActualy = new DateTime();

        if ($dateVerify['date_authorized_user_right'] > $dateActualy->format("Y-m-d H:i:s")) {
            return true;
        }
        return false;
    }

}