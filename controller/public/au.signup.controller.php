<?php

// REQUIRE THE SIGN IN MODEL
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'au.home.model.php';

// SIGN UP ENTRY
$au_signUpNickname = isset($_POST['sign_up_nickname']) ? au_formEntryCleaning($_POST['sign_up_nickname']) : "";
$au_signUpEmail = isset($_POST['sign_up_pwd']) ? au_formEntryCleaning($_POST['sign_up_email']) : "";
$au_signUpPwd = isset($_POST['sign_up_pwd']) ? au_formEntryCleaning($_POST['sign_up_pwd']) : "";
$au_signUpCheckPwd = isset($_POST['sign_up_check_pwd']) ? au_formEntryCleaning($_POST['sign_up_check_pwd']) : "";

// SOMEONE TRY TO SIGN UP :
if (isset($_POST['sign_up'])){

    // IF ONE OF THE FIELDS ARE EMPTY
    if (empty($_POST['sign_up_nickname']) || empty($_POST['sign_up_email']) || empty($_POST['sign_up_pwd']) || empty($_POST['sign_up_check_pwd'])) {

        // WARNING / SOMETHING WENT WRONG
        $au_warningSignUp = "Please fill in all the fields bellow";

        // IF THE PASSWORDS DO NOT MATCH
    } else if ($_POST['sign_up_pwd'] !== $_POST['sign_up_check_pwd']){

        // WARNING / SOMETHING WENT WRONG
        $au_warningSignUp = "Your passwords do not match";
        $au_signUpPwd = "";
        $au_signUpCheckPwd = "";

        // IF ALL THE FIELDS ARE FILLED
    } else {

        $au_signUpCheckUp = au_signUpSelect($au_signUpNickname,$au_signUpEmail, $db);
        $au_signUpCheckUpArray = mysqli_fetch_assoc($au_signUpCheckUp);

        // IF THE NICKNAME AND THE EMAIL ARE ALREADY USED (SEPARATELY)
        if (mysqli_num_rows($au_signUpCheckUp) > 1 ){

            // WARNING / SOMETHING WENT WRONG
            $au_warningSignUp = "Those email and nickname are already used by other users";

            // IF IT'S ONLY THE NICKNAME OR ONLY THE EMAIL OR BOTH (BY ONE USER)
        } else if (mysqli_num_rows($au_signUpCheckUp) === 1 ) {

            // NICKNAME AND EMAIL
            if ($au_signUpCheckUpArray['nickname_user'] === $au_signUpNickname && $au_signUpCheckUpArray['mail_user'] === $au_signUpEmail){

                // WARNING / SOMETHING WENT WRONG
                $au_warningSignUp = "Those nickname and email already belong to someone";
                $au_signUpNickname = "";
                $au_signUpEmail = "";
            }

            // NICKNAME
            if ($au_signUpCheckUpArray['nickname_user'] === $au_signUpNickname ){

                // WARNING / SOMETHING WENT WRONG
                $au_warningSignUp = "This nickname is already used";
                $au_signUpNickname = "";
            }

            // EMAIL
            if ($au_signUpCheckUpArray['mail_user'] === $au_signUpEmail ) {

                // WARNING / SOMETHING WENT WRONG
                $au_warningSignUp = "This email is already used";
                $au_signUpEmail = "";
            }

        } else if (mysqli_num_rows($au_signUpCheckUp) === 0 ){

            // PASSWORD_HASH
            $au_signUpRealPwd = password_hash($au_signUpPwd, PASSWORD_DEFAULT);

            // INSERT QUERY TO INITIALISE USER
            $au_queryInsertResult = au_signUpUserInsertInto($au_signUpNickname, $au_signUpRealPwd, $au_signUpEmail, $db);

            // IF THE INSERT INTO WORKED
            if($au_queryInsertResult){

                // CONFIRMATION MAIL PREPARATION
                $au_registrationArray = au_signUpSelectArray($au_signUpNickname, $db);
                $au_registrationSubject = "Confirm your registration to Gabbler";
                $au_registrationHeader = "MIME-Version: 1.0";
                $au_registrationHeader .= "Content-type: text/html; charset=UTF-8";
                $au_registrationHeader .= "From Gabbler !";
                $au_registrationHeader .= "X-Mailer: PHP/' . phpversion()";

                $au_registrationMessage = "
                    <html lang=\"fr\">
                        <body>
                        <style type=\"text/css\"></style>
                        <link href=\"https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap\" rel=\"stylesheet\"> 
                        <div style=\"background-color: #F7F7F7; width: 100%; height: 100%;padding: 50px 0 150px 0;font-family: 'Lato', sans-serif; color :#4B5259;\">
                        <div style=\"background-color: #CED4DA; width: 80%; height: auto; padding:5%; border-radius: 15px; margin:50px auto; \">
                            <h1> Welcome to <img alt=\"gabbler\" src=\"../public/img/gabbler.png\" style=\"position:relative; top :3px;\"> ". $au_signUpNickname. "</h1>
                            <br>
                            <h3>To activate your account, please click on link below, you'll be able to sign in.</h3>
                            <div style=\"margin-bottom: 45px;\">
                                <a href=\"http://localhost:63342/GabblerTest/public/index.php?user.home&action=registration&for=" . urlencode($au_signUpNickname) . "&key=" . urlencode($au_registrationArray['confirmation_key_user']) . "\" style=\"text-decoration: none; color: #E41537; font-weight: 300;\">http://localhost:63342/GabblerTest/public/index.php?user.home&action=registration&for=" . urlencode($au_signUpNickname) . "&key=" . urlencode($au_registrationArray['confirmation_key_user']) . "</a>
                            </div>
                            <hr style=\"border-bottom: 2px solid #4B5259;\">
                            <div>
                                <p style=\"margin:50px 0;\">Gabbler is a community chat where tolerance and respect prevail. Some rules:
                                    <br><br>
                                - Be positive and helpful to other users.
                                    <br>
                                - Be respectful to everyone.
                                    <br>
                                - Don't spread rumors.
                                    <br>
                                - Any kind of discrimination is totally prohibited and will result in a ban.
                                    <br>
                                - Spamming is not allowed.
                                    <br>
                                - Have fun !
                                    <br>
                                    <br>
                                    <br>
                                <span style=\"text-decoration: none; color: #E41537; font-weight: 300;\">Side note</span> : 
                                    <br><br>
                                    Your sign up nickname is <span style=\"font-weight: 700;\">". $au_signUpNickname ."</span>
                                    <br><br>
                                    You can change your info at any point on your profile page, but be careful to remember your nickname and password as they are needed to sign in.
                                    </p>
                            </div>
                            <div style=\"text-align: center;margin: 55px auto 10px; width: 100%\">
                                <p> Do you need help ? Send us a message to <a href=\"http://websitegabbler.com\" style=\"text-decoration: none; color: #E41537; font-weight: 300;\">gabbler.com/help</a><br>
                                <a href=\"http://gabbler.com\" target=\"_blank\" style=\"position: relative; top: 10px;\"><img alt=\"Gabbler\" src=\"../public/img/g_gabbler.png\" style=\"transform: scale(0.5);\"></a>
                            </div>
                        </div>
                        <p style=\"font-size: 0.6em; letter-spacing: 1px; text-align: center; position: relative; bottom: 40px;\">This is an automatic email, please do not reply</p>
                        </div>
                    </body>
                </html>";

                if(mail($au_signUpEmail,$au_registrationSubject,$au_registrationMessage,$au_registrationHeader)){

                // WARNING / SOMETHING WENT RIGHT
                $au_warningSignIn = "Welcome ". $au_signUpNickname. " ! Please confirm your email before signing in";
                $au_signInNickname = $au_signUpNickname;
                $au_signUpNickname = "";
                $au_signUpEmail = "";
                $au_signUpPwd = "";
                $au_signUpCheckPwd = "";

                } else {

                    // WARNING / SOMETHING WENT WRONG
                    $au_warningSignUp = "Please contact us, something went wrong with the verification email";

                }

                // IF THE INSERT INTO FAILED
            } else {

                // WARNING / SOMETHING WENT WRONG
                $au_warningSignUp = "Sorry, an error has occurred, please retry";
                $au_signUpNickname = "";
                $au_signUpEmail = "";
                $au_signUpPwd = "";
                $au_signUpCheckPwd = "";

            }
        }
    }
}