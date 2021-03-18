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

}