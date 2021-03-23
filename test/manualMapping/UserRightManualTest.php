<?php

// Dependencies
require_once '../../model/MappingTableAbstract.php';
require_once '../../model/UserRight.php';

// Creation of new instances for the tests
$classEmpty = new UserRight([]);
$classValidated = new UserRight([
    "id_user_right" => 2345,
    "date_authorized_user_right" => "2011-01-01T15:03",
    "fkey_status_id" => 4,
    "fkey_user_id" => 2345,
]);
$classNotValidated = new UserRight([
    "id_user_right" => 0,
    "date_authorized_user_right" => "",
    "fkey_status_id" => 0,
    "fkey_user_id" => 0,
]);

class test extends UserRight
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
    var_dump($classValidated->getIdUserRight());
    var_dump($classValidated->getDateAuthorizedUserRight());
    var_dump($classValidated->getFkeyStatusId());
    var_dump($classValidated->getFkeyUserId());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdUserRight(4536);
    $classValidated->setDateAuthorizedUserRight("2011-01-01T15:03");
    $classValidated->setFkeyStatusId(345);
    $classValidated->setFkeyUserId(45632);
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