<?php
if ($function == 1)
{
if (!$member['id'])
{
header("Location: index.php");
}
else
{
$upmem = mysql_query("UPDATE `" . $database . "`.`users` SET
`signature` = '" . $_POST['signature'] . "'
WHERE `users`.`id` = " . $member['id'] . " LIMIT 1")or die("<br>Error Code 1067: Please contact the Root Administrator immediately.<br>" . mysql_error());
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Edit Signature', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=4");
}
}
?>