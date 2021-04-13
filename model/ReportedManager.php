<?php

/**
 * Class ReportedManager
 */
class ReportedManager extends ManagerTableAbstract implements ManagerTableInterface
{

    // Selection of every input of the reported table
    public function selectAll(): array
    {
        $sql = "SELECT * FROM reported;";
        $query = $this->db->query($sql);
        // The return when there is one or more result(s)
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // The return when there is no result
        return [];
    }

    public function viewReported(int $idReported): array
    {

    }

    public function newReported(Reported $datas): bool
    {

    }

    public function updateReported(Reported $data): bool
    {

    }

    public function deleteReported(int $idReported): bool
    {

    }

    public function mailToAdmin(Reported $datas, string $mail): bool
    {

    }

}