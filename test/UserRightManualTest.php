<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/UserRight.php';

// Creation of new instances for the tests
$classEmpty = new UserRight([]);
$classValidated = new UserRight([
    "id_user_right" => 2345,
    "date_authorized_user_right" => "2011-01-01T15:03",
    "fkey_status_id" => 4,
    "fkey_user_id" => 2345,
]);
$classNotValidated = new UserRight([
    "id_user_right" => 0,
    "date_authorized_user_right" => "",
    "fkey_status_id" => 0,
    "fkey_user_id" => 0,
]);