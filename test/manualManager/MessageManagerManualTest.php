<?php

/*
 * Test MessageManager
 */

// Common's dependencies
require_once "../../config/config.php";

// Create autoload to model folder
spl_autoload_register(
    function ($className) {
        require "../../model/" . $className . ".php";
    }
);

// DB Singleton connection
$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);

// Create instance
$test = new MessageManager($DB);

// data selection
$result = $test->selectAll();

if(empty($result)){
    echo "<h1>pas de données pour la table message</h1>";
}else{
    foreach ($result as $item){
        // creation of a type object
        $object = new Message($item);
        echo "<hr>";
        echo "<p>{$object->getIdMessage()}</p>";
        echo "<p>{$object->getDateMessage()}</p>";
        echo "<p>{$object->getContentMessage()}</p>";
        echo "<p>{$object->getArchivedMessage()}</p>";
        echo "<p>{$object->getFkeyUserId()}</p>";
        echo "<p>{$object->getFkeyRoomId()}</p>";
    }
}
