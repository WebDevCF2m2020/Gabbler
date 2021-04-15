<?php

/**
 * Class ImgManager
 */
class ImgManager extends ManagerTableAbstract implements ManagerTableInterface
{

    // Selection of every input of the img table
    public function selectAll(): array
    {
        $sql = "SELECT * FROM img;";
        $query = $this->db->query($sql);
        // The return when there is one or more result(s)
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // The return when there is no result
        return [];
    }

    public function newImg(Img $datas): bool
    {
        $sql = "INSERT INTO img (name_img, active_img, date_img) VALUES (?,?,?)";
        $prepare = $this->db->prepare($sql);


        // test if the request works
        try {
            $prepare->execute([
                $datas->getNameImg(),
                $datas->getActiveImg(),
                $datas->getDateImg(),
            ]);
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }

    public function updateImg(Img $datas): bool
    {

    }

    public function deleteImg(int $idImg): bool
    {

    }

    public function viewAllImg(int $idUser): bool
    {

    }
}