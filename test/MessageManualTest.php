<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Message.php';

// Creation of new instances for the tests
$classEmpty = new Message([]);
$classValidated = new Message([
    "id_message" => 324,
    "date_message" => "2011-01-01T15:03:01.012345Z",
    "content_message" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    "archived_message" => 2,
    "fkey_user_id" => 345,
    "fkey_room_id" => 54623
]);
$classNotValidated = new Message([
    "id_message" => 0,
    "date_message" => "",
    "content_message" => "",
    "archived_message" => 0,
    "fkey_user_id" => 0,
    "fkey_room_id" => 0
]);

class test extends Help
{
    public function getTest()
    {
        return $this->test;
    }

    public function setTest($test)
    {
        $this->test = $test;
    }
}