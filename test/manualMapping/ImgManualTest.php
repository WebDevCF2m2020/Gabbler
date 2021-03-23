<?php

// Dependencies
require_once '../../model/MappingTableAbstract.php';
require_once '../../model/Img.php';

// Creation of new instances for the tests
$classEmpty = new Img([]);
$classValidated = new Img([
    "id_img" => 1,
    "name_img" => "image.jpeg",
    "active_img" => 1,
    "date_img" => "2012-03-24 17:45:12"
]);
$classNotValidated = new Img([
    "id_img" => 0,
    "name_img" => "",
    "active_img" => 0,
    "date_img" => ""
]);

class test extends Img
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
    var_dump($classValidated->getIdImg());
    var_dump($classValidated->getNameImg());
    var_dump($classValidated->getActiveImg());
    var_dump($classValidated->getDateImg());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdImg(20);
    $classValidated->setNameImg("picture2.png");
    $classValidated->setActiveImg(2);
    $classValidated->setDateImg("2010-10-10 10:10:10");
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