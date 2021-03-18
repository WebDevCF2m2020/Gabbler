<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Room.php';

// Creation of new instances for the tests
$classEmpty = new Room([]);
$classValidated = new Room([
    "id_room" => 23456,
    "public_room" => 2,
    "archived_room" => 1,
    "name_room" => "Bonjour",
    "last_activity_room" => "2011-01-01T15:03:01.012345Z"
]);
$classNotValidated = new Room([
    "id_room" => 0,
    "public_room" => 0,
    "archived_room" => 0,
    "name_room" => "",
    "last_activity_room" => ""
]);

class test extends Room
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
    var_dump($classValidated->getIdRoom());
    var_dump($classValidated->getPublicRoom());
    var_dump($classValidated->getArchivedRoom());
    var_dump($classValidated->getNameRoom());
    var_dump($classValidated->getLastActivityRoom());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdRoom(23451);
    $classValidated->setPublicRoom(2);
    $classValidated->setArchiverRoom(1);
    $classValidated->setNameRoom("Room 23Room 23");
    $classValidated->setLastActivityRoom("2011-01-01T15:03:01.012345Z");
    var_dump($classValidated);
    ?>

    New setters and getters:
    <?php

    // $classValidated->setNewSetters('bonjour');
    // $classValidated->getNewSetters();

    $newTest = new Test(['test' => 'Bonjour']);
    $newTest->setTest('hello');

    var_dump($newTest->getTest());
    var_dump($newTest);
    ?>
</pre>