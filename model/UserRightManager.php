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

    }

    public function updateUserRight(UserRight $datas): bool
    {

    }

    public function viewUserRight(int $idUser): array
    {

    }

    public function mailUserRight(User $user, UserRight $right): bool
    {

    }

    public function verifyDateAuthorizedStatus(): bool
    {

    }

}