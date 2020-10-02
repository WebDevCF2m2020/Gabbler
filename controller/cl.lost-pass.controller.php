<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' .
    DIRECTORY_SEPARATOR . 'connectToDB.model.php';



if (isset($_POST['email'])) {
    $claimedEmail = $_POST['email'];
//if (true) {
//    $email = $_POST['email'];
    if (filter_var($claimedEmail, FILTER_VALIDATE_EMAIL)) {
//    if (true) {
        $req = "SELECT * FROM user";
        $result = mysqli_query($db, $req);
        $requestIsValid = mysqli_num_rows($result);
        var_dump($requestIsValid);
        if ($requestIsValid) {
            while ($row = mysqli_fetch_assoc($result)) {
                $distantEmail = ($row['mail_user']);
            }
            if ((isset($distantEmail) && ($distantEmail === $claimedEmail))) {
                echo 'same email';
            } else {
                echo 'different email';
            }
        } else {
            echo 'non existing claimed email';
        }


    }
}