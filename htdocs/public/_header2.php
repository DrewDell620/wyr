<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>WYR.cu.cc</title>
    <link href="../styling/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    // gets user id
    $id= $_SESSION['user_id'];
    ?>

    <div id="header">
        <a class="logo" href="../templates/index.php">WouldYouRather</a> <!--This is where the navigation menu is -->

        <div id="nav">
            <ul>
                <li>
                    <a href="create_topic.php">Create a Post</a>
                </li>

                <li>
                    <a href="leaderboard.php">Leaderboard</a>
                </li>

                <li>
                    <a href="#"><?php
                                  echo  $_SESSION['user_name'];
                                ?><img src="../styling/images/arrow.png"></a>

                    <ul>
                        <li>
                            <a href="index.php?logout">Log Out</a>
                        </li>

                        <li>
                            <a href="edit.php">Account Info</a>
                        </li>

                        <li>
                            <a href="points.php?id=<? echo $id; ?>">Your Page</a>
                        </li>
                    </ul>
                </li>

                <li><?php
                              //echo WORDING_PROFILE_PICTURE . '<img src="' . $login->user_gravatar_image_url . '" />;
                              echo $login->user_gravatar_image_tag;
                            ?></li>
            </ul>
        </div><!--close nav div-->
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
            ?><!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script async="async" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53865d7034dea53e" type="text/javascript"></script>