<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$ordercat = mysql_query("UPDATE `" . $database . "`.`acat` SET `order` = '" . $_POST['ocupdate'] . "' WHERE `acat`.`id` = " . $_POST['ocid'] . " LIMIT 1")or die("<br>Error Code 308: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=53");
}
}
?>