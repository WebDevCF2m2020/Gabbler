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

    public function selectImgById(int $idImg): array
    {
        $sql = "SELECT * FROM img WHERE id_img = ?";
        $prepare = $this->db->prepare($sql);

        try {
            $prepare->execute([$idImg]);

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

    public function newImg(Img $datas): bool
    {
        $sql = "INSERT INTO img (name_img, active_img, date_img) VALUES (?,?,?)";
        $prepare = $this->db->prepare($sql);

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

    public function updateImg(int $idImg): bool
    {
        $query = "UPDATE img SET active_img = 2 WHERE id_img = ?";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1, $idImg, PDO::PARAM_INT);
        return $prepare->execute();
    }

    public function deleteImg(int $idImg): bool
    {
        $img = $this->selectImgById($idImg);
        $dir = "public/img/" . $img['name_img']; // change folder later

        if (file_exists($dir)) {
            unlink($dir);

            $sql = "DELETE FROM img WHERE id_img = ?";
            $prepare = $this->db->prepare($sql);

            try {
                $prepare->execute([$idImg]);
                return true;
            } catch (Exception $e) {
                trigger_error($e->getMessage());
                return false;
            }
        } else {
            return false;
        }
    }

    public function viewAllImg(int $idUser): array
    {
        $sql = "SELECT img.* FROM img 
                JOIN user_has_img uhi on img.id_img = uhi.user_has_img_id_img
                JOIN user u on u.id_user = uhi.user_has_img_id_user
                WHERE u.id_user = ?";

        $prepare = $this->db->prepare($sql);

        try {
            $prepare->execute([$idUser]);

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
}