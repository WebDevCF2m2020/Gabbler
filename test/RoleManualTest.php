<?php

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . "/config/config.php";

// Create autoload
spl_autoload_register(
    function ($className) {
        require THE_ROOT. "/model/" . $className . ".php";
    }
);
// Dependencies
//require_once '../model/MappingTableAbstract.php';
//require_once '../model/Role.php';
// Test model/Role.php here

//Creation of instances for test 
$classEmpty = new Role([]);
$classValidated = new role([
    "id_role"=>1,
    "name_role"=>"admin"
]);

//create a dummy extends files into this test
