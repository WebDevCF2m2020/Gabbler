<?php

/* 
 * Private User Controller
 */

// IMG MANAGER
$imgManager = new ImgManager($DB);

// DISPLAY PRIVATE USER PAGE
echo $twig->render("private/user/private_user.html.twig",
    [
        "user" => $_SESSION,
        "img" => $imgManager->selectByUser($_SESSION['id_user'])
    ]
);