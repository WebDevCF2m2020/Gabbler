<?php

/* 
 * Private Admin Controller
 */

// test Twig with connected_temp_page.html.twig
$messageHelp = new HelpManager($DB);
$img = new ImgManager($DB);
echo $twig->render("private/admin/private_admin.html.twig",
    [
        "connect" => $_SESSION,
        "messageHelp" => $messageHelp->selectAll(),
        "img" => $img->selectByUser($_SESSION['id_user'])
    ]
);