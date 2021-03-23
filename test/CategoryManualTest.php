<?php

//dependencies
require_once '../../model/MappingTableAbstract.php';
require_once '../../model.Category.php';

// Creation of new instances for the tests
$classEmpty = new Category([]);
$classValidated = new Category([
    "id_category" => 1,
    "namecategory" => "travel"
]);
$classNotValidated = new Category([
    "id_category" => 0,
    "name_category" => "egfthrferf"
]);
