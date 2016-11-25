<?php
if ($function == 1)
{
if (!$_POST['username'])
{
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '0', 'Log In', 'No Username', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
else
{
if (!$_POST['password'])
{
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '0', 'Log In', 'No Password', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
else
{
$check = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['username'] . "'")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
//-------------------------------
//bad username
//-------------------------------
$num = mysql_num_rows($check);
if ($num == 0)
{
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '0', 'Log In', 'Bad Username', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
else
{
$loggin = mysql_fetch_array( $check );
$pass = md5($_POST['password']);

//-------------------------------
//bad password
//-------------------------------
if ($pass != $loggin['password'])
{
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '0', 'Log In', 'Bad Password', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
else
{
//-------------------------------
// if login is ok add a cookie
//-------------------------------

$hour = time() + 604800;
setcookie(member_id   , $loggin['id']       , $hour);
setcookie(pass_hash   , $loggin['password'] , $hour);
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Log In', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
//-------------------------------
//then tell member name
//-------------------------------
header("Location: " . $_SERVER['PHP_SELF']);
}
}
}
}
}
?>