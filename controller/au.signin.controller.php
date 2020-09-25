<?php
// SESSION START
session_start();

// IF THE USER IS ALREADY CONNECTED
if(isset($_SESSION['session_id'])&&$_SESSION['session_id'] === session_id()){
    header("Location: ?p=room.user");
}

// REQUIRE THE SIGN IN MODEL
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'au.home.model.php';

// SIGN IN ENTRY'S
$au_signInNickname = isset($_POST['sign_in_nickname']) ? au_formEntryCleaning($_POST['sign_in_nickname']) : "";

$au_signInPwd = isset($_POST['sign_in_pwd']) ? au_formEntryCleaning($_POST['sign_in_pwd']) : "";