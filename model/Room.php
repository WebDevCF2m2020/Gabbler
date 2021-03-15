<?php

class Room extends MappingTableAbstract
{
    protected int $id_room;
    protected int $public_room = 1;
    protected int $archived_room = 1;
    protected string $name_room;
    protected string $last_activity_room;

    /**
     * Room id getter
     * @return int
     */
    public function getIdRoom(): int
    {
        return $this->id_room;
    }

    /**
     * Public getter
     * @return int
     */
    public function getPublicRoom(): int
    {
        return $this->public_room;
    }

    /**
     * Archived getter
     * @return int
     */
    public function getArchivedRoom(): int
    {
        return $this->archived_room;
    }

    /**
     * Name getter
     * @return string
     */
    public function getNameRoom(): string
    {
        return $this->name_room;
    }

    /**
     * Last activity getter
     * @return string
     */
    public function getLastActivityRoom(): string
    {
        return $this->last_activity_room;
    }

    /**
     * Room id setter
     * @param int $id_room
     */
    public function setIdRoom(int $id_room): void
    {
        $id_room = (int)$id_room;
        if (empty($id_room)) {
            trigger_error('The room ID is not valid', E_USER_NOTICE);
        } else {
            $this->id_room = $id_room;
        }
    }

    /**
     * Public setter
     * @param int $public_room
     */
    public function setPublicRoom(int $public_room): void
    {
        $public_room = (int)$public_room;
        if (empty($public_room)) {
            trigger_error('The public room is not valid', E_USER_NOTICE);
        } else {
            $this->public_room = $public_room;
        }
    }

    /**
     * Archived setter
     * @param int $archived_room
     */
    public function setArchiverRoom(int $archived_room): void
    {
        $archived_room = (int)$archived_room;
        if (empty($archived_room)) {
            trigger_error('The archived room is not valid', E_USER_NOTICE);
        } else {
            $this->archived_room = $archived_room;
        }
    }

    /**
     * Name setter
     * @param string $name_room
     */
    public function setNameRoom(string $name_room): void
    {
        $name_room = strip_tags(trim($name_room));
        if (empty($name_room)) {
            trigger_error('The name room cannot be empty', E_USER_NOTICE);
        } else if (strlen($name_room) < 5 || strlen($name_room) > 25) {
            trigger_error('The length of the name room must be between 5 and 25 characters', E_USER_NOTICE);
        } else {
            $this->name_room = $name_room;
        }
    }

    /**
     * Last activity setter
     * @param string $last_activity_room
     * @throws Exception
     */
    public function setLastActivityRoom(string $last_activity_room): void
    {
        $verifyDate = new DateTime($last_activity_room);
        if (empty($last_activity_room)) {
            trigger_error('The date of the last activity room cannot be empty', E_USER_NOTICE);
        } else if (!is_object($verifyDate)) {
            trigger_error('the date of the last activity room is not valid', E_USER_NOTICE);
        } else {
            $this->last_activity_room = $last_activity_room;
        }
    }
}