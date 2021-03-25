<?php 

//UserRight manual testing phase:

//loading dependencies!

require_once "../../config/config";

spl_autoload_register(
    function ($className) {
        require "../../model/" . $className . ".php";
    }
);

$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);