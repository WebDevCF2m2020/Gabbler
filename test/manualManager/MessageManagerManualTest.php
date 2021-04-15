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

// CRUD tests

$message = new Message([
    'content_message' => "Lorem ipsum etc .... ",
    'fkey_user_id' => 6,
    'fkey_room_id' => 3
]);

var_dump($test->newMessage($message, 6,3));
echo '<br>';
var_dump($test->viewMessageByRoom(3));
echo '<br>';
var_dump($test->viewMessageByUser(5));
echo '<br>';
var_dump($test->archivedMessage(6));