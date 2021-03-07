<?php

// SESSION START
session_start();

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . "/bin/config.php";

// Create autoload to model folder
spl_autoload_register(
    function($className){
        require THE_ROOT ."/model/".$className.".php";
    }
);

// DB Singleton connection
$DB = MyPDO::getInstance(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);


// IF THE USER IS CONNECTED
if(isset($_SESSION['session_id'])&&$_SESSION['session_id'] === session_id()){


// IF IS NOT CONNECTED
}else{


}



