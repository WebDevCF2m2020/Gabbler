<?php
/*
* Test UserRoomManager
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

// Create a UserRoomManager instance
$userRoomManager = new UserRoomManager($DB);

// data selection
$result = $userRoomManager->selectAll();

if(empty($result)){
    echo "<h1>pas de données pour la table user_room</h1>";
}else{
    foreach ($result as $item){
        // creation of a role type object
        $userRoomObject = new userRoom($item);
        echo "<hr>";
        echo "<p>{$userRoomObject->getIdUserRoom()}</p>";
        echo "<p>{$userRoomObject->getFavoriteUserRoom()}</p>";
        echo "<p>{$userRoomObject->getFkeyRoomId()}</p>";
        echo "<p>{$userRoomObject->getFkeyUserId()}</p>";
    }
}