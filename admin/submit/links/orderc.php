<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$ordercat = mysql_query("UPDATE `" . $database . "`.`category` SET `order` = '" . $_POST['ocupdate'] . "' WHERE `category`.`id` = " . $_POST['ocid'] . " LIMIT 1")or die("<br>Error Code 250: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=23");
}
}
?>