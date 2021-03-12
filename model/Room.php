<?php


class Room extends MappingTableAbstract
{
    protected int $id_room;
    protected int $public_room;
    protected int $archiver_room;
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
        $this->id_room = $id_room;
    }

    /**
     * @param int $public_room
     */
    public function setPublicRoom(int $public_room): void
    {
        $this->public_room = $public_room;
    }

    /**
     * @param int $archiver_room
     */
    public function setArchiverRoom(int $archiver_room): void
    {
        $this->archiver_room = $archiver_room;
    }

    /**
     * @param string $name_room
     */
    public function setNameRoom(string $name_room): void
    {
        $this->name_room = $name_room;
    }

    /**
     * @param string $last_activity_room
     */
    public function setLastActivityRoom(string $last_activity_room): void
    {
        $this->last_activity_room = $last_activity_room;
    }
}