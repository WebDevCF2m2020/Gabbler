<?php 

//UserRight manual testing phase:

//loading dependencies!
require_once "../../config/config.php";

spl_autoload_register(
    function ($className) {
        require "../../model/" . $className . ".php";
    }
);


//PDO data base connection:
$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);

//Instantiating UserRightManager class:
$userRight = new UserRightManager($DB);

//Sending query:
$fetchedData = $userRight->selectAll();

//Checking results:
if(empty($fetchedData)){
        echo "Nothing to fetch";
}else{

    foreach ($fetchedData as $value){
        //$userRightObject will equal a new object:
        $userRightObject = new UserRight($value);
        echo "<h3>{$userRightObject->getIdUserRight()}</h3>";
        echo "<h3>{$userRightObject->getDateAuthorizedUserRight()}</h3>";
        echo "<h3>{$userRightObject->getFkeyStatusId()}</h3>";
        echo "<h3>{$userRightObject->getFkeyUserId()}</h3>";
    }
    
}