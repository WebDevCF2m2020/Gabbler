<?php

/* 
 * home.public.controller
 */

// signup
if(isset($_POST['signup'])){
    $userInstance = new User($_POST);
    // $userManager -> insert -> mail
}

// signin
if(isset($_POST['signin'])){
    $userInstance = new User($_POST);
    // $userManager -> connect -> session -> redirect
}

// confirm with mail
if(isset($_GET['registration'])){
    
    // $userManager -> confirmation mail
}

// test Twig with template_base.html.twig
echo $twig->render("template_gabbler.html.twig",["connect"=>"Public"]);