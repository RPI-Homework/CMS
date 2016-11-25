<?php
if ($cookie == 1)
{
if ($mgroup['edithome'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['add'])
{
echo"<br>Error Code 96: No name entered.<br>
<a href='index.php?idx=7'>Back</a>";
}
else
{
$home = mysql_fetch_array( $check );
echo $skin['contentheader'];
echo "Adding " . $_GET['add'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='71'/>
<table><tr><td>
Title</td><td>
<input type='text' name='title' value='" . $_GET['add'] . "' /></td></tr>
<tr><td>Content</td><td></td></tr>
<tr><td colspan='2'>
<textarea rows='10' cols='75' name='content'></textarea>
</td></tr>
<tr><td colspan='2'>
<input type='submit' name='aadd' value='Add Homepage' />
</td></tr>
</table>
</form>";
echo $skin['postcontenttext'];
}
}
}
?>