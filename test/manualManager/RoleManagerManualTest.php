<?php
/* 
 * Test RoleManager
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

// Create a RoleManager instance
$roleManager = new RoleManager($DB);

// data selection
$result = $roleManager->selectAll();

if(empty($result)){
    echo "<h1>pas de données pour la table role</h1>";
}else{
    foreach ($result as $item){
        // creation of a role type object
        $roleObject = new Role($item);
        echo "<hr>";
        echo "<p>{$roleObject->getIdRole()}</p>";
        echo "<p>{$roleObject->getNameRole()}</p>";
    }
}
