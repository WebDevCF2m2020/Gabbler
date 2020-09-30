<?php

// REQUIRE THE SIGN IN MODEL
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'au.home.model.php';

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

            $au_queryInsertResult = au_signUpUserInsertInto($au_signUpNickname, $au_signUpRealPwd, $au_signUpEmail, $db);

            // IF THE INSERT INTO WORKED
            if($au_queryInsertResult){

                // WARNING / SOMETHING WENT RIGHT
                $au_warningSignIn = "Welcome ". $au_signUpNickname. " ! Please confirm your email before signing in";


                // IF THE INSERT INTO FAILED
            } else {

                // WARNING / SOMETHING WENT WRONG
                $au_warningSignUp = "Sorry, an error has occurred, please retry";

            }
        }
    }
}