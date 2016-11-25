<?php
if ($cookie == 1)
{
if ($mgroup['edithome'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$uphome = mysql_query("UPDATE `" . $database . "`.`homepage` SET `title` = '" . $_POST['title'] . "',
`content` = '" . $_POST['content'] . "' WHERE `homepage`.`id` = " . $_POST['eid'] . " LIMIT 1")or die("<br>Error Code 402: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=7");
}
}
?>