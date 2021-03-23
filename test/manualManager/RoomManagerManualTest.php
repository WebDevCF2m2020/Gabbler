<?php
/*
* Test RoomManager
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

// Create a RoomManager instance
$roomManager = new RoomManager($DB);

// data selection
$result = $roomManager->selectAll();

if(empty($result)){
    echo "<h1>pas de données pour la table room</h1>";
}else{
    foreach ($result as $item){
        // creation of a role type object
        $roomObject = new Room($item);
        echo "<hr>";
        echo "<p>{$roomObject->getIdRoom()}</p>";
        echo "<p>{$roomObject->getPublicRoom()}</p>";
        echo "<p>{$roomObject->getArchivedRoom()}</p>";
        echo "<p>{$roomObject->getNameRoom()}</p>";
        echo "<p>{$roomObject->getLastActivityRoom()}</p>";

    }
}