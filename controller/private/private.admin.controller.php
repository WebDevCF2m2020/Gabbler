<?php

/* 
 * Private Admin Controller
 */


// test Twig with connected_temp_page.html.twig
echo $twig->render("private/connect_temp_page.html.twig",["connect"=>$_SESSION]);