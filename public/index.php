<?php

// SESSION START
session_start();

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . "/config/config.php";

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
$test = new UserRight(['id_user_right' => 25, 'date_authorized_user_right'=>'2012-03-24 17:45:12', 'fkey_status_id'=> 5, 'fkey_user_id'=> 9]);
var_dump($test);

}



