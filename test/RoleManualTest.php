<?php

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . "/config/config.php";

// Create autoload
spl_autoload_register(
    function ($className) {
        require THE_ROOT."/model/" . $className . ".php";
    }
);

// Test model/Role.php here