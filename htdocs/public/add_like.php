<?php 

include('_header2.php');

// Get value of id that sent from hidden field 
$q_id=$_POST["id"];

$u_id=$_SESSION["user_id"];

$poster=$_POST["user_id"];
$result = query("SELECT * FROM likes WHERE u_id = ? AND q_id =?", $u_id, $q_id);


$checker = $result[0]["u_id"];
if($checker == $u_id)
{ 

?>

<div class="message">
    You have already liked this.
</div>

<?php

}
else
{

//make history of the like
mysqli_query($con, "INSERT INTO likes(q_id, u_id) VALUES('$q_id', '$u_id')");

//update the posters points
mysqli_query($con, "UPDATE users SET `points` = `points` + 1 WHERE user_id=$poster");

//update the  posters likes
mysqli_query($con,"UPDATE users SET `likes` = `likes` + 1 WHERE user_id=$poster");

//update the questions likes
mysqli_query($con, "UPDATE forum_question SET likes = likes + 1 WHERE id=$q_id");

?>

<div class="message">
Thank you for liking.<BR>

<?php
echo "<a href='view_topic.php?id=".$q_id."'>Back to the Post</a>";
?>
</div>
<?php
}

include('_footer.php'); 

?>