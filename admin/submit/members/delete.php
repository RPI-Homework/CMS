<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_POST['did'])or die("<br>Error Code 219: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mdel = mysql_fetch_array( $check3 );
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $mdel['gid'])or die("<br>Error Code 219: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gdel = mysql_fetch_array( $check4 );
if ($mdel['gid'] == $ra AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 107: You cannot delete Root Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
include $skinfooter;
}
else
{
if ($gdel['admin'] == 1 AND $mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 108: You cannot delete Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
include $skinfooter;
}
else
{
$del = mysql_query("DELETE FROM `users` WHERE `users`.`id` = " . $_POST['did'] . " LIMIT 1")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=8");
}
}
}
}
?>