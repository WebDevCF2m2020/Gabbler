<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Online.php';

// Creation of new instances for the tests
$classEmpty = new Online([]);
$classValidated = new Online([
    "id_online" => 10,
    "last_activity_online" => "2021-03-14 17:45:12",
    "connected_online" => 1,
    "fkey_user_id" => 15
]);
$classNotValidated = new Online([
    "id_online" => 0,
    "last_activity_online" => "",
    "connected_online" => 4,
    "fkey_user_id" => 0
]);

class test extends Online
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
    var_dump($classValidated->getIdOnline());
    var_dump($classValidated->getLastActivityOnline());
    var_dump($classValidated->getConnectedOnline());
    var_dump($classValidated->getFkeyUserId());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdOnline(2);
    $classValidated->setLastActivityOnline("2001-03-14 17:45:12");
    $classValidated->setConnectedOnline(2);
    $classValidated->setFkeyUserId(45);
    var_dump($classValidated);
    ?>

    New setters and getters:
    <?php

    // $classValidated->setNewSetters('bonjour');
    // $classValidated->getNewSetters();

    $newTest = new Test([]);
    $newTest->setTest('hello');

    var_dump($newTest->getTest());
    var_dump($newTest);
    ?>
</pre>