<?php

use Cassandra\Date;

class Room extends MappingTableAbstract
{
    protected int $id_room;
    protected int $public_room = 1;
    protected int $archiver_room = 1;
    protected string $name_room;
    protected string $last_activity_room;

    /**
     * @return int
     */
    public function getIdRoom(): int
    {
        return $this->id_room;
    }

    /**
     * @return int
     */
    public function getPublicRoom(): int
    {
        return $this->public_room;
    }

    /**
     * @return int
     */
    public function getArchiverRoom(): int
    {
        return $this->archiver_room;
    }

    /**
     * @return string
     */
    public function getNameRoom(): string
    {
        return $this->name_room;
    }

    /**
     * @return string
     */
    public function getLastActivityRoom(): string
    {
        return $this->last_activity_room;
    }

    /**
     * @param int $id_room
     */
    public function setIdRoom(int $id_room): void
    {
        $id_room = (int)$id_room;
        if (empty($id_room)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->id_room = $id_room;
        }
    }

    /**
     * @param int $public_room
     */
    public function setPublicRoom(int $public_room): void
    {
        $public_room = (int)$public_room;
        if (empty($public_room)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->public_room = $public_room;
        }
    }

    /**
     * @param int $archiver_room
     */
    public function setArchiverRoom(int $archiver_room): void
    {
        $archiver_room = (int)$archiver_room;
        if (empty($archiver_room)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->archiver_room = $archiver_room;
        }
    }

    /**
     * @param string $name_room
     */
    public function setNameRoom(string $name_room): void
    {
        if (empty($name_room)) {
            trigger_error('', E_USER_NOTICE);
        } else if (strlen($name_room) < 5 || strlen($name_room) > 25) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->name_room = $name_room;
        }
    }

    /**
     * @param string $last_activity_room
     */
    public function setLastActivityRoom(string $last_activity_room): void
    {
        $verifyDate = new Date($last_activity_room);
        if (empty($last_activity_room)) {
            trigger_error('', E_USER_NOTICE);
        } else if (!is_object($verifyDate)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->last_activity_room = $last_activity_room;
        }
    }
}