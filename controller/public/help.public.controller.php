<?php

/* 
 * help.public.controller
 */

// if form is submitted 
if(isset($_POST['mail_help'])){
    
    
}

echo $twig->render("public/help_page.html.twig",["connect"=>"Public"]);