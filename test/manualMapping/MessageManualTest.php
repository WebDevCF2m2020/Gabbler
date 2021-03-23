<?php

// Dependencies
require_once '../../model/MappingTableAbstract.php';
require_once '../../model/Message.php';

// Creation of new instances for the tests
$classEmpty = new Message([]);
$classValidated = new Message([
    "id_message" => 324,
    "date_message" => "2011-01-01T15:03:01.012345Z",
    "content_message" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    "archived_message" => 2,
    "fkey_user_id" => 345,
    "fkey_room_id" => 54623
]);
$classNotValidated = new Message([
    "id_message" => 0,
    "date_message" => "",
    "content_message" => "",
    "archived_message" => 0,
    "fkey_user_id" => 0,
    "fkey_room_id" => 0
]);

class test extends Message
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
    var_dump($classValidated->getIdMessage());
    var_dump($classValidated->getDateMessage());
    var_dump($classValidated->getContentMessage());
    var_dump($classValidated->getArchivedMessage());
    var_dump($classValidated->getFkeyUserId());
    var_dump($classValidated->getFkeyRoomId());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdMessage(345);
    $classValidated->setDateMessage("2011-01-01T15:03:01.012345Z");
    $classValidated->setContentMessage("Message");
    $classValidated->setArchivedMessage(2);
    $classValidated->setFkeyUserId(4352);
    $classValidated->setFkeyRoomId(34256432);
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