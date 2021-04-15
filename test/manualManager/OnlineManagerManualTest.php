<?php

/*
 * Test OnlineManager
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
$test = new OnlineManager($DB);

// data selection
$result = $test->selectAll();


if (empty($result)) {
    echo "<h1>pas de données pour la table Online</h1>";
} else {
    foreach ($result as $item) {
        // creation of a type object
        $object = new Online($item);
        echo "<hr>";
        echo "<p>{$object->getIdOnline()}</p>";
        echo "<p>{$object->getLastActivityOnline()}</p>";
        echo "<p>{$object->getConnectedOnline()}</p>";
        echo "<p>{$object->getFkeyUserId()}</p>";
    }
    // CRUD tests

$online = new Online([
    'connected_online' => 2,
    'fkey_user_id' => 5
]);

var_dump($test->checkUsersOnline(2));

}
