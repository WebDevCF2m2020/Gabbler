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

    // Select a reported message by its id
    public function viewReportedById(int $idReported): array
    {
        $sql = "SELECT * FROM reported WHERE id_reported = ?";
        $prepare = $this->db->prepare($sql);

        // test if the request works
        try {
            $prepare->execute([$idReported]);
            // The return when there is one result
            if ($prepare->rowCount()) {
                return $prepare->fetch(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return [];
        }
    }

    // Create a new message report
    public function newReported(Reported $datas): bool
    {
        $sql = "INSERT INTO reported (inquiry_reported, processed_reported, fkey_category_id, fkey_message_id) VALUES (?,?,?,?)";
        $prepare = $this->db->prepare($sql);

        // test if the request works
        try {
            $prepare->execute([
                $datas->getInquiryReported(),
                1,
                $datas->getFkeyCategoryId(),
                $datas->getFkeyMessageId()
            ]);
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }

    // Updates if the report has been processed
    public function updateReported(Reported $data): bool
    {
        $query = "UPDATE reported SET processed_reported = 2 WHERE fkey_message_id = ?";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1, $data->getFkeyMessageId(), PDO::PARAM_STR);
        return $prepare->execute();
    }

    public function mailToAdmin(Reported $datas, string $mail): bool
    {
        //TODO
    }

}