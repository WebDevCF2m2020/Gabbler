<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Reported.php';

// Creation of new instances for the tests
$classEmpty = new Reported([]);
$classValidated = new Reported([
    "id_reported" => 1,
    "inquiry_reported" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.</br>",
    "processed_reported" => 1,
    "fkey_category_id" => 2,
    "fkey_message_id" => 3
]);
$classNotValidated = new Reported([
    "id_reported" => 0,
    "inquiry_reported" => "",
    "processed_reported" => 43,
    "fkey_category_id" => 0,
    "fkey_message_id" => 0
]);

class test extends Reported
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
    var_dump($classValidated->getIdReported());
    var_dump($classValidated->getInquiryReported());
    var_dump($classValidated->getProcessedReported());
    var_dump($classValidated->getFkeyMessageId());
    var_dump($classValidated->getFkeyCategoryId());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdReported(5);
    $classValidated->setInquiryReported('Reported');
    $classValidated->setProcessedReported(2);
    $classValidated->setFkeyMessageId(344);
    $classValidated->setFkeyCategoryId(3);
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