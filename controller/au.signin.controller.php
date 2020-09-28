<?php

// IF THE USER IS ALREADY CONNECTED
if(isset($_SESSION['session_id'])&&$_SESSION['session_id'] === session_id()){
    header("Location: ?p=room.user");
}

// REQUIRE THE SIGN IN MODEL
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'au.home.model.php';

// SIGN IN ENTRY'S
$au_signInNickname = isset($_POST['sign_in_nickname']) ? au_formEntryCleaning($_POST['sign_in_nickname']) : "";

$au_signInPwd = isset($_POST['sign_in_pwd']) ? au_formEntryCleaning($_POST['sign_in_pwd']) : "";

// SOMEONE TRY TO SIGN IN :
if (isset($_POST['sign_in'])){

    // IF ONE OR BOTH THE FIELD ARE EMPTY
    if (empty($_POST['sign_in_nickname']) || empty($_POST['sign_in_pwd'])) {

        // WARNING / SOMETHING WENT WRONG
        $au_warningSignIn = "Please fill in both fields bellow";

        // IF BOTH FIELD ARE FILLED
    } else {

        $au_signInQuery = au_signInSelect($au_signInNickname, $db);
        $au_resultInArray = mysqli_fetch_assoc($au_signInQuery);
        $au_checkedPwd = mysqli_num_rows($au_signInQuery) > 0 ? password_verify($au_signInPwd, $au_resultInArray['pwd_user']) : false ;

        // IF THE NICKNAME DOESN'T MATCH ONE IN THE DB
        if (mysqli_num_rows($au_signInQuery) === 0){

            // WARNING / SOMETHING WENT WRONG
            $au_warningSignIn = "This nickname doesn't belong to any account";
            $au_signInNickname = "";

            // IF THE NICKNAME AND PASSWORD ARE RIGHT
        } else if (mysqli_num_rows($au_signInQuery) === 1 && $au_checkedPwd){

            // IF THE VALIDATION STATUS IS VALIDATED
            if ($au_resultInArray['validation_status_user'] == 1){

                // FILL THE SESSION WITH USER INFORMATION
                $_SESSION['session_id'] = session_id();
                $_SESSION['user'] = $au_resultInArray;

                // REDIRECTION
                header('Location: ?p=room.user');
                exit();

                // IF THE VALIDATION STATUS IS NOT VALIDATED
            } else {

                // WARNING / SOMETHING WENT WRONG
                $au_warningSignIn = "Please confirm your email first";
                $au_signInNickname = "";
                $au_signInPwd = "";
            }
            // IF THE PASSWORD ENTRY IS WRONG
        } else if (mysqli_num_rows($au_signInQuery) === 1 && !$au_checkedPwd){

            // WARNING / SOMETHING WENT WRONG
            $au_warningSignIn = "Your password is incorrect";
            $au_signInPwd = "";

        } else {
            // WARNING / SOMETHING WENT WRONG
            $au_warningSignIn = "Something went wrong, please retry";
            $au_signInNickname = "";
            $au_signInPwd = "";
        }
    }
}
