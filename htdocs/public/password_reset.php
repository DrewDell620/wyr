<?php include('_header.php'); ?>

<?php if ($login->passwordResetLinkIsValid() == true) { ?>
<!--Reset password form-->
<form method="post" action="password_reset.php" name="new_password_form">
    <input type='hidden' name='user_name' value='<?php echo $_GET['user_name']; ?>' />
    <input type='hidden' name='user_password_reset_hash' value='<?php echo $_GET['verification_code']; ?>' />

    <label for="user_password_new"><?php echo WORDING_NEW_PASSWORD; ?></label>
    <input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

    <label for="user_password_repeat"><?php echo WORDING_NEW_PASSWORD_REPEAT; ?></label>
    <input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <input type="submit" name="submit_new_password" value="<?php echo WORDING_SUBMIT_NEW_PASSWORD; ?>" />
</form>
<!-- no data from a password-reset-mail has been provided, so we simply show the request-a-password-reset form -->
<?php } else { ?>
                    <div id="formwrapper">
                        <div id="login" class="animate form">
<form method="post" action="password_reset.php" name="password_reset_form">
    <h1>Password Reset</h1> 

    <label for="user_name"><?php echo WORDING_REQUEST_PASSWORD_RESET; ?></label>
    <input id="user_name" type="text" name="user_name" required />
    <p class="login button">
    <input type="submit" name="request_password_reset" value="<?php echo WORDING_RESET_PASSWORD; ?>" />
    </p>
    </form>
<?php } ?>

<div id="formbottom">
<a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>
</div>
</div>
</div>

<?php include('_footer.php'); ?>