<?php

/**
 * Class Online
 * Mapping of the online table
 */
class Online extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_online;
    protected int $last_activity_online;
    protected int $connected_online = 2 ;
    protected int $fkey_user_id;

    // GETTERS

    /**
     * $id_online's getter
     * @return int
     */
    public function getIdOnline(): int {
        return $this->id_online;
    }

    /**
     * $last_activity_online's getter
     * @return int
     */
    public function getLastActivityOnline(): int {
        return $this->last_activity_online;
    }

    /**
     * $connected_online's getter
     * @return int
     */
    public function getConnectedOnline(): int {
        return $this->connected_online;
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
     * $id_online's setter
     * @param int $id_online
     */
    public function setIdOnline(int $id_online): void {
        $id_online = (int) $id_online;
        if (empty($id_online)){
            trigger_error("The online ID can't be empty", E_USER_NOTICE);
        } else {
            $this->id_online = $id_online;
        }
    }

    /**
     * $last_activity_online's setter
     * @param string $last_activity_online
     */
    public function setLastActivityOnline(string $last_activity_online): void {
        $last_activity_online = strtotime($last_activity_online);
        if ($last_activity_online === false) {
            trigger_error('The last activity isn\'t valid', E_USER_NOTICE);
        } else {
            $this->last_activity_online = (int)$last_activity_online;
        }
    }

    /**
     * $connected_online's setter
     * @param int $connected_online
     */
    public function setConnectedOnline(int $connected_online): void {
        $connected_online = (int)$connected_online;
        if($connected_online < 1 && $connected_online > 2){
            trigger_error("The status has to be 1 (not connected) or 2(connected)",E_USER_NOTICE);
        } else {
            $this->connected_online = $connected_online;
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