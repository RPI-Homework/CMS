<?php
if ($function == 1)
{
if (!$member['id'])
{

}
else
{
$mcheck = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['to'] . "'")or die("<br>Error Code 1064: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($mcheck);
if ($num != 0)
{
$mto = mysql_fetch_assoc($mcheck);
$addpm = mysql_query("INSERT INTO `" . $database . "`.`pm` (
`id` ,
`from` ,
`to` ,
`title` ,
`content` ,
`read`
)
VALUES (
NULL ,
'" . $member['id'] . "',
'" . $mto['id'] . "',
'" . $_POST['title'] . "',
'" . $_POST['content'] . "',
'0'
)")or die("<br>Error Code 1065: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
}
header("Location: " . $_SERVER['PHP_SELF']);
}
?>