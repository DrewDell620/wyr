<?php include('_header.php'); ?>
                    <div id="formwrapper">
                        <div id="login" class="animate form">
<!--Login form-->
<form method="post" action="../templates/index.php" name="loginform">
    <h1>Log in</h1> 
    <div id="entry">
    <p>
    <label data-icon="u" for="user_name"><?php echo WORDING_USERNAME; ?></label>
    <input id="user_name" type="text" name="user_name" required /> 
    </p>
    <p>
    <label data-icon="p" for="user_password"><?php echo WORDING_PASSWORD; ?></label>
    <input id="user_password" type="password" name="user_password" autocomplete="off" required />
    </p>
    </div>
    <input type="checkbox" id="user_rememberme" name="user_rememberme" value="1" />
    <label for="user_rememberme"><?php echo WORDING_REMEMBER_ME; ?></label>
    <p class="login button">
      <input type="submit" name="login" value="<?php echo WORDING_LOGIN; ?>" />
    </p>
</form>

<div id="formbottom">
<a href="register.php"><?php echo WORDING_REGISTER_NEW_ACCOUNT; ?></a>
<a href="password_reset.php"><?php echo WORDING_FORGOT_MY_PASSWORD; ?></a>
</div>
</div>
</div>
<?php include('_footer.php'); ?>	