<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['id'])
{
echo "<br>Error Code 105: Invalid member ID.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 219: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 106: Invalid member ID.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 219: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mdel = mysql_fetch_array( $check3 );
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $mdel['gid'])or die("<br>Error Code 219: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gdel = mysql_fetch_array( $check4 );
if ($mdel['gid'] == $ra AND $member['gid'] != $ra)
{
echo "<br>Error Code 107: You cannot delete Root Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
}
elseif ($gdel['admin'] == 1 AND $mgroup['addadmin'] != 1)
{
echo "<br>Error Code 108: You cannot delete Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
$mdel = mysql_fetch_array( $check3 );
echo $skins['contentheader'];
echo "Now Deleteing" . $mdel['user'];
echo $skins['postcontentheader'];
echo $skins['contenttext'];
echo "<table><tr><td valign='top'>Are you sure?</td><td><form action='index.php' method='post'>
<input type='hidden' name='sum' value='83' />
<input type='hidden' name='did' value='" . $_GET['id'] . "' />
<input type='submit' name='dddid' value='Yes' /></form></td><td>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='8' />
<input type='submit' name='none' value='No' /></form></td></tr></table>";
echo $skin['postcontenttext'];
}
}
}
}
}
?>