<?php include('_header2.php'); ?>

<?php

// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$detail2=$_POST['detail2'];
$establish=$_POST['establish'];

// get data from session
$name=$_SESSION['user_name'];
$user=$_SESSION['user_id'];
$email=$_SESSION['user_email'];

$datetime=date("d/m/y h:i:s"); //create date time


//if user establishes the vote to left then add 1 point to vote1 and instert dat into table
if($establish=='left'){

     query("INSERT INTO forum_question(topic, detail, detail2, user_id, name, datetime, vote1) VALUES(?,?,?,?,?,?,?)", $topic, $detail, $detail2, $user, $name, $datetime, 1);
        
?>
<div class="message">
    You have successfully added a new posts<BR>
    <a href=index.php>View your posts</a><BR>
</div>
<?php

}

//if user establishes the vote to right then add 1 point to vote2 and instert dat into table
if($establish=='right'){

    query ("INSERT INTO forum_question(topic, detail, detail2, user_id, name, datetime, vote2)  VALUES(?,?,?,?,?,?,?)", $topic, $detail, $detail2, $user, $name, $datetime, 1);

?>
<div class="message">
    You have successfully added a new posts<BR>
    <a href=index.php>View your posts</a><BR>
</div>
<?php
}

$sql3 = ("SELECT * FROM users WHERE user_id = $user");
$rows = mysqli_query($con, $sql);

//get post creators image info
$pic_url = $rows[0]["user_pic_url"];
$pic_tag = $rows[0]["user_pic_tag"];

//set the gravatar values
$s = 250;
$d = 'mm';
$r = 'g';
$atts = array();
   
//creats the gravatar url 
        $url2 = 'http://www.gravatar.com/avatar/';
        $url2 .= md5(strtolower(trim($email)));
        $url2 .= "?s=$s&d=$d&r=$r";

        // the image url (on gravatarr servers), will return in something like
        // http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=80&d=mm&r=g
        // note: the url does NOT have something like .jpg
        $user_gravatar_image_url2 = $url2;

        // build img tag around
        $url2 = '<img src="' . $url2 . '"';
        foreach ($atts as $key => $val)
            $url2 .= ' ' . $key . '="' . $val . '"';
        $url2 .= ' />';

        // the image url like above but with an additional <img src .. /> around
        $user_gravatar_image_tag2 = $url2;

// only gets the gravatar if a user has made a post    
if($pic_url === NULL){

   query("UPDATE users SET user_pic_url='$user_gravatar_image_url2' WHERE user_id='$user'");
   query("UPDATE users SET user_pic_tag='$user_gravatar_image_tag2' WHERE user_id='$user'");
}

// for when users change their gravatar
if($pic_url != $user_gravatar_image_url2){

   query("UPDATE users SET user_pic_url='$user_gravatar_image_url2' WHERE user_id='$user'");
   query("UPDATE users SET user_pic_tag='$user_gravatar_image_tag2' WHERE user_id='$user'");
}

 include('_footer.php'); 

?>		