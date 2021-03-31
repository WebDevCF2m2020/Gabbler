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
    /**
     * @param Help $help
     *
     */
    public function createtHelp( Help $help){

        // INSERT INTO DATABASE
        $query = "INSERT INTO help (mail_help, nickname_help, subject_help, content_help) VALUES (?,?,?,?);";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1,$help->getMailHelp(),PDO::PARAM_STR);
        $prepare->bindValue(2,$help->getNicknameHelp(),PDO::PARAM_STR);
        $prepare->bindValue(3,$help->getSubjectHelp(),PDO::PARAM_STR);
        $prepare->bindValue(4,$help->getContentHelp(),PDO::PARAM_STR);
        return $prepare->execute();
}
}
