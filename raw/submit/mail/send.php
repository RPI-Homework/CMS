<?php
if ($function == 1)
{
if ($cookie == 1 AND $member['canpm'] == 1)
{
$mcheck = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['to'] . "'")or die("<br>Error Code 1064: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($mcheck);
if ($num != 0)
{
$mto = mysql_fetch_assoc($mcheck);
$addpm = mysql_query("INSERT INTO `" . $database . "`.`pm` (`id` , `from` , `to` , `title` , `content` , `read` , `date`)
VALUES (NULL , '" . $member['id'] . "', '" . $mto['id'] . "', '" . $_POST['title'] . "', '" . $_POST['content'] . "', '0', '" . gmmktime() . "')")or die("<br>Error Code 1065: Please contact the Root Administrator immediately.<br>" . mysql_error());
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Sent PM: " . $_POST['title'] . "', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
}
header("Location: index.php?idx=5");
}
?>