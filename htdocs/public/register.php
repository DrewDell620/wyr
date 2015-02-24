<?php include('_header.php'); ?>

                    <div id="formwrapper">
                        <div id="login" class="animate form">

<!-- show registration form, but only if we didn't submit already -->
<?php if (!$registration->registration_successful && !$registration->verification_successful) { ?>
<form method="post" action="register.php" name="registerform">
    <h1>Register</h1>
    <div id="entry">
    <p>
    <label for="user_name"><?php echo WORDING_REGISTRATION_USERNAME; ?></label>
    <input id="user_name" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    </p><p>
    <label for="user_email"><?php echo WORDING_REGISTRATION_EMAIL; ?></label>
    <input id="user_email" type="email" name="user_email" required />
    </p><p>
    <label for="user_password_new"><?php echo WORDING_REGISTRATION_PASSWORD; ?></label>
    <input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
    </p><p>
    <label for="user_password_repeat"><?php echo WORDING_REGISTRATION_PASSWORD_REPEAT; ?></label>
    <input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    </p><p>
    <img src="../includes/tools/showCaptcha.php" alt="captcha" />
    </p><p>
    <label><?php echo WORDING_REGISTRATION_CAPTCHA; ?></label>
    <input type="text" name="captcha" required />
    </p>
    </div>
    <p class="login button">
    <input type="submit" name="register" value="<?php echo WORDING_REGISTER; ?>" />
    </p>
</form>
<?php } ?>
<div id="formbottom">
    <a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>
</div>
</div>
</div>
<?php include('_footer.php'); ?>