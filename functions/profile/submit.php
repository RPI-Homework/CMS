<?php
if ($function == 1)
{
if (!$member['id'])
{
header("Location: " . $_SERVER['PHP_SELF']);
}
else
{
$upmem = mysql_query("UPDATE `" . $database . "`.`users` SET
`skin` = '" . $_POST['skin'] . "',
`gender` = '" . $_POST['gender'] . "',
`aim` = '" . $_POST['aim'] . "',
`msn` = '" . $_POST['msn'] . "',
`yim` = '" . $_POST['yim'] . "',
`icq` = '" . $_POST['icq'] . "',
`avatar` = '" . $_POST['avatar'] . "',
`signature` = '" . $_POST['signature'] . "',
`interests` = '" . $_POST['interests'] . "',
`referal` = '" . $_POST['referal'] . "',
`birthday` = '" . $_POST['birthday'] . "',
`url` = '" . $_POST['url'] . "',
`location` = '" . $_POST['location'] . "'
WHERE `users`.`id` = " . $member['id'] . " LIMIT 1")or die("<br>Error Code 1067: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: " . $_SERVER['PHP_SELF']);
}
}
?>