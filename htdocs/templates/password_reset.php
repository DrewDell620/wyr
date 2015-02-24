<?php

// load includes
require_once('includes.php');

// load the login class
require_once('../includes/classes/Login.php');

$login = new Login();

// the user has just successfully entered a new password
// so we show the index page = the login page
if ($login->passwordResetWasSuccessful() == true && $login->passwordResetLinkIsValid() != true) {
    include("../public/not_logged_in.php");

} else {
    // show the request-a-password-reset or type-your-new-password form
    include("../public/password_reset.php");
}