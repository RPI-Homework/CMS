<?php
if ($cookie == 1)
{
if ($mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$cmedit = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_POST['id'])or die("<br>Error Code 281: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($cmedit);
$medit = mysql_fetch_array( $cmedit );
$cgedit = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_POST['group'])or die("<br>Error Code 282: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gedit = mysql_fetch_array( $cgedit );
$cextra = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 283: Please contact the Root Administrator immediately.<br>" . mysql_error());
$extra = mysql_fetch_array( $cextra );
$theupdate = "UPDATE `" . $database . "`.`users` SET `gid` = " . $_POST['group'] . " WHERE `users`.`id` = " . $_POST['id'] . " LIMIT 1";
$banned2 = "UPDATE `" . $database . "`.`users` SET `ban` = " . $_POST['ban'] . " WHERE `users`.`id` = " . $_POST['id'] . " LIMIT 1";
if ($member['gid'] == $ra)
{
$update = mysql_query($theupdate)or die("<br>Error Code 284: Please contact the Root Administrator immediately.<br>" . mysql_error());
$update4 = mysql_query($banned2)or die("<br>Error Code 285: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=3");
}
else if ($medit['gid'] == $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 32: You cannot edit Root Administrators.<br>
<a href='index.php?idx=3'>Back</a>";
include $skinfooter;
}
else if ($medit['id'] == $member['id'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 33: You cannot edit Yourself.<br>
<a href='index.php?idx=3'>Back</a>";
include $skinfooter;
}
else if ($gedit['id'] == $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 34: You cannot create Root Administrators.<br>
<a href='index.php?idx=3'>Back</a>";
include $skinfooter;
}
else if ($mgroup['addadmin'] == 1)
{
$update = mysql_query($theupdate)or die("<br>Error Code 286: Please contact the Root Administrator immediately.<br>" . mysql_error());
$update4 = mysql_query($banned2)or die("<br>Error Code 287: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=3");
}
else
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 35: Unknown Error.<br>
<a href='index.php?idx=3'>Back</a>";
include $skinfooter;

}
}
}
else
{
header("Location: index.php?idx=3");
}
?>