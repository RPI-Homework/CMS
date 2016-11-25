<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$uplink = mysql_query("UPDATE `" . $database . "`.`articles` SET `cat` = '" . $_POST['dccat'] . "' WHERE `articles`.`cat` = " . $_POST['dcid'])or die("<br>Error Code 312: Please contact the Root Administrator immediately.<br>");
$delcar = mysql_query("DELETE FROM `acat` WHERE `acat`.`id` = " . $_POST['dcid'] . " LIMIT 1")or die("<br>Error Code 313: Please contact the Root Administrator immediately.<br>");
header("Location: index.php?idx=5");
}
}
?>