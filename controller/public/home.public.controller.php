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
    if($userManager->signIn($userInstance)) {
        header("Location: ./");
        exit();
    }
}

// confirm with mail
if(isset($_GET['registration'])){
    
    // $userManager -> confirmation mail
}
var_dump($_POST);
// test Twig with template_base.html.twig
echo $twig->render("public/home_page.html.twig",["connect"=>"Public"]);