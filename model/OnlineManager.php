<?php

/**
 * Class OnlineManager
 */
class OnlineManager extends ManagerTableAbstract implements ManagerTableInterface {

    // Selection of every input of the online table
    public function selectAll(): array {
        $sql = "SELECT * FROM online;";
        $query = $this->db->query($sql);
        // The return when there is one or more result(s)
        if($query->rowCount()){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // The return when there is no result
        return [];
    }


   public function checkUsersOnline(): array{
    $sql = "SELECT * FROM online WHERE connected_online = 2;";
    $query = $this->db->query($sql);
    // The return when there is one or more result(s)
    if($query->rowCount()){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // The return when there is no result
    return [];
   }

   public function updateIsOnline(int $idUser):bool{
    $query = "UPDATE online SET connected_online = 2 WHERE fkey_user_id = ?";
    $prepare = $this->db->prepare($query);
    $prepare->bindValue(1, $idUser, PDO::PARAM_INT);
    return $prepare->execute();

   }


   public function updateIsNotOnline(int $idUser):bool{
    $query = "UPDATE online SET connected_online = 1 WHERE fkey_user_id = ?";
    $prepare = $this->db->prepare($query);
    $prepare->bindValue(1, $idUser, PDO::PARAM_INT);
    return $prepare->execute();
   }


   public function checkIsOnline(int $idUser):bool{
    $sql = "SELECT * FROM online WHERE fkey_user_id = ?;";
    $query = $this->db->query($sql);
    $prepare = $this->db->prepare($query);
    $prepare->bindValue(1, $idUser, PDO::PARAM_INT);
    // The return when there is one or more result(s)
    if($query->rowCount()){
        return $query->fetch(PDO::FETCH_ASSOC);
    }
   }
}

