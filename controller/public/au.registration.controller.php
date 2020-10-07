<?php
// IF THE REGISTRATION ACTION IS READY
if (isset($_GET['action']) && $_GET['action'] === "registration"){

    // RECOVERY OF THE VARs NEEDED
    $au_registrationFor = $_GET['for'];
    $au_registrationKey = $_GET['key'];

    // USER INFORMATION
    $au_userArray = au_signUpSelectArray($au_registrationFor, $db);

    // IF THIS USER IS ALREADY CONFIRMED
    if ($au_userArray['validation_status_user'] == 1){

        // WARNING / SOMETHING WENT RIGHT
        $au_warningSignIn = "Hello ". $au_registrationFor . " ! You've already confirmed your email !";
        $au_signInNickname = $au_registrationFor;

        // IF THIS USER HAS DELETED HIS ACCOUNT
    } else if ($au_userArray['validation_status_user'] == 2) {

        // WARNING / SOMETHING WENT WRONG
        $au_warningSignIn = $au_registrationFor . ", your account has been deleted";

        // IF THIS USER VALIDATION STATUS IS READY FOR THE UPDATE
    } else if (($au_userArray['validation_status_user'] == 0) && ($au_registrationKey == $au_userArray['confirmation_key_user'])) {

        // USER VALIDATION STATUS UPDATE
        $au_registrationUpdate = au_registrationUpdateUser($au_registrationFor, $au_registrationKey, $db);

        // IF THE UPDATE DID GO THROUGH
        if ($au_registrationUpdate){

            // WARNING / SOMETHING WENT RIGHT
            $au_warningSignIn = "Hello ". $au_registrationFor . " ! Your email is validated, you can sign in !";
            $au_signInNickname = $au_registrationFor;

            // IF THE UPDATE DIDN'T GO THROUGH
        } else {

            // WARNING / SOMETHING WENT WRONG
            $au_warningSignIn = "Your account hasn't been activated, please retry";

        }
    } else {

        // WARNING / SOMETHING WENT WRONG
        $au_warningSignIn = "Your account cannot be activated, please contact us.";

    }

}