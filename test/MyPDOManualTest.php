<?php


// Common's dependencies
require_once "..". DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'config.php';

// Create autoload
spl_autoload_register(
    function($className){
        require "../model/".$className.".php";
    }
);

// create 3 instances of MyPDO
$a = MyPDO::getInstance(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);
$b = MyPDO::getInstance(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);
$c = MyPDO::getInstance(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);
?>
<pre><?php var_dump($a,$b,$c)?></pre>