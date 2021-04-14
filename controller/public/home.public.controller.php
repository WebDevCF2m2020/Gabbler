<?php

/* 
 * home.public.controller
 */

$warning = "";

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
        // CHECK IF THE NICKNAME OR EMAIL ARE ALREADY USED
        $verifyExistence = $userManager->verifyExistence($_POST['nickname_user'], $_POST['mail_user']);

        // IF ALREADY USED
        if ($verifyExistence >= 1){
            // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
            $warning = "This nickname and/or email address are already used !";

        // IF NOT USED
        } else if ($verifyExistence === 0){

            // NEW USER
            $userInstance = new User($_POST);

            // IF SIGN UP SUCCESSFUL
            if ($userManager->signUp($userInstance)){

                // MAIL DATAS
                $userMail = $userManager->selectUserDataSignUp($_POST['mail_user']);

                // MAIL FOR CONFIRMATION
                $mailSignUp = new Swift_Mailer($transport);
                $messageSignUp = (new Swift_Message('Confirm your registration to Gabbler'))
                ->setFrom([MAIL_ADDRESS => 'GABBLER'])
                ->setTo([$_POST['mail_user'] => $userMail['nickname_user']]);

                $imageMain = $messageSignUp->embed(Swift_Image::fromPath('img/mail-component/gabbler-logo.png'));
                $imageFooter = $messageSignUp->embed(Swift_Image::fromPath('img/mail-component/g-small-letter.png'));

                // BODY from MailStaticBody::bodySignUp
                $messageSignUp->setBody(
                    MailStaticBody::bodySignUp(["user"=>$userMail,"img1"=>$imageMain,"img2"=>$imageFooter]),
                        'text/html'
                );

                if ($mailSignUp->send($messageSignUp)){

                    // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
                    $warning = "Welcome ".$_POST['nickname_user']." ! Please confirm your email before signing in";

                } else {

                    // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
                    $warning = "Sorry ".$_POST['nickname_user'].", but something went wrong";

                }
            }
        }
    }
}

// signin
if(isset($_POST['signin'])){
    $userInstance = new User($_POST);

    $verifyRights = $userManager->signInRightVerification($userInstance);

    if ($verifyRights === ''){
        if($userManager->signIn($userInstance)) {
            header("Location: ./");
            exit();
        }
    } else {
        $warning = $verifyRights;
    }
}

// confirm with mail
if(isset($_GET['registration'])){

    // UPDATE OF THE REGISTRATION STATUS
    $registration = $userManager->registrationUpdateUser($_GET['for'], $_GET['key']);

    if ($registration){

        // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
        $warning = "Welcome ".$_GET['for']." ! You can now sign in !";

    } else {

        // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
        $warning = "Hello ".$_GET['for'].", something went wrong, please retry";

    }
}

// test Twig with template_base.html.twig
echo $twig->render("public/home_page.html.twig",["connect"=>"Public","warning"=>$warning]);