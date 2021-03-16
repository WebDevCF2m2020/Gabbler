<?php

/**
 * Class UserRight
 * Mapping of the UserRight table
 */
class UserRight extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_user_right;
    protected int $date_authorized_user_right;
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
     * @return int
     */
    public function getDateAuthorizedUserRight(): int {
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
}