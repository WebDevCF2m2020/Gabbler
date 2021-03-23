<?php

//dependencies
require_once '../../model/MappingTableAbstract.php';
require_once '../../model/Category.php';

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
class test extends Category
{
    public function getTest()
    {
        return $this->test;
    }

    public function setTest($test)
    {
        $this->test = $test;
    }
}

// Display of test results
?>
<pre>
    Class Empty :
    <?php var_dump($classEmpty); ?>

    Class Validated :
    <?php var_dump($classValidated) ?>

    Class Not Validated :
    <?php var_dump($classNotValidated) ?>

    Testing getters :
    <?php
    var_dump($classValidated->getIdCategory());
    var_dump($classValidated->getNameCategory());
    ?>
    Testing setters :
    <?php
    $classValidated->setIdCategory(3);
    $classValidated->setNameCategory("travel");
    var_dump($classValidated);
    ?>

New setters and getters:
    <?php

    // $classValidated->setNewSetters('bonjour');
    // $classValidated->getNewSetters();

    $newTest = new Test([]);
    $newTest->setTest('good morning');

    var_dump($newTest->getTest());
    var_dump($newTest);
    ?>
</pre>