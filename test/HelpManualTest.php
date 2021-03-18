<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Help.php';

// Creation of new instances for the tests
$classEmpty = new Help([]);
$classValidated = new Help([
    "id_help" => 1,
    "mail_help" => "test@test.com",
    "nickname_help" => "<p>John Doe</p>",
    "subject_help" => "New problem",
    "content_help" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a rhoncus metus. Phasellus lobortis, turpis vel eleifend sagittis, erat ipsum egestas quam, eu suscipit ante ante ut ante. Mauris et ex tincidunt, fermentum lectus eget, scelerisque sem. ",
    "processed_help" => 1,
    "user_id" => 56
]);
$classNotValidated = new Help([
    "id_help" => 0,
    "mail_help" => "test",
    "nickname_help" => "testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttestttesttest",
    "subject_help" => "New proble?>'m<br>",
    "content_help" => "",
    "processed_help" => 6,
    "user_id" => 0
]);

class test extends Help
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
    var_dump($classValidated->getIdHelp());
    var_dump($classValidated->getMailHelp());
    var_dump($classValidated->getNicknameHelp());
    var_dump($classValidated->getSubjectHelp());
    var_dump($classValidated->getContentHelp());
    var_dump($classValidated->getProcessedHelp());
    var_dump($classValidated->getUserId());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdHelp(2);
    $classValidated->setMailHelp("tes2@tes2.fr");
    $classValidated->setNicknameHelp("Mary Jane");
    $classValidated->setSubjectHelp("Need help");
    $classValidated->setContentHelp("Hello World !");
    $classValidated->setProcessedHelp(2);
    $classValidated->setUserId(7894);
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