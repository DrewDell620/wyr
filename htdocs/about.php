<?php

// load the login class
require_once('includes.php');

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process.
$login = new Login();

// shows the about page
include("public/about.php");

?>