<?php include('_header2.php'); ?>

<?php

// load includes
require_once('includes.php');

// get value of id that sent from address bar 
$id=$_GET['id'];

//get the information from the table where the id matches
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
$user=$rows['user_id'];
?>

<!-- makes the voting table that displays the question -->
<table id="formtable"  width="82%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td>
<table width="100%" cellpadding="5" cellspacing="5"  bgcolor="#FFFFFF">
<tr>
<td width="75%" id="formtitle"><? echo $rows['topic']; ?></td>
<td id="formcreator" width="25%"><a href="points.php?id=<? echo $user; ?>"><? echo $rows['name']; ?></a></td>
              
</tr>
</table>

<center><p>Would you rather...</p></center>

<table width="100%" cellpadding="5" cellspacing="5"  bgcolor="#FFFFFF">


<!-- Displays the two options to choose from -->
<tr>
<td width="45%"><center><? echo $rows['detail']; ?><center></td>
<td width="10%"><center>or</center></td>
<td width="45%"><center><? echo $rows['detail2']; ?><center></td>
</tr>

<!-- Sends the form data to add_vote.php -->
<form id="form" name="form" method="post" action="add_vote.php">'

<!-- This is where users actually select which option they've chosen -->
<tr>
<td width="45%"><center><input type="radio" name="vote" value="left" required /></center </td>
<td width="10%"></td>
<td width="45%"><center> <input type="radio" name="vote" value="right" required /></center></td>

<!--  This is used to send the quesition id to add_vote.php -->
<td><input name="id" type="hidden" value="<? echo $id; ?>"></td>
</tr>
</table>

<div id="vote">
<center><input type="submit" width="10%" name="Submit" value="Vote" />
</form>

<!-- This is for adding a like -->
<form name="form2" method="post" action="add_like.php">
<input name="id" type="hidden" value="<? echo $id; ?>">
<input name="user_id" type="hidden" value="<? echo $rows['user_id']; ?>">
<input type="submit" width="10%" name="Like" value="Like" />
</form>

</center>
</td>
<div>
</td>
</tr>
</table>
<BR>

<?php

$u_id = $_SESSION['user_id'];

$result = query("SELECT * FROM voters WHERE u_id = ? AND q_id =?", $u_id, $id);

// Checks to see if the user has voted on this topic befor
$checker = $result[0]["u_id"];

// if they have voted, the comments are displayed
if($checker == $u_id)
{ 

// Switch to table "forum_answer"
$tbl_name2="forum_answer"; 

// Gets the data for the comments
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysql_query($sql2);

// Displays the comments
while($rows=mysql_fetch_array($result2)){
?>

<!-- Displays a comment  -->
<table id="formtable"  width="82%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table id="formtable" width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td width="25%" align="left" id="answercreator"><a href="points.php?id=<? echo $rows['user_id']; ?>"><? echo $rows['a_name']; ?></a></td>
<td align="right" id="datetime"><? echo $rows['a_datetime']; ?></td>
</tr>
<tr>
<td colspan=2><? echo $rows['a_answer']; ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
}

// Gets the data for view
$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysql_query($sql3);
$rows=mysql_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);

?>

<BR>

<!-- This is where users can enter comments  -->
<table width="82%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form3" method="post" action="add_answer.php">
<td>
<table width="82%" border="0" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
<tr>
<td width="10%"><strong>Comment</strong></td>
<td width="3%">:</td>
<td width="87%"><textarea name="a_answer" cols="83" rows="5" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<? echo $id; ?>"></td>
<td><input type="submit" name="Submit2" value="Submit"> <input type="reset" name="Reset" value="Reset"></td>
</form>
</tr>
</table>
</td>
</tr>
</table>

<?php
}

else
{
?>

<!-- Tells the user they need to vote in order to view the comments -->
<center>
You need to vote in order to make or view comments on this post.
</center>
<?php
}
?>
<?php include('_footer.php'); ?>