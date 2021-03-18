<?php
/* 
 * Test ImgManager
 */

 // Common's dependencies
require_once "../config/config.php";

// Create autoload to model folder
spl_autoload_register(
    function ($className) {
        require "../model/" . $className . ".php";
    }
);
// DB Singleton connection
$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);

// Create a HelpManager instance
$imgManager = new ImgManager($DB);

// data selection
$result = $imgManager->selectAll();

if(empty($result)){
    echo "<h1>pas de données pour la table img</h1>";
}else{
    foreach ($result as $item){
        // creation of a help type object
        $imgObject = new Img($item);
        echo "<hr>";
        echo "<p>{$imgObject->getIdImg()}</p>";
        echo "<p>{$imgObject->getNameImg()}</p>";
        echo "<p>{$imgObject->getActiveImg()}</p>";
        echo "<p>{$imgObject->getDateImg()}</p>";
     
    }
}
