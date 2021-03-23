<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Test SwiftMailer</title>
</head>
<body>
<form method="post">
    <?php
    if (isset($warning)) {
    echo "<span>" . $warning . "</span>";
    }
    ?>
    <input type="text" placeholder="Nickname" name="nickname" maxlength="30" required/><br>
    <input type="email" placeholder="Email" name="email"  required/><br>
    <input type="password" placeholder="Password" name="pwd" maxlength="30" required/><br>
    <button type="submit" name="signup">Sign Up</button>
</form>
<?php
echo isset($message1) ? $message1->toString()."<br>" : "";
echo isset($message2) ? $message2->toString()."<br>" : "";
echo isset($message3) ? $message3->toString()."<br>" : "";
?>
</body>
</html>
