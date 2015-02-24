<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>WYR.cu.cc</title>
    <link href="../styling/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="header">
        <a class="logo" href="../templates/index.php">WouldYouRather</a>

        <div id="nav">
            <ul>
                <li>
                    <a href="about.php">About</a>
                </li>
            </ul>
        </div>
    </div><!--close header div-->

    <div id="wrapper">
        <div id="content">
            <?php
            // show potential errors / feedback (from login object)
            if (isset($login)) {
                if ($login->errors) {
                    foreach ($login->errors as $error) {
                        echo $error;
                    }
                }
                if ($login->messages) {
                    foreach ($login->messages as $message) {
                        echo $message;
                    }
                }
            }
            ?><?php
            // show potential errors / feedback (from registration object)
            if (isset($registration)) {
                if ($registration->errors) {
                    foreach ($registration->errors as $error) {
                        echo $error;
                    }
                }
                if ($registration->messages) {
                    foreach ($registration->messages as $message) {
                        echo $message;
                    }
                }
            }
            ?>