<?php 

//User manual testing phase:

//loading dependencies!
require_once "../../config/config.php";

spl_autoload_register(
    function ($className) {
        require "../../model/" . $className . ".php";
    }
);


//PDO data base connection:
$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);

//Instantiating UserManager class:
$user = new UserManager($DB);

//Sending query:
$fetchedData = $user->selectAll();

//Checking results:
if(empty($fetchedData)){
        echo "Nothing to fetch";
}else{

    foreach ($fetchedData as $value){
        //$userObject will equal a new object:
        $userObject = new User($value);
        echo "<h3>{$userObject->getIdUser()}</h3>";
        echo "<h3>{$userObject->getNicknameUser()}</h3>";
        echo "<h3>{$userObject->getPwdUser()}</h3>";
        echo "<h3>{$userObject->getMailUser()}</h3>";
        echo "<h3>{$userObject->getSignupDateUser()}</h3>";
        echo "<h3>{$userObject->getColorUser()}</h3>";
        echo "<h3>{$userObject->getConfirmationKeyUser()}</h3>";
        echo "<h3>{$userObject->getValidationStatusKey()}</h3>";
    }
    
}