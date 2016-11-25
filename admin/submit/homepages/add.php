<?php
if ($cookie == 1)
{
if ($mgroup['edithome'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$addhome = mysql_query("INSERT INTO `" . $database . "`.`homepage` (
`id` ,
`title` ,
`content`
)
VALUES (
NULL , '" . $_POST['title'] . "', '" . $_POST['content'] . "'
)")or die("<br>Error Code 396: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=7");
}
}
?>