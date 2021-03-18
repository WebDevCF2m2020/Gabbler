<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/UserRoom.php';

//Creation of instances for test
$classEmpty = new UserRoom([]);
$classValidated = new UserRoom([
    "id_user_room"=>1,
    "favorite_user_room"=>2,
    "fkey_room_id"=>1,
    "fkey_user_id"=>10
]);
$classNotValidated = new UserRoom([
    "id_user_room"=>0,
    "favorite_user_room"=>0,
    "fkey_room_id"=>0,
    "fkey_user_id"=>0
]);

//create a dummy extends files into this test
class test extends UserRoom{
    public function getTest()
    {
        return $this->test;
    }
    public function setTest($test)
    {
        $this->test = $test;
    }
}
//Display of test results
?>
<pre>
Class Empty :
<?php var_dump($classEmpty); ?>

Class Validated : 
<?php var_dump($$classValidated); ?>

Class Not Validated : 
<?php var_dump($classNotValidated); ?>