<?php

$host="hostname"; // Host name 
$username="username"; // Mysql username 
$password="password"; // Mysql password 
$db_name="username_login"; // Database name 
$tbl_name="forum_question"; // Table name 

// Connect to server and select database.


    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
