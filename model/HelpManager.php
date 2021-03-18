<?php


class HelpManager extends ManagerTableAbstract implements ManagerTableInterface {
    
    //put your query for selected all datas in this table
    public function selectAll(): array {
        $sql = "SELECT * FROM help;";
        $query = $this->db->query($sql);
        // if we have at least one result
        if($query->rowCount()){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // else an empty array
        return [];
    }

}
