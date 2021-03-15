<?php


class Message
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


}