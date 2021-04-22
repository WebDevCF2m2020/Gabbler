<?php

/*
 * Test CategoryManager
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
$categoryManager = new CategoryManager($DB);

// data selection
$result = $categoryManager->selectAll();

if(empty($result)){
    echo "<h1>pas de données pour la table category</h1>";
}else{
    foreach ($result as $item){
        // Création d'un new Category
        $helpObject = new Category($item);
        echo "<hr>";
        echo "<p>{$helpObject->getIdCategory()}</p>";
        echo "<p>{$helpObject->getNameCategory()}</p>";
    }
}