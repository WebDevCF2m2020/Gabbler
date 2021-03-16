<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Reported.php';

// Creation of new instances for the tests
$classEmpty = new Reported([]);
$classValidated = new Reported([
    "id_reported" => 1,
    "inquiry_reported" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.</br>",
    "processed_reported" => 1,
    "fkey_category_id" => 2,
    "fkey_message_if" => 3
]);
$classNotValidated = new Reported([
    "id_reported" => 0,
    "inquiry_reported" => "",
    "processed_reported" => 43,
    "fkey_category_id" => 0,
    "fkey_message_id" => 0
]);

class test extends Reported
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