<?php

/* 
 * Test HelpManager
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

// Create a HelpManager instance
$helpManager = new HelpManager($DB);

// data selection
$result = $helpManager->selectAll();

if(empty($result)){
    echo "<h1>pas de données pour la table help</h1>";
}else{
    foreach ($result as $item){
        // creation of a help type object
        $helpObject = new Help($item);
        echo "<hr>";
        echo "<p>{$helpObject->getIdHelp()}</p>";
        echo "<p>{$helpObject->getMailHelp()}</p>";
        echo "<p>{$helpObject->getNicknameHelp()}</p>";
        echo "<p>{$helpObject->getSubjectHelp()}</p>";
        echo "<p>{$helpObject->getContentHelp()}</p>";
        echo "<p>{$helpObject->getProcessedHelp()}</p>";
        echo "<p>{$helpObject->getUserId()}</p>";
    }
}