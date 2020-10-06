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
                $au_registrationHeader = "MIME-Version: 1.0\n";
                $au_registrationHeader .= "Content-type: text/html; charset=UTF-8\n";
                $au_registrationHeader .= "From : dev@gabblerdev.webdev-cf2m.be\n";
                $au_registrationHeader .= "X-Mailer: PHP/' . phpversion()\n";

                $au_registrationMessage = '
                    <html lang="fr">
                        <body>
                        <style type="text/css"></style>
                        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel=\"stylesheet"> 
                        <div style="background-color: #F7F7F7; width: 100%; height: 100%;padding: 50px 0 150px 0;font-family: \'Lato\', sans-serif; color : #4B5259;">
                        <div style="background-color: #CED4DA; width: 80%; height: auto; padding:5%; border-radius: 15px; margin:50px auto; ">
                            <h1> Welcome to <img alt="gabbler" src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJIAAAAaCAYAAABcmAU7AAAACXBIWXMAAAsTAAALEwEAmpwYAAAFyGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDggNzkuMTY0MDM2LCAyMDE5LzA4LzEzLTAxOjA2OjU3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMCAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIwLTEwLTAxVDExOjE1OjM2KzAyOjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMC0xMC0wMVQxMToxODoxMiswMjowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMC0xMC0wMVQxMToxODoxMiswMjowMCIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MmM4OWQwY2EtNTkwMS00NzRmLTkxY2UtYzExNzBmOTM2NWRiIiB4bXBNTTpEb2N1bWVudElEPSJh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" style="position:relative; top :3px;"> '. $au_signUpNickname. ' !</h1>
                            <br>
                            <h3>To activate your account, please click on link below, you will be able to sign in.</h3>
                            <div style="margin-bottom: 45px;">
                                <a href="https://glabberdev.webdev-cf2m.be/action=registration&for=' . urlencode($au_signUpNickname) . '&key=' . urlencode($au_registrationArray['confirmation_key_user']) . '" style="text-decoration: none; color: #E41537; font-weight: 300;">https://glabberdev.webdev-cf2m.be/action=registration&for=' . urlencode($au_signUpNickname) . '&key=' . urlencode($au_registrationArray['confirmation_key_user']) . '</a>
                            </div>
                            <hr style="border-bottom: 2px solid #4B5259;">
                            <div>
                                <p style="margin:50px 0;">Gabbler is a community chat where tolerance and respect prevail. Some rules:
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
                                    Your sign up nickname is <span style="font-weight: 700;">'. $au_signUpNickname .'</span>
                                    <br><br>
                                    You can change your info at any point on your profile page, but be careful to remember your nickname and password as they are needed to sign in.
                                    </p>
                            </div>
                            <div style="text-align: center;margin: 55px auto 10px; width: 100%">
                                <p> Do you need help ? Send us a message to <a href="http://websitegabbler.com" style="text-decoration: none; color: #E41537; font-weight: 300;">gabbler.com/help</a><br>
                                <a href="https://glabberdev.webdev-cf2m.be" target="_blank" style="position: relative; top: 10px;"><img alt="Gabbler" src=" data:image/png;base64,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" style="transform: scale(0.5);"></a>
                            </div>
                        </div>
                        <p style="font-size: 0.6em; letter-spacing: 1px; text-align: center; position: relative; bottom: 40px;">This is an automatic email, please do not reply</p>
                        </div>
                    </body>
                </html>';

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