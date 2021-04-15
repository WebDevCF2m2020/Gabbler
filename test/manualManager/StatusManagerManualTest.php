<?php
/*
* Test StatusManager
*/
//Common's dependencies
require_once "../../config/config.php";

// Create autoload to model folder
spl_autoload_register(
    function ($className) {
        require "../../model/" . $className . ".php";
    }
);
// DB Singleton connection
$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);

// Create a StatusManager instance
$statusManager = new StatusManager($DB);

// data selection
$result = $statusManager->selectAll();


if(empty($result)){
    echo "<h1>pas de données pour la table status</h1>";
}else{
    foreach ($result as $item){
        // creation of a role type object
        $statusObject = new Status($item);
        echo "<hr>";
        echo "<p>{$statusObject->getIdStatus()}</p>";
        echo "<p>{$statusObject->getNameStatus()}</p>";
    }
}


// TEST method :
$data = new Status([
    'name_status' => 'admin'
]);

//var_dump($statusManager->newStatus($data));

$dataUpdate = new Status([
    'name_status' => 'admin2',
    'id_status' => 5
]);

//var_dump($statusManager->updateStatus($dataUpdate));

//var_dump($statusManager->deleteStatus(5));

var_dump($statusManager->viewStatusById(1));

