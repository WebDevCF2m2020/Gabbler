<?php

/**
 * Class StatusManager
 */
class StatusManager extends ManagerTableAbstract implements ManagerTableInterface
{

    // Selection of every input of the status table
    public function selectAll(): array
    {
        $sql = "SELECT * FROM status;";
        $query = $this->db->query($sql);
        // The return when there is one or more result(s)
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // The return when there is no result
        return [];
    }

    public function newStatus(Status $datas): bool
    {
        $sql = "INSERT INTO status (name_status) VALUES (?)";
        $prepare = $this->db->prepare($sql);

        // test if the request works
        try {
            $prepare->execute([
                $datas->getNameStatus(),
            ]);
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }

    public function updateStatus(Status $datas): bool
    {

    }

    public function deleteStatus(int $idStatus): bool
    {

    }

    public function viewStatusById(int $idStatus): array
    {

    }
}