<?php

class MessageManager extends ManagerTableAbstract implements ManagerTableInterface
{
    //put your query for selected all datas in this table
    public function selectAll(): array {
        $sql = "SELECT * FROM message;";
        $query = $this->db->query($sql);
        // if we have at least one result
        if($query->rowCount()){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // else an empty array
        return [];
    }


    // new message
    public function newMessage(Message $datas, int $idUser, int $idRoom): bool {
        $newDate = new DateTime();
        $sql = "INSERT INTO `message` (`date_message`, `content_message`, `archived_message`, `fkey_user_id`, `fkey_room_id`) VALUES (?, ?, ?, ?, ?);";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(1, $newDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        $prepare->bindValue(2, $datas->getContentMessage(), PDO::PARAM_STR);
        $prepare->bindValue(3, 1, PDO::PARAM_INT);
        $prepare->bindValue(4, $idUser, PDO::PARAM_INT);
        $prepare->bindValue(5, $idRoom, PDO::PARAM_INT);
        // execute
        try {
            $prepare->execute();
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }

    // Message by room
    public function viewMessageByRoom(int $idRoom): array {
        $sql = "SELECT * FROM `message` WHERE fkey_room_id = ?";
        $prepare = $this->db->prepare($sql);

        // test if the request works
        try {
            $prepare->execute([$idRoom]);
            // if there is something to show :
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

    // Message by user
    public function viewMessageByUser(int $idUser): array {
        $sql = "SELECT * FROM `message` 
                 LEFT JOIN room ON message.fkey_room_id = room.id_room
                 WHERE fkey_user_id = ?";
        $prepare = $this->db->prepare($sql);

        // test if the request works
        try {
            $prepare->execute([$idUser]);
            // if there is something to show :
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

    // Update a message status
    public function archivedMessage(int $idMessage): bool  {
        $query = "UPDATE message SET archived_message = 2 WHERE id_message = ?";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1,$idMessage, PDO::PARAM_INT);
        return $prepare->execute();
    }
}