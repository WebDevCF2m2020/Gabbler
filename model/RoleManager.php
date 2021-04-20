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

    }

    public function newRole(Role $datas): bool
    {

    }

    public function updateRole(int $idRole): bool
    {

    }

    public function deleteRole(int $idRole): bool
    {

    }

}