<?php

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . "/config/config.php";

// Create autoload
spl_autoload_register(
    function ($className) {
        require THE_ROOT. "/model/" . $className . ".php";
    }
);
// Dependencies
//require_once '../model/MappingTableAbstract.php';
//require_once '../model/Role.php';
// Test model/Role.php here

//Creation of instances for test 
$classEmpty = new Role([]);
$classValidated = new role([
    "id_role"=>1,
    "name_role"=>"admin"
]);
$classNotValidated = new Role([
    "id_role"=>0,
    "name_role"=>"chic-choc"
]);

//create a dummy extends files into this test
class test extends Role{
    public function getTest()
    {
        return $this->test;
    }
    public function setTest($test)
    {
        $this->test = $test;
    }
}
//Display of thest results
?>
<pre>
Class Empty : 
<?php var_dump($classEmpty); ?>

Class Validated :
<?php var_dump($classValidated); ?>

Class Not Validated : 
<?php var_dump($classNotValidated); ?>

Testing getters : 
<?php
var_dump($classValidated->getIdRole());
var_dump($classValidated->getNameRole());
?>

Testing setters : 
<?php
$classValidated->setIdRole(2);
$classValidated->setNameRole("lafolleducode");
var_dump($classValidated);
?>

New setters and getters : 
<?php

$newTest = new Test([]);
$newTest->setTest('hello');

var_dump($newTest->getTest());
var_dump($newTest);
?>
</pre>