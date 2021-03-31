<?php

/* 
 * home.public.controller
 */

// signup
if(isset($_POST['signup'])){

    // IF ONE OF THE FIELDS ARE EMPTY
    if (empty($_POST['nickname_user']) || empty($_POST['pwd_user']) || empty($_POST['pwd_user2']) || empty($_POST['mail_user'])){
        // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
        $warning = "Please fill all the fields bellow";
    // IF THE TWO PASSWORD DO NOT MATCH
    } else if ($_POST['pwd_user'] !== $_POST['pwd_user2']){
        // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
        $warning = "The passwords do not match";
    } else {
        $userInstance = new User($_POST);
        
    }

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