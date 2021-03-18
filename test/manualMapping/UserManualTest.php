<?php

// Dependencies
require_once '../../model/MappingTableAbstract.php';
require_once '../../model/User.php';

// Creation of new instances for the tests
$classEmpty = new User([]);
$classValidated = new User([
    "id_user" => 4,
    "nickname_user" => "Jojo385",
    "pwd_user"=> "\$2y\$10\$NIoutmmjxASRlL8uq.3Tqei3i77Clw6zUZ7FDc21rpDWlebzcoRXW",
    "mail_user" => "test@test.com",
    "signup_date_user" => "2012-03-24 17:45:12",
    "color_user" => '{"background":"#f6f6f6","color":"#505352"}',
    "confirmation_key_user" => "eftlisgyewtuibxyvwclAbfyftaewpwsngowqugof",
    "validation_status_key" => 2
]);
$classNotValidated = new User([
    "id_user" => 0,
    "nickname_user" => "",
    "pwd_user"=> "",
    "mail_user" => "test.com",
    "signup_date_user" => "now",
    "color_user" => "#f6f6f6",
    "confirmation_key_user" => "",
    "validation_status_key" => 0
]);

class test extends User
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
    var_dump($classValidated->getIdUser());
    var_dump($classValidated->getNicknameUser());
    var_dump($classValidated->getPwdUser());
    var_dump($classValidated->getMailUser());
    var_dump($classValidated->getSignupDateUser());
    var_dump($classValidated->getColorUser());
    var_dump($classValidated->getConfirmationKeyUser());
    var_dump($classValidated->getValidationStatusKey());
    ?>

    Testing setters :
    <?php
    $classValidated->setIdUser(2);
    $classValidated->setNicknameUser("Sunny");
    $classValidated->setPwdUser("$2y$10\$Nuq.3Tqei3i77Clw6zUZ7FDIoutmmjxASRlL8c21rpDWlebzcoRXW");
    $classValidated->setMailUser("email@test.be");
    $classValidated->setSignupDateUser("2010-10-10 10:10:10");
    $classValidated->setColorUser('{"background":"#f4f4f4","color":"#d4d5d6"}');
    $classValidated->setConfirmationKeyUser("thisisit252426");
    $classValidated->setValidationStatusKey(1);
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