<?php
if ($cookie == 1)
{
if ($mgroup['editskin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if ($_POST['mmid'] == $general['skin'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 134: Cannot delete default main site skin.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
else
{
$update = mysql_query("UPDATE `" . $database . "`.`users` SET `skin` = '" . $general['skin'] . "' WHERE `users`.`skin` = " . $_POST['mmid'])or die("<br>Error Code 527: Please contact the Root Administrator immediately.<br>" . mysql_error());
$del = mysql_query("DELETE FROM `memberskin` WHERE `memberskin`.`id` = " . $_POST['mmid'] . " LIMIT 1")or die("<br>Error Code 528: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=9");
}
}
}
?>