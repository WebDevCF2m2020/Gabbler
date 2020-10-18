<?php 
//CALL MODEL
require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ar.historySearch.model.php';

//CALL KEYWORDCLEANING 
$ar_search = isset($_POST['submit-search']) ? ar_keywordCleaning($_POST['search']) : "";


//CALL SEARCHBYKEYWORD
$ar_queryResult = ar_searchByKeyword($db,$ar_search);


//NUMBER OF RESULTS
$ar_numRow = mysqli_num_rows($ar_queryResult);


//IN CASE THERE'S NO RESULT
$alert = $ar_numRow === 0 ? "There are no results matching your search" :"";


//FETCH RESULTS
$ar_row = mysqli_fetch_assoc($ar_queryResult);



//HIGHLIGHT RESULTS
$ar_user = !empty($ar_search)?ar_highlightWords($ar_row['nickname_user'],$ar_search):"";

$ar_message = !empty($ar_search)?ar_highlightWords($ar_row['content_message'],$ar_search):"";

$ar_date = !empty($ar_search)?ar_highlightWords($ar_row['date_message'],$ar_search):"";

$ar_room = !empty($ar_search)?ar_highlightWords($ar_row['name_room'],$ar_search):"";








require_once THE_ROOT . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' .DIRECTORY_SEPARATOR . 'history.user.view.php';