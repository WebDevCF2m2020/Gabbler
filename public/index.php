<?php

// Import Class Twig
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

// SESSION START
session_start();

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . "/config/config.php";
require_once THE_ROOT . "/vendor/autoload.php";

// Create autoload to model folder
spl_autoload_register(
    function ($className) {
        require THE_ROOT . "/model/" . $className . ".php";
    }
);

// DB Singleton connection
$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);

// Loading View Twig
$loader = new FilesystemLoader(THE_ROOT . '/view');
// Creation of the environment and mode dev debug
$twig = new Environment($loader, ['debug' => true]);
// Activated debug
$twig->addExtension(new DebugExtension());


// Joint Managers
$userManager = new UserManager($DB);


// IF THE USER IS CONNECTED
if (isset($_SESSION['session_id']) && $_SESSION['session_id'] === session_id()) {

    require THE_ROOT.'/controller/private.controller.php';

// IF IS NOT CONNECTED
} else {

    require THE_ROOT.'/controller/public.controller.php';

}



