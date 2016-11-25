<?php
if ($cookie == 1)
{
if ($mgroup['edithome'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['did'])
{
echo"<br>Error Code 94: Invalid homepage ID.<br>
<a href='index.php?idx=7'>Back</a>";
}
else
{
$check = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $_GET['did'])or die("<br>Error Code 400: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($check);
if ($num == 0)
{
echo"<br>Error Code 95: Invalid homepage ID.<br>
<a href='index.php?idx=7'>Back</a>";
}
else
{
$home = mysql_fetch_array( $check );
echo $skin['contentheader'];
echo "Deleting " . $home['title'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table><tr><td valign='top'>Are you sure?</td><td><form action='index.php' method='post'>
<input type='hidden' name='sum' value='73'/>
<input type='hidden' name='ddid' value='" . $_GET['did'] . "' />
<input type='submit' name='dddddho' value='Yes' />
</form></td><td>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='7'/>
<input type='submit' name='none' value='No' />
</form></td></tr>
</table>
";
echo $skin['postcontenttext'];
}
}
}
}
?>