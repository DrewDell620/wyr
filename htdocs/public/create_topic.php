<?php include('_header2.php'); ?>

<!--This is the table for users to create posts-->
<table id="formtable" width="82%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
  <tr>
    <form id="form1" name="form1" method="post" action="add_topic.php">
    <td>
      <table width="100%" cellpadding="5" cellspacing="5"  bgcolor="#FFFFFF">
        <tr>
          <td id="formtitle" colspan="3">Create a New Post</td>
        </tr>

        <tr>
          <td width="5%">Title</td>
          <td width="2%">:</td>
          <td width="93%"><input name="topic" type="text" id="topic" size="85" " required autocomplete="off" /></td>
        </tr>
      </table>

<div id="post">

<div class="message"><p>Would you rather...</p></div>

<table width="100%" cellpadding="5" cellspacing="5"  bgcolor="#FFFFFF">
<tr>
<td width="45%"><center><textarea name="detail" cols="37" rows="5" id="detail" " required autocomplete="off"></textarea></center></td>
<td width="10%"><center>Or</center></td>
<td width="45%"><center><textarea name="detail2" cols="37" rows="5" id="detail2" " required autocomplete="off"></textarea></center></td>
</tr>

<!--This is where the users selects which side of the question they think should be right-->
<tr>
<td width="45%"><center><input type="radio" name="establish" value="left" required /></center </td>
<td width="10%"></td>
<td width="45%"><center> <input type="radio" name="establish" value="right" required /></center></td>
</tr>
</table>
</div>

<div class="message"><p class="button"><input type="submit" width="10%" name="Submit" value="Submit" /> <input type="reset" width="10%" name="Submit2" value=" Reset  " /></p></div></td>

</table>
</td>
</form>
</tr>
</table>
<?php

?>
<?php include('_footer.php'); ?>