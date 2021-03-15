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
        $id_message = (int)$id_message;
        if (empty($id_message)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->id_message = $id_message;
        }
    }

    /**
     * @param string $date_message
     * @throws Exception
     */
    public function setDateMessage(string $date_message): void
    {
        $test_date_message = new DateTime($date_message);
        if (empty($date_message)) {
            trigger_error('', E_USER_NOTICE);
        } else if (!is_object($test_date_message)) {
            trigger_error('' . E_USER_NOTICE);
        } else {
            $this->date_message = $date_message;
        }
    }

    /**
     * @param string $content_message
     */
    public function setContentMessage(string $content_message): void
    {
        $content_message = strip_tags(trim($content_message));
        if (empty($content_message)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->content_message = $content_message;
        }
    }

    /**
     * @param int $archived_message
     */
    public function setArchivedMessage(int $archived_message): void
    {
        $archived_message = (int)$archived_message;
        if (empty($archived_message)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->archived_message = $archived_message;
        }
    }

    /**
     * @param int $fkey_user_id
     */
    public function setFkeyUserId(int $fkey_user_id): void
    {
        $fkey_user_id = (int)$fkey_user_id;
        if (empty($fkey_user_id)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->fkey_user_id = $fkey_user_id;
        }
    }

    /**
     * @param int $fkey_room_id
     */
    public function setFkeyRoomId(int $fkey_room_id): void
    {
        $fkey_room_id = (int)$fkey_room_id;
        if (empty($fkey_room_id)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->fkey_room_id = $fkey_room_id;
        }
    }
}