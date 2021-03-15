<?php


class Message extends MappingTableAbstract
{
    protected int $id_message;
    protected string $date_message;
    protected string $content_message;
    protected int $archived_message = 1;
    protected int $fkey_user_id;
    protected int $fkey_room_id;

    /**
     * @return int
     */
    public function getIdMessage(): int
    {
        return $this->id_message;
    }

    /**
     * @return string
     */
    public function getDateMessage(): string
    {
        return $this->date_message;
    }

    /**
     * @return string
     */
    public function getContentMessage(): string
    {
        return $this->content_message;
    }

    /**
     * @return int
     */
    public function getArchivedMessage(): int
    {
        return $this->archived_message;
    }

    /**
     * @return int
     */
    public function getFkeyUserId(): int
    {
        return $this->fkey_user_id;
    }

    /**
     * @return int
     */
    public function getFkeyRoomId(): int
    {
        return $this->fkey_room_id;
    }

    /**
     * @param int $id_message
     */
    public function setIdMessage(int $id_message): void
    {
        $this->id_message = $id_message;
    }

    /**
     * @param string $date_message
     */
    public function setDateMessage(string $date_message): void
    {
        $this->date_message = $date_message;
    }

    /**
     * @param string $content_message
     */
    public function setContentMessage(string $content_message): void
    {
        $this->content_message = $content_message;
    }

    /**
     * @param int $archived_message
     */
    public function setArchivedMessage(int $archived_message): void
    {
        $this->archived_message = $archived_message;
    }

    /**
     * @param int $fkey_user_id
     */
    public function setFkeyUserId(int $fkey_user_id): void
    {
        $this->fkey_user_id = $fkey_user_id;
    }

    /**
     * @param int $fkey_room_id
     */
    public function setFkeyRoomId(int $fkey_room_id): void
    {
        $this->fkey_room_id = $fkey_room_id;
    }
}