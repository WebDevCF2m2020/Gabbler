<?php

/* 
 * Private Admin Controller
 */


// test Twig with connected_temp_page.html.twig
echo $twig->render("private/admin/private_admin.html.twig",["connect"=>$_SESSION]);