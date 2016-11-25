<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['ip1'])
{
$_POST['ip1'] = "*";
}
if (!$_POST['ip2'])
{
$_POST['ip2'] = "*";
}
if (!$_POST['ip3'])
{
$_POST['ip3'] = "*";
}
if (!$_POST['ip4'])
{
$_POST['ip4'] = "*";
}
$ban = mysql_query("INSERT INTO `" . $database . "`.`ban` (
`id` ,
`ip`
)
VALUES (
NULL , '" . $_POST['ip1'] . "." . $_POST['ip2'] . "." . $_POST['ip3'] . "." . $_POST['ip4'] . "'
)")or die("<br>Error Code 436: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=85");
}
}
?>