<?php

/* 
 * help.public.controller
 */
// if form is submitted

if(isset($_POST['sendHelp'])){
    if (!empty($_POST['mail_help']) && !empty($_POST['nickname_help']) && !empty($_POST['subject_help']) && !empty($_POST['content_help'])){

        $newHelp = new Help($_POST);
        $help = $helpManager->createtHelp($newHelp);
        if($help===true){
            echo "your request for help has been sent";
        }else{
            echo "An error has occurred. Please try again";
        }
     }
}

//VIEW
echo $twig->render("public/help_page.html.twig",["connect"=>"Public"]);