<?php

/* 
 * Private Moderator Controller
 */

// test Twig with connected_temp_page.html.twig
echo $twig->render("private/connected_temp_page.html.twig",["connect"=>$_SESSION]);