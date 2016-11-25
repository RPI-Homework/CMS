<?php
if ($cookie == 1)
{
if ($mgroup['editgroups'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$yars = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '" . $_POST['mem'] . "' ORDER BY `name`")or die("<br>Error Code 372: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gup = mysql_fetch_array( $yars );
if ($_POST['dddid'] == $general['membergroup'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 83: Cannot delete default Member group.<br>
<a href='index.php?idx=6'>Back</a>";
include $skinfooter;
}
elseif ($_POST['dddid'] == $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 84: Cannot delete Root Administrator group.<br>
<a href='index.php?idx=6'>Back</a>";
include $skinfooter;
}
elseif ($gup['admin'] == 1 AND $mgroup['addadmin'] != 1)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 85: You cannot delete an Administrative group.<br>
<a href='index.php?idx=6'>Back</a>";
include $skinfooter;
}
elseif ($_POST['dddid'] == $mgroup['id'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 86: Cannot delete your group.<br>
<a href='index.php?idx=6'>Back</a>";
include $skinfooter;
}
else
{
$update = mysql_query("UPDATE `" . $database . "`.`users` SET `gid` = '" . $_POST['mem'] . "' WHERE `users`.`gid` = " . $_POST['dddid'])or die("<br>Error Code 373: Please contact the Root Administrator immediately.<br>" . mysql_error());
$del = mysql_query("DELETE FROM `group` WHERE `group`.`id` = " . $_POST['dddid'] . " LIMIT 1")or die("<br>Error Code 374: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=6");
}
}
}
?>