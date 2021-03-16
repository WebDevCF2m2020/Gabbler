<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Room.php';

// Creation of new instances for the tests
$classEmpty = new Room([]);
$classValidated = new Room([
    "id_room" => 23456,
    "public_room" => 2,
    "archived_room" => 1,
    "name_room" => "room",
    "last_activity_room" => "2011-01-01T15:03:01.012345Z"
]);
$classNotValidated = new Room([
    "id_room" => 0,
    "public_room" => 0,
    "archived_room" => 0,
    "name_room" => "",
    "last_activity_room" => ""
]);