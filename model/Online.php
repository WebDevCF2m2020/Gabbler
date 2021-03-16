<?php

/**
 * Class Online
 * Mapping of the online table
 */
class Online extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_online;
    protected string $last_activity_online;
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
     * @return string
     */
    public function getLastActivityOnline(): string {
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

}