<?php
if ($function == 1)
{
if (!$member['id'])
{
header("Location: index.php");
}
else
{
$birthday = gmmktime(0, 0, 1, $_POST['month'], $_POST['day'], $_POST['year']);
$upmem = mysql_query("UPDATE `" . $database . "`.`users` SET
`skin` = '" . $_POST['skin'] . "',
`gender` = '" . $_POST['gender'] . "',
`aim` = '" . $_POST['aim'] . "',
`msn` = '" . $_POST['msn'] . "',
`yim` = '" . $_POST['yim'] . "',
`icq` = '" . $_POST['icq'] . "',
`interests` = '" . $_POST['interests'] . "',
`referal` = '" . $_POST['referal'] . "',
`birthday` = '" . $birthday . "',
`url` = '" . $_POST['url'] . "',
`location` = '" . $_POST['location'] . "'
WHERE `users`.`id` = " . $member['id'] . " LIMIT 1")or die("<br>Error Code 1067: Please contact the Root Administrator immediately.<br>" . mysql_error());
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Profile Edit', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=4");
}
}
?>