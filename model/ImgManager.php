<?php

/**
 * Class ImgManager
 */
class ImgManager extends ManagerTableAbstract implements ManagerTableInterface {

    // Selection of every input of the img table
    public function selectAll(): array {
        $sql = "SELECT * FROM img;";
        $query = $this->db->query($sql);
        // The return when there is one or more result(s)
        if($query->rowCount()){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // The return when there is no result
        return [];
    }
    
}