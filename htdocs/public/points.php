<?php include('_header2.php'); ?>

<?php

$id = $_GET["id"];
$result =query("SELECT * FROM users WHERE user_id=$id");



$votes = $result[0]["votes"];

$likes = $result[0]["likes"];

$points = $result[0]["points"];

$pic_url = $result[0]["user_pic_url"];

$pic_tag = $result[0]["user_pic_tag"];

$user_name = $result[0]["user_name"];

?>

<div id="points">

<!--Shows all the users points-->
<h3>Points</h3>

<h4>Points from votes: <? echo $votes; ?> </h4>

<h4>Points from likes: <? echo $likes; ?> </h4>

<h4>Total Points: <? echo $points; ?> </h4>

</div>

<div id="pic">

<h3> <? echo $user_name; ?> </h3>

<!--Displays users gravatar pic-->
<?php
  //echo WORDING_PROFILE_PICTURE . '<img src="' . $pic_url . '" />;
  echo $pic_tag;
?>

</div>

<?php

$pagenum = $_GET['pagenum'];

  //This checks to see if there is a page number. If not, it will set it to page 1 
 if (!(isset($pagenum))) 
 { 
 $pagenum = 1; 
 } 

 //Here we count the number of results 
 //Edit $data to be your query 

$query = mysqli_query($con,"SELECT * FROM forum_question WHERE user_id=$id") or die(mysqli_error());
$rows = mysqli_num_rows($query); 

 //This is the number of results displayed per page 
 $page_rows = 5; 

 //This tells us the page number of our last page 
 $last = ceil($rows/$page_rows); 

 //this makes sure the page number isn't below one, or more than our maximum pages 
 if ($pagenum < 1) 
 { 
 $pagenum = 1; 
 } 
 elseif ($pagenum > $last) 
 { 
 $pagenum = $last; 
 } 

 //This sets the range to display in our query 
 $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;

//This is your query again, the same one... the only difference is we add $max into it
$query_p = mysqli_query($con, "SELECT * FROM forum_question WHERE user_id=$id ORDER BY id DESC $max") or die(mysqli_error());

?>

<!--Displays users posts-->
<div id="posts">
<h3>Posts</h3>

<table id="boxtable" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="50%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="10%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="11%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="10%" align="center" bgcolor="#E6E6E6"><strong>Likes</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr> 

<?php
  //This is where you display your query results
 while($info = mysqli_fetch_array( $query_p )) 
 { 
?>

<tr>
<td bgcolor="#FFFFFF"><? echo $info['id']; ?></td>
<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<? echo $info['id']; ?>"><? echo $info['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><? echo $info['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $info['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $info['likes']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $info['datetime']; ?></td>
</tr>

<?php
 } 
?>

</tbody>
</table>

<div class="message">
<?php

 echo "<p>";

  // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 echo " <a href='{$_SERVER['PHP_SELF']}?id=$id&pagenum=1'> <<-First</a> ";
 echo " ";
 $previous = $pagenum-1;
 echo " <a href='{$_SERVER['PHP_SELF']}?id=$id&pagenum=$previous'> <-Previous</a> ";
 
  // This shows the user what page they are on, and the total number of pages
 echo " --Page $pagenum of $last--";
  //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links

 $next = $pagenum+1;
 echo " <a href='{$_SERVER['PHP_SELF']}?id=$id&pagenum=$next'>Next -></a> ";
 echo " ";
 echo " <a href='{$_SERVER['PHP_SELF']}?id=$id&pagenum=$last'>Last ->></a> ";
 echo " ";

 ?>
</div><!--close message div-->

</div><!--close posts div-->

<?php include('_footer.php'); ?>