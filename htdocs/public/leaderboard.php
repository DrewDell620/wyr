<?php include('_header2.php'); ?>

<?php
$sql="SELECT * FROM $tbl_name ORDER BY likes DESC LIMIT 10";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($con,$sql);

?>
<!--Table for most liked posts-->
<table id="boxtable" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="60%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="20%" align="center" bgcolor="#E6E6E6"><strong>Likes</strong></td>
<td width="20%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr>

<?php
 
// Start looping table row
while($rows=mysqli_fetch_array($result)){
?>
<tr>
<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<? echo $rows['id']; ?>"><? echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['likes']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['datetime']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}
?>

<?php
$sql2="SELECT * FROM users ORDER BY likes DESC LIMIT 10";
// OREDER BY id DESC is order result by descending

$result2=mysqli_query($con, $sql2);

?>
<h3>Most Liked Posts</h3>

<!--Table for most liked users-->
<table id="boxtable" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="70%" align="center" bgcolor="#E6E6E6"><strong>User</strong></td>
<td width="30%" align="center" bgcolor="#E6E6E6"><strong>Likes</strong></td>
</tr>

<?php
 
// Start looping table row
while($rows=mysqli_fetch_array($result2)){
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><a href="points.php?id=<? echo $rows['user_id']; ?>"><? echo $rows['user_name']; ?></a></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['likes']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}

?>
<?php
$sql3="SELECT * FROM users ORDER BY votes DESC LIMIT 10";
// OREDER BY id DESC is order result by descending

$result3=mysqli_query($con, $sql3);

?>
<h3>Most Liked Users</h3>

<!--Table for most correct users-->
<table id="boxtable" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="70%" align="center" bgcolor="#E6E6E6"><strong>User</strong></td>
<td width="30%" align="center" bgcolor="#E6E6E6"><strong>Points from Voting</strong></td>
</tr>

<?php
 
// Start looping table row
while($rows=mysqli_fetch_array($result3)){
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><a href="points.php?id=<? echo $rows['user_id']; ?>"><? echo $rows['user_name']; ?></a></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['votes']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}

?>
<?php
$sql4="SELECT * FROM users ORDER BY Points DESC LIMIT 10";
// OREDER BY id DESC is order result by descending

$result4=mysqli_query($con, $sql4);

?>
<h3>Most Correct Users</h3>

<!--Table for users with the most points-->
<table id="boxtable" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="70%" align="center" bgcolor="#E6E6E6"><strong>User</strong></td>
<td width="30%" align="center" bgcolor="#E6E6E6"><strong>Points</strong></td>
</tr>

<?php
 
// Start looping table row
while($rows=mysqli_fetch_array($result4)){
?>
<tr>

<td align="center" bgcolor="#FFFFFF"><a href="points.php?id=<? echo $rows['user_id']; ?>"><? echo $rows['user_name']; ?></a></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['points']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}

?>
<h3>Users With the Most Points</h3>
<?php include('_footer.php'); ?>