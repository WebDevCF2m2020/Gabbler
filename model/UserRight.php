<?php

/**
 * Class UserRight
 * Mapping of the UserRight table
 */
class UserRight extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_user_right;
    protected string $date_authorized_user_right;
    protected int $fkey_status_id;
    protected int $fkey_user_id;

    // GETTERS

    /**
     * $id_user_right's getter
     * @return int
     */
    public function getIdUserRight(): int {
        return $this->id_user_right;
    }

    /**
     * $date_authorized_user_right's getter
     * @return string
     */
    public function getDateAuthorizedUserRight(): string {
        return $this->date_authorized_user_right;
    }

    /**
     * $fkey_status_id's getter
     * @return int
     */
    public function getFkeyStatusId(): int {
        return $this->fkey_status_id;
    }

    /**
     * $fkey_user_id's getter
     * @return int
     */
    public function getFkeyUserId(): int {
        return $this->fkey_user_id;
    }

    // SETTERS

    /**
     * $id_user_right's setter
     * @param int $id_user_right
     */
    public function setIdUserRight(int $id_user_right): void {
        $id_user_right = (int) $id_user_right;
        if (empty($id_user_right)){
            trigger_error("The user right ID can't be empty", E_USER_NOTICE);
        } else {
            $this->id_user_right = $id_user_right;
        }
    }

    /**
     * $date_authorized_user_right's setter
     * @param string $date_authorized_user_right
     * @throws Exception
     */
    public function setDateAuthorizedUserRight(string $date_authorized_user_right): void {
        $date_authorized_user_right = new DateTime($date_authorized_user_right);
        if (empty($date_authorized_user_right)) {
            trigger_error('The date for the authorisation cannot be empty', E_USER_NOTICE);
        } else if (!is_object($date_authorized_user_right)) {
            trigger_error('the date for the authorisation is not valid', E_USER_NOTICE);
        } else {
            $this->date_authorized_user_right = $date_authorized_user_right;
        }
    }

    /**
     * $fkey_status_id's setter
     * @param int $fkey_status_id
     */
    public function setFkeyStatusId(int $fkey_status_id): void
    {
        $fkey_status_id = (int)$fkey_status_id;
        if (empty($fkey_status_id)) {
            trigger_error('The foreign key for the status can\'t be empty', E_USER_NOTICE);
        } else {
            $this->fkey_status_id = $fkey_status_id;
        }
    }

    /**
     * $fkey_user_id's setter
     * @param int $fkey_user_id
     */
    public function setFkeyUserId(int $fkey_user_id): void
    {
        $fkey_user_id = (int)$fkey_user_id;
        if (empty($fkey_user_id)) {
            trigger_error('The foreign key for the user can\'t be empty', E_USER_NOTICE);
        } else {
            $this->fkey_user_id = $fkey_user_id;
        }
    }
}