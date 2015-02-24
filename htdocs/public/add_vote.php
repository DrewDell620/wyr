<?php include('_header2.php'); ?>

<?php

// Get value of id that sent from hidden field 
$q_id=$_POST["id"];

$u_id=$_SESSION["user_id"];

$vote=$_POST["vote"];

$result = query("SELECT * FROM voters WHERE u_id = $u_id AND q_id =$q_id");

// Checks to see if user has voted for this or not
$checker = $result[0]["u_id"];
if($checker == $u_id)
{ 
?>

<div class="message">
You have already voted.
</div>

<?php
}

else
{

//make history of the vote
mysqli_query($con, "INSERT INTO voters(q_id, u_id) VALUES('$q_id', '$u_id')");

// Handles left votes
if($vote=='left'){

   // Gets the vote counts for each side of the question
   $result2 = query("SELECT * FROM forum_question WHERE id = $q_id");
   $vote1 = $result2[0]["vote1"];
   $vote2 = $result2[0]["vote2"];
   
   // If they voted for the left side and that side is >=  the right side, they get a point.
   if($vote1 >= $vote2){
      mysqli_query($con, "UPDATE users SET votes = votes + 1 WHERE user_id = $u_id");
      mysqli_query($con, "UPDATE users SET points = points + 1 WHERE user_id = $u_id");
      ?>
      <div class="message">
      You voted correctly. Thank you for voting.
      </div>
      <?php
   }

  // If they voted for the left side and that side is less than the right side, they get nothing.
   if($vote1 < $vote2){
       ?>
      <div class="message">
      You voted incorrectly. Thank you for voting.
      </div>
      <?php
   }

   // Updates the votes
   mysqli_query($con, "UPDATE forum_question SET vote1 = vote1 + 1 WHERE id = $q_id");
}

// Handles right votes
if($vote=='right'){
   
   $result3 = query("SELECT * FROM forum_question WHERE id = $q_id");
   $vote1 = $result3[0]["vote1"];
   $vote2 = $result3[0]["vote2"];
   
   // If they voted for the right side and that side is >=  the left side, they get a point.
   if($vote2 >= $vote1){
      mysqli_query($con, "UPDATE users SET votes = votes + 1 WHERE user_id = $u_id");
      mysqli_query($con, "UPDATE users SET points = points + 1 WHERE user_id = $u_id");
      ?>
      <div class="message">
      You voted correctly. Thank you for voting.
      </div>
      <?php
   }

   // If they voted for the right side and that side is less than the left side, they get nothing.
   if($vote2 < $vote1){
      ?>
      <div class="message">
      You voted incorrectly. Thank you for voting.
      </div>
      <?php
   }

   // Updates the votes
   mysqli_query($con, "UPDATE forum_question SET vote2 = vote2 + 1 WHERE id = $q_id");
}
}

?>

<div class="message">
<?php
// Creates a link that takes them back to the previous question
echo "<a href='view_topic.php?id=".$q_id."'>Back to the Post</a>";
?>
</div>

<?php include('_footer.php'); ?>		