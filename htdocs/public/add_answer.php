<?php 

include('_header2.php'); 

// get values that sent from form 
$a_name=$_SESSION['user_name'];
$u_id=$_SESSION['user_id'];
$a_answer=$_POST['a_answer']; 

$datetime=date("d/m/y H:i:s"); // create date and time

// Get value of id that sent from hidden field 
$id=$_POST['id'];

// Find highest answer number. 
$sql="SELECT MAX(a_id) AS Maxa_id FROM forum_answer WHERE question_id='$id'";
$result=mysqli_query($con, $sql);
if($result === FALSE) {
    echo "ERROR 1";
}
$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
  $Max_id = $rows['Maxa_id']+1;
}
else {
  $Max_id = 1;
}

// Insert answer 
$result2 = query("INSERT INTO forum_answer(question_id, a_id, a_name, user_id, a_answer, a_datetime) VALUES(?, ?, ?, ?, ?, ?)",$id, $Max_id, $a_name, $u_id, $a_answer, $datetime);
// $result2 = query($sql2);

if($result2 === FALSE) {
    echo "ERROR 2";

}
else{
  
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
    <div class="message">
        Thanks for commenting.<br>
        <?php
          echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";
        ?>
    </div><?php

      // If added new answer, add value +1 in reply column 
      $tbl_name2="forum_question";
      $sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
      $result3=mysqli_query($con, $sql3);
    }

    include('_footer.php'); 
?>