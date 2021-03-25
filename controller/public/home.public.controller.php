<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// signup
if(isset($_POST['signup'])){
    $userInstance = new User($_POST);
    
}

// signin
if(isset($_POST['signin'])){
    $userInstance = new User($_POST);
}

// confirm with mail
if(isset($_GET['registration'])){
    
}

// test Twig with template_base.html.twig
echo $twig->render("template_base.html.twig",["connect"=>"Public"]);