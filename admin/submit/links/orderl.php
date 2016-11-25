<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$orderlink = mysql_query("UPDATE `" . $database . "`.`menu` SET `order` = '" . $_POST['olupdate'] . "' WHERE `menu`.`id` = " . $_POST['olid'] . " LIMIT 1")or die("<br>Error Code 232: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=24");
}
}
?>