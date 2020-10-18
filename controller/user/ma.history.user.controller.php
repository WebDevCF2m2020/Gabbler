<?php
// dependencies for history message and pagination
/*
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ma.history.model.php';
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'pagination.model.php';*/

// count all messages
$countAllHistoryMessages = countAllMsg($db);

// number of messages per page
$nbPerPage = 2;

if (isset($_GET['pagination'])&&ctype_digit($_GET['pagination'])){
    $currentPage = (int) $_GET['pagination'];
    if(!$currentPage) $currentPage=1;
}else{
    $currentPage = 1;
}

// create begin LIMIT's value with $currentPage value and $nbPerPage
$fisrtArgHistoryLimit = ($currentPage-1)*$nbPerPage;


// load all messages with pagination
$recupHistoryPage = messagesHistoryWithPagination($db,$fisrtArgHistoryLimit,$nbPerPage);

// load pagination
$pagination = pagination($countAllHistoryMessages, $currentPage, $nbPerPage,  "?p=history.user", "&pagination");

//-----------------ALAIN----------------------------

//FILTER KEYWORD FOR SEARCH FIELD
$ar_search = isset($_POST['submit-search']) ? ar_keywordCleaning($_POST['search']) : "";

//IF KEYWORD
if(!empty($ar_search)) {

//SELECT * LIKE KEYWORD
    $ar_queryResult = ar_searchByKeyword($db, $ar_search);


//NUMBER OF RESULTS
    $ar_numRow = mysqli_num_rows($ar_queryResult);


//IN CASE THERE'S NO RESULT
    $alert = $ar_numRow == 0 ? "There are no results matching your search" : "";


    // FETCH ARRAY OF RESULTS
    $ar_row = mysqli_fetch_all($ar_queryResult,MYSQLI_ASSOC);
}

// VIEW
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' .DIRECTORY_SEPARATOR . 'history.user.view.php';
