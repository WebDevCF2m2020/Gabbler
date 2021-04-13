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

                $messageSignUp->setBody(
                    ' <html lang="fr"> '.
                    '<body style="background-color: #F7F7F7;"> '.
                    '<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel=\"stylesheet"> '.
                    '<div style="background-color: #F7F7F7; width: 100%; height: 100%;padding: 50px 0 150px 0;font-family: \'Lato\', sans-serif; color : #4B5259;">
                        <div style="background-color: #CED4DA; width: 80%; height: auto; padding:5%; border-radius: 15px; margin:50px auto; ">
                            <h1> Welcome to <img alt="gabbler" src="'.$imageMain.'" style="position:relative; top :3px;"> ' . $userMail['nickname_user'] . ' !</h1>
                            <br>
                            <h3 style="color : #4B5259;">To activate your account, please click on link below, you will be able to sign in.</h3>
                            <div style="margin-bottom: 45px;">
                                <a href="https://glabberdev.webdev-cf2m.be/index.php/?registration&for=' . urlencode($userMail['nickname_user']) . '&key=' . urlencode($userMail['confirmation_key_user']) . '" style="text-decoration: none; color: #E41537; font-weight: 300;">https://glabberdev.webdev-cf2m.be/index.php/?registration&for=' . urlencode($userMail['nickname_user']) . '&key=' . urlencode($userMail['confirmation_key_user']) . '</a>
                            </div>
                            <hr style="border-bottom: 2px solid #4B5259;">
                            <div>
                                <p style="margin:50px 0; color : #4B5259;">Gabbler is a community chat where tolerance and respect prevail. Some rules:
                                    <br><br>
                                - Be positive and helpful to other users.
                                    <br>
                                - Be respectful to everyone.
                                    <br>
                                - Don\'t spread rumors.
                                    <br>
                                - Any kind of discrimination is totally prohibited and will result in a ban.
                                    <br>
                                - Spamming is not allowed.
                                    <br>
                                - Have fun !
                                    <br>
                                    <br>
                                    <br>
                                <span style="text-decoration: none; color: #E41537; font-weight: 300;">Side note</span> : 
                                    <br><br>
                                    Your sign up nickname is <span style="font-weight: 700;">' . $userMail['nickname_user'] . '</span>
                                    <br><br>
                                    You can change your info at any point on your profile page, but be careful to remember your nickname and password as they are needed to sign in.
                                    </p>
                            </div>
                            <div style="text-align: center;margin: 55px auto 10px; width: 100%">
                                <p style="color : #4B5259;"> Do you need help ? Send us a message to <a href="http://websitegabbler.com" style="text-decoration: none; color: #E41537; font-weight: 300;">gabbler.com/help</a><br>
                                <a href="https://glabberdev.webdev-cf2m.be/?help" target="_blank" style="position: relative; top: 10px;"><img alt="Gabbler" src="'.$imageFooter.'" style="transform: scale(0.5); margin: 25px;"></a>
                            </div>
                        </div>
                        <p style="font-size: 0.6em; letter-spacing: 1px; text-align: center; position: relative; bottom: 40px;">This is an automatic email, please do not reply</p>
                        </div>
                    </body>
                </html>','text/html'
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
    if($userManager->signIn($userInstance)) {
        header("Location: ./");
        exit();
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
var_dump($_POST);
echo'<br>'.$warning;
// test Twig with template_base.html.twig
echo $twig->render("public/home_page.html.twig",["connect"=>"Public"]);