<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/UserRoom.php';

//Creation of instances for test
$classEmpty = new UserRoom([]);
$classValidated = new UserRoom([
    "id_user_room"=>1,
    "favorite_user_room"=>2,
    "fkey_room_id"=>1,
    "fkey_user_id"=>10
]);
$classNotValidated = new UserRoom([
    "id_user_room"=>0,
    "favorite_user_room"=>0,
    "fkey_room_id"=>0,
    "fkey_user_id"=>0
]);