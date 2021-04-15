<?php
/**
 * Class UserRoomManager
 */
class UserRoomManager extends ManagerTableAbstract implements ManagerTableInterface {

    // Selection of every input of the online table
    public function selectAll(): array {
        $sql = "SELECT * FROM user_room;";
        $query = $this->db->query($sql);
        // The return when there is one or more result(s)
        if($query->rowCount()){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // The return when there is no result
        return [];
    }

    // Create a new link between a user and a room
    public function newUserRoom(UserRoom $datas, int $idUser): bool{
        $sql = "INSERT INTO `user_room` (favorite_user_room, fkey_room_id, fkey_user_id) VALUES (?,?,?)";
        $prepare = $this->db->prepare($sql);
        // execute
        try {
            $prepare->execute([
                1,
                $datas->getFkeyRoomId(),
                $idUser
            ]);
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }

    
}