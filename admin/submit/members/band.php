<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$del = mysql_query("DELETE FROM `ban` WHERE `ban`.`id` = " . $_POST['del'] . " LIMIT 1")or die("<br>Error Code 437: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=85");
}
}
?>