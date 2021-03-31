<?php

/*
 * Private Controller
 */

if (isset($_SESSION['id_role'])) {
    switch ($_SESSION['id_role']):
        case "1":
            require THE_ROOT . "/controller/private/private.admin.controller.php";
            break;
        case "2":
            require THE_ROOT . "/controller/private/private.moderator.controller.php";
            break;
        case "3":
            require THE_ROOT . "/controller/private/private.user.controller.php";
            break;
    endswitch;
} else {
    UserManager::signOut();
    header("Location: ./");
    exit();
}