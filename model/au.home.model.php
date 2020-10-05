<?php

// CLEAN THE ENTRY FROM THE SIGN IN/UP FORMS
function au_formEntryCleaning($entry){
    return htmlspecialchars(strip_tags(trim($entry)), ENT_QUOTES, 'UTF-8');
}

// SIGN IN SELECT QUERY
function au_signInSelect($nickname, $db){
    $au_query = 'SELECT * FROM user WHERE nickname_user = "'.$nickname.'";';
    return  mysqli_query($db, $au_query);
}

// SIGN UP SELECT QUERY FOR CHECK UP
function au_signUpSelect($nickname,$email, $db){
    $au_query = 'SELECT * FROM user WHERE nickname_user = "'.$nickname.'" OR mail_user = "'.$email.'";';
    return  mysqli_query($db, $au_query);
}

// SIGN UP INSERT INTO QUERY
function au_signUpUserInsertInto($nickname, $pwd, $mail, $db){
    // FKEY_IMG_ID GENERATOR
    // $au_signUpImgRandom = rand(1,10);
    $au_signUpImgRandom = 1; // 1 image for this moment

    // VALIDATION_KEY GENERATOR
    $au_signUpValidationKey = md5(microtime(TRUE) * 100000);

    // TRANSACTION START
    mysqli_begin_transaction($db);


    // INSERT INTO QUERYS
    $au_insertUser = mysqli_query($db,"INSERT INTO `user` (nickname_user, pwd_user, mail_user, signup_date_user, color_user, confirmation_key_user, validation_status_user) VALUES ('$nickname', '$pwd', '$mail', NOW(), '0, #DF2F5C', '$au_signUpValidationKey', 0)");
    $au_idUser = mysqli_insert_id($db);
    $au_insertRole = mysqli_query($db, "INSERT INTO `role_has_user` (role_has_user_id_role, role_has_user_id_user) VALUES (2, '$au_idUser')");
    $au_insertImg = mysqli_query($db, "INSERT INTO `user_has_img` (user_has_img_id_user, user_has_img_id_img) VALUES ('$au_idUser',".$au_signUpImgRandom.")");
    $au_insertRight = mysqli_query($db, "INSERT INTO `user_right` (fkey_status_id, fkey_user_id) VALUES (2,'$au_idUser')");

    // IF EVERY QUERY PASSED THRU
    if($au_insertUser && $au_insertRole && $au_insertImg && $au_insertRight){

        // COMMIT
        mysqli_commit($db);
        return true;

        // IF ONE QUERY OR MORE DIDN'T PASS THRU
    }else {

        // ROLLBACK
        mysqli_rollback($db);
        return false;
    }
}