<?php

// load includes
require_once('includes.php');

// load the login class
require_once('../includes/classes/Registration.php');

// handles the entire registration process
$registration = new Registration();

// showing the register view (with the registration form, and messages/errors)
include("../public/register.php");