<?php


class Message
{
    protected int $id_message;
    protected string $date_message;
    protected string $content_message;
    protected int $archived_message = 1;
    protected int $fkey_user_id;
    protected int $fkey_room_id;
}