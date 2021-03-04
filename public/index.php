<?php

// SESSION START
session_start();

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'config.php';



// IF THE USER IS CONNECTED
if(isset($_SESSION['session_id'])&&$_SESSION['session_id'] === session_id()){


// IF IS NOT CONNECTED
}else{


}



