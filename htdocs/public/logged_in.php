<?php include('_header2.php'); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53865d7034dea53e" async="async"></script>

<?php 

$pagenum = $_GET['pagenum'];

  //This checks to see if there is a page number. If not, it will set it to page 1 
 if (!(isset($pagenum))) 
 { 
 $pagenum = 1; 
 } 

 //Here we count the number of results 
 //Edit $query to be your query 
 $query = mysqli_query($con,"SELECT * FROM forum_question") or die(mysqli_error());
 $rows = mysqli_num_rows($query); 

 //This is the number of results displayed per page 
 $page_rows = 13; 

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
 $query_p = mysqli_query($con, "SELECT * FROM forum_question ORDER BY id DESC $max") or die(mysqli_error());

?>

<!--Table that displays all the posts-->
<table id="boxtable" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="60%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="11%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="10%" align="center" bgcolor="#E6E6E6"><strong>Likes</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr> 

<?php
  //This is where you display your query results
 while($info = mysqli_fetch_array($query_p )) 
 { 
?>

<tr>
<td bgcolor="#FFFFFF"><? echo $info['id']; ?></td>
<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<? echo $info['id']; ?>"><? echo $info['topic']; ?></a><BR></td>

<td align="center" bgcolor="#FFFFFF"><? echo $info['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $info['likes']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $info['datetime']; ?></td>
</tr>

<?php
 } 
?>

<tr>
<td colspan="6" align="right" bgcolor="#E6E6E6"><a href="create_topic.php"><strong>Create New Post</strong> </a></td>
</tr>
</tbody>
</table>

<div class="message">
<?php

 echo "<p>";

 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.
 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=1'> <<-First</a> ";
 echo " ";
 $previous = $pagenum-1;
 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'> <-Previous</a> ";
 
 // This shows the user what page they are on, and the total number of pages
 echo " --Page $pagenum of $last--";

 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
 $next = $pagenum+1;
 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$next'>Next -></a> ";
 echo " ";
 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'>Last ->></a> ";
 echo " ";

 ?>
</div>
   
</div><!--close content div-->

</div><!--close wrapper div-->

</body>