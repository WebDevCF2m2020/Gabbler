<?php

// Dependencies
require_once '../../model/MappingTableAbstract.php';
require_once '../../model/Status.php';

// Creation of new instances for the tests
$classEmpty = new Status([]);
$classValidated = new Status([
    "id_status" => 324,
    "name_status" => "nouveau status"
]);
$classNotValidated = new Status([
    "id_status" => 0,
    "name_status" => "nouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau statusnouveau status"
]);

class test extends Status
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
    var_dump($classValidated->getIdStatus());
    var_dump($classValidated->getNameStatus());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdStatus(345);
    $classValidated->setNameStatus("Nouveau Status");
    var_dump($classValidated);
    ?>

    New setters and getters:
    <?php

    // $classValidated->setNewSetters('bonjour');
    // $classValidated->getNewSetters();

    $newTest = new Test(['test' => 'Bonjour']);
    $newTest->setTest('Hello');

    var_dump($newTest->getTest());
    var_dump($newTest);
    ?>
</pre>