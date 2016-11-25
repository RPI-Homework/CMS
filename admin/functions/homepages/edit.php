<?php
if ($cookie == 1)
{
if ($mgroup['edithome'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['id'])
{
echo"<br>Error Code 97: Invalid homepage ID.<br>
<a href='index.php?idx=7'>Back</a>";
}
else
{
$check = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 403: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($check);
if ($num == 0)
{
echo"<br>Error Code 98: Invalid homepage ID.<br>
<a href='index.php?idx=7'>Back</a>";
}
else
{
$home = mysql_fetch_array( $check );
echo $skin['contentheader'];
echo "Editing " . $home['title'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='72'/>
<table><tr><td>
Title</td><td>
<input type='text' name='title' value='" . $home['title'] . "' /></td></tr>
<tr><td>Content</td><td></td></tr>
<tr><td colspan='2'>
<textarea rows='10' cols='75' name='content'>" . $home['content'] . "</textarea>
</td></tr>
<tr><td colspan='2'>
<input type='hidden' name='eid' value='" . $_GET['id'] . "' />
<input type='submit' name='edit' value='Edit Homepage' />
</td></tr>
</table>
</form>";
echo $skin['postcontenttext'];
}
}
}
}
?>