<?php
// check for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once('../includes/libraries/password_compatibility_library.php');
}
// include the config
require_once('../includes/config/config.php');

// include the setup
require_once('../includes/config/setup.php');

// include the to-be-used language, english by default. feel free to translate your project and include something else
require_once('../includes/translations/en.php');

// include the PHPMailer library
require_once('../includes/libraries/PHPMailer.php');

$host="sql100.cuccfree.com"; // Host name 
$username="cucch_15019700"; // Mysql username 
$password="331620dwd"; // Mysql password 
$db_name="cucch_15019700_login"; // Database name 
$tbl_name="forum_question"; // Table name 
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

//Mysqli connect
$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");