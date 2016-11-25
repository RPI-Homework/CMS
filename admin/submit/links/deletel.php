<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$dellink = mysql_query("DELETE FROM `menu` WHERE `menu`.`id` = " . $_POST['dlid'] . " LIMIT 1")or die("<br>Error Code 253: Please contact the Root Administrator immediately.<br>");
header("Location: index.php?idx=2");
}
}
?>