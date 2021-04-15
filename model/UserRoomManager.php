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
    public function newUserRoom(UserRoom $datas, int $idUser): bool {
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

    // favorite room update to => favorite
    public function favoriteUserRoom(UserRoom $datas): bool {
        $query = "UPDATE user_room SET favorite_user_room = 2 WHERE fkey_room_id = ? AND fkey_user_id = ? ;";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1, $datas->getFkeyRoomId(), PDO::PARAM_STR);
        $prepare->bindValue(1, $datas->getFkeyUserId(), PDO::PARAM_STR);
        return $prepare->execute();
    }

    // favorite room update to => not favorite
    public function unFavoriteUserRoom(UserRoom $datas): bool {
        $query = "UPDATE user_room SET favorite_user_room = 1 WHERE fkey_room_id = ? AND fkey_user_id = ? ;";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1, $datas->getFkeyRoomId(), PDO::PARAM_STR);
        $prepare->bindValue(1, $datas->getFkeyUserId(), PDO::PARAM_STR);
        return $prepare->execute();
    }

    // Select of one user favorite rooms
    public function viewUserRoom(int $idUser): array {
        $sql = "SELECT * FROM user_room WHERE favorite_room_user = 2 AND fkey_user_id = ?";
        $prepare = $this->db->prepare($sql);

        // execute
        try {
            $prepare->execute([$idUser]);
            // if we have at least one result
            if ($prepare->rowCount()) {
                return $prepare->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return [];
        }
    }
}