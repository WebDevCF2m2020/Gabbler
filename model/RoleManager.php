<?php


class RoleManager extends ManagerTableAbstract implements ManagerTableInterface
{
    //put your query for selected all datas in this table
    public function selectAll(): array
    {
        $sql = "SELECT * FROM role;";
        $query = $this->db->query($sql);
        // if we have at least one result
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // else an empty array
        return [];
    }

    public function updateRoleByIdUser(User $idUser, Role $idRole): bool
    {
        $query = "UPDATE role_has_user SET role_has_user_id_role = ? WHERE role_has_user_id_user = ?";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1, $idRole->getIdRole(), PDO::PARAM_INT);
        $prepare->bindValue(2, $idUser->getIdUser(), PDO::PARAM_INT);
        return $prepare->execute();
    }

    public function newRole(Role $datas): bool
    {
        $sql = "INSERT INTO role (name_role) VALUES (?)";
        $prepare = $this->db->prepare($sql);

        // test if the request works
        try {
            $prepare->execute([
                $datas->getNameRole()
            ]);
            return true;
        } catch (Exception $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }

    public function updateRole(Role $data): bool
    {
        $query = "UPDATE role SET name_role = ? WHERE id_role = ?";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(1, $data->getNameRole(), PDO::PARAM_STR);
        $prepare->bindValue(2, $data->getIdRole(), PDO::PARAM_INT);
        return $prepare->execute();
    }

    public function deleteRole(int $idRole): bool
    {
        //TODO
    }

}