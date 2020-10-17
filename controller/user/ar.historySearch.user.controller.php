<?php 

require_once THE_ROOT . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'ar.historySearch.model.php';

$ar_search = isset($_POST['submit-search']) ? ar_keywordCleaning($_POST['search']) : "";
//echo var_dump($ar_search);

$ar_queryResult = ar_searchByKeyword($db,$ar_search);
// echo var_dump($$ar_queryResult);

//RECHERCHE DU NOMBRE DE RESULTATS DE LA REQUETE
$ar_numRow = mysqli_num_rows($ar_queryResult);
echo var_dump($ar_numRow);


$alert = $ar_numRow == 0 ? "There are no results matching your search" : "";

 







require_once THE_ROOT . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' .DIRECTORY_SEPARATOR . 'history.user.view.php';