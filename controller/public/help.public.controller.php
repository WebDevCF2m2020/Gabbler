<?php

/*
 * help.public.controller
 */

$warning = "";

// if form is submitted

if (isset($_POST['sendHelp'])) {
    if (!empty($_POST['mail_help']) && !empty($_POST['nickname_help']) && !empty($_POST['subject_help']) && !empty($_POST['content_help'])) {

        $newHelp = new Help($_POST);
        $help = $helpManager->createtHelp($newHelp);
        if ($help === true) {
            $warning = "Your request for help has been sent";
            // MAIL FOR CONFIRMATION
            $mailSignUp = new Swift_Mailer($transport);
            $messageSignUp = (new Swift_Message('Confirm your help message to Gabbler'))
                    ->setFrom([MAIL_ADDRESS => 'GABBLER'])
                    ->setTo([$_POST['mail_help'] => $_POST['nickname_help']]);

            $imageMain = $messageSignUp->embed(Swift_Image::fromPath('img/mail-component/gabbler-logo.png'));
            $imageFooter = $messageSignUp->embed(Swift_Image::fromPath('img/mail-component/g-small-letter.png'));

            // BODY from MailStaticBody::bodySignUp
            $messageSignUp->setBody(
                    MailStaticBody::bodyCreateHelp(["user" => $_POST, "img1" => $imageMain, "img2" => $imageFooter]),
                    'text/html'
            );

            if ($mailSignUp->send($messageSignUp)) {

                // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
                $warning = "Your request for help has been sent";

                // MAIL FOR ADMIN
                $mailAdmin = $userManager->recupAdminMailForHelp();
                //var_dump($mailAdmin);
                if (is_array($mailAdmin) && !empty($mailAdmin)) {
                    foreach ($mailAdmin as $item) {
                        $mailSignUp = new Swift_Mailer($transport);
                        $messageSignUp = (new Swift_Message('Help message to Gabbler'))
                                ->setFrom([MAIL_ADDRESS => 'GABBLER'])
                                ->setTo([$item['mail_user'] => $item['nickname_user']]);

                        $imageMain = $messageSignUp->embed(Swift_Image::fromPath('img/mail-component/gabbler-logo.png'));
                        $imageFooter = $messageSignUp->embed(Swift_Image::fromPath('img/mail-component/g-small-letter.png'));

                        // BODY from MailStaticBody::bodyAdminHelp
                        $messageSignUp->setBody(
                                MailStaticBody::bodyAdminHelp(["user" => $_POST, "img1" => $imageMain, "img2" => $imageFooter]),
                                'text/html'
                        );
                    }
                    $mailSignUp->send($messageSignUp);
                }
            } else {

                // WARNING TO DISPLAY IN HOME_PAGE.HTML.TWIG
                $warning = "Sorry, something went wrong";
            }
        }
    } else {
        $warning = "An error has occurred. Please try again";
    }
}


//VIEW
echo $twig->render("public/help_page.html.twig", ["connect" => "Public", "warning" => $warning]);
