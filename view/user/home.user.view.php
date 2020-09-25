<?php

// REQUIRE SIGN IN CONTROLLER
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'au.signin.controller.php';
?>

<div>
    <div>
        <form action="#" method="post">
            <!-- SIGN UP SECTION -->
            <h1>Sign Up</h1>
            <?php
            if (isset($au_warningSignUp)) {
                echo "<span>" . $au_warningSignUp . "</span>";
            }
            ?>
            <input type="text" placeholder="Nickname" name="sign_up_nickname" value="<?=$au_signUpNickname?>" maxlength="30" required/>
            <input type="email" placeholder="Email" name="sign_up_email" value="<?=$au_signUpEmail?>" required/>
            <input type="password" placeholder="Password" name="sign_up_pwd" value="<?=$au_signUpPwd?>" maxlength="30" required/>
            <input type="password" placeholder="Confirm your Password" name="sign_up_check_pwd" value="<?=$au_signUpCheckPwd?>" maxlength="30" required/>
            <button type="submit" name="sign_up">Sign Up</button>
        </form>
    </div>
    <div>
        <form action="#" method="post">
            <!-- SIGN IN SECTION-->
            <h1>Sign in</h1>
            <?php
            if (isset($au_warningSignIn)){
                echo "<span>".$au_warningSignIn."</span>";
            }
            ?>
            <input type="text" placeholder="Nickname" name="sign_in_nickname" value="<?=$au_signInNickname?>" maxlength="30" required/>
            <input type="password" placeholder="Password" name="sign_in_pwd" value="<?=$au_signInPwd?>" maxlength="30" required/>
            <a href="#">Forgot your password?</a>
            <button type="submit" name="sign_in">Sign In</button>
        </form>
    </div>

    <!-- THIS SECTION WILL STAY HIDDEN UNTIL THE JQUERY AND CSS ARE ADDED -->
    <div style="display: none">
        <div>
            <!-- OVERLAY FOR THE SIGN IN SECTION -->
            <div>
                <h1>Welcome Back!</h1>
                <p>Glad to see you again !</p>
                <button>Sign In</button>
            </div>
            <!-- OVERLAY FOR THE SIGN UP SECTION-->
            <div>
                <h1>Hello, Friend!</h1>
                <p>Do you want to chat with others ?</p>
                <button>Sign Up</button>
            </div>
        </div>
    </div>
</div>