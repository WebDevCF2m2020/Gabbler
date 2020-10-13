<?php 

require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ar.historySearch.model.php';

$ar_search = isset($_GET['search']) ? ar_keywordCleaning($_GET['search']) : "";

$ar_queryResult = ar_searchByKeyword($db,$ar_search);


if(!$ar_queryResult){
    $alert = "There are no results matching your search";
}





require_once THE_ROOT . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' .DIRECTORY_SEPARATOR . 'history.user.view.php';