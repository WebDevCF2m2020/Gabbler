<?php

// creation of the role child class extended from the parent class MappingTableAbstract
class Role extends MappingTableAbstract
{
    //fields of the role table in protected properties
    protected int $id_role;
    protected string $name_role;


    /**
     * GETTER of id_role
     * @return int
     */
    public function getIdRole(): int
    {
        return $this->id_role;
    }

    /**
     * SETTER of id_role
     * @param int $id_role
     */
    public function setIdRole(int $id_role): void
    {
        $id_role = (int)$id_role;
        if (empty($id_role)) {
            trigger_error("Your id must be at least one!", E_USER_NOTICE);
        } else {
            $this->id_role = $id_role;
        }
    }

    /**
     * GETTER of name_role
     * @return string
     */
    public function getNameRole(): string
    {
        return $this->name_role;
    }

    /**
     * SETTER of name_role
     * @param string $name_role
     */
    public function setNameRole(string $name_role): void
    {
        $name_role = strip_tags(trim($name_role));
        if (empty($name_role)) {
            trigger_error("Your role cannot be empty", E_USER_NOTICE);
        } elseif (strlen($name_role) > 25) {
            trigger_error("The name of your role must not exceed 25 characters", E_USER_NOTICE);
        } else {
            $this->name_role = $name_role;
        }
    }
}
