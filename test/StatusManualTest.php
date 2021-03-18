<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Status.php';

// Creation of new instances for the tests
$classEmpty = new Status([]);
$classValidated = new Status([
    "id_status" => 324,
    "name_status" => "nouveau status"
]);
$classNotValidated = new Status([
    "id_status" => 0,
    "name_status" => "nouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau status"
]);

class test extends Message
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