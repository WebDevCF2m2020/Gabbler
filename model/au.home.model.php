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