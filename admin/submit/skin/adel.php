<?php
if ($cookie == 1)
{
if ($mgroup['editskin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if ($_POST['aaid'] == $general['adminskin'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 133: Cannot delete default administrative skin.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
else
{
$update = mysql_query("UPDATE `" . $database . "`.`users` SET `adminskin` = '" . $general['adminskin'] . "' WHERE `users`.`adminskin` = " . $_POST['aaid'])or die("<br>Error Code 525: Please contact the Root Administrator immediately.<br>" . mysql_error());
$del = mysql_query("DELETE FROM `adminskin` WHERE `adminskin`.`id` = " . $_POST['aaid'] . " LIMIT 1")or die("<br>Error Code 526: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=9");
}
}
}
?>