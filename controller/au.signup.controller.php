<?php

// REQUIRE THE SIGN IN MODEL
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'au.home.model.php';

// SIGN UP ENTRY
$au_signUpNickname = isset($_POST['sign_up_nickname']) ? au_formEntryCleaning($_POST['sign_up_nickname']) : "";
$au_signUpEmail = isset($_POST['sign_up_pwd']) ? au_formEntryCleaning($_POST['sign_up_email']) : "";
$au_signUpPwd = isset($_POST['sign_up_pwd']) ? au_formEntryCleaning($_POST['sign_up_pwd']) : "";
$au_signUpCheckPwd = isset($_POST['sign_up_check_pwd']) ? au_formEntryCleaning($_POST['sign_up_check_pwd']) : "";
