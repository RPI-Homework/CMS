<?php
if ($cookie == 1)
{
if ($mgroup['editskin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$dskin = mysql_query("SELECT * FROM `memberskin` WHERE id = " . $_GET['mid'])or die("<br>Error Code 524: Please contact the Root Administrator immediately.<br>" . mysql_error());
$sss = mysql_fetch_assoc($dskin);
echo $skin['contentheader'];
echo "Deleting " . $sss['skin'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table><tr><td valign='top'>Are you sure?</td><td>
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='96' />
<input type='hidden' name='mmid' value='" . $_GET['mid'] . "' />
<input type='submit' name='mmmmid' value='Yes' />
</form></td><td>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='9' />
<input type='submit' name='none' value='No' />
</form></td></tr>
</table>";
echo $skin['postcontenttext'];
}
}
?>