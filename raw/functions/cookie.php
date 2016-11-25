<?php
if ($function == 1)
{
$remoteip = $_SERVER['REMOTE_ADDR'];
$gencheck = mysql_query("SELECT * FROM `general` WHERE `id` = 1")or die("<br>Error Code 1016: Please contact the Root Administrator immediately.<br>" . mysql_error());
$general = mysql_fetch_array( $gencheck );
//-------------------------------
//check for good cookie
//-------------------------------
if(isset($_COOKIE['member_id']))
{
$check = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_COOKIE['member_id'])or die("<br>Error Code 1017: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($check);
if ($num == 0)
{
header("Location: " . $logout);
}
else
{
$member = mysql_fetch_array( $check );
$check2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $member['gid'])or die("<br>Error Code 1018: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mgroup = mysql_fetch_array( $check2 );
$check3 = mysql_query("SELECT * FROM `ban` WHERE `id` LIKE '%'")or die("<br>Error Code 1019: Please contact the Root Administrator immediately.<br>" . mysql_error());
$time = 3600 * $member['time'];
$ldate = $member['date'];
$sdate = $member['sdate'];
$login = mysql_query("UPDATE `" . $database . "`.`login` SET `date` = '" . gmmktime() . "', `ip` = '" . $remoteip . "' WHERE `login`.`id` = " . $member['id'] . " LIMIT 1 ;")or die("<br>Error Code 1019: Please contact the Root Administrator immediately.<br>" . mysql_error());
if ($member['unban'] > gmmktime() AND $member['gid'] != $ra)
{
$tempban = 1;
}
while($ban = mysql_fetch_array( $check3 ))
{
if (fnmatch($ban['ip'], $remoteip) AND $member['gid'] != $ra)
{
$ipban = 1;
}
}
if ($_COOKIE['pass_hash'] != $member['password'])
{
header("Location: " . $logout);
}
else
{
$skincheck = mysql_query("SELECT * FROM `memberskin` WHERE `id` = " . $member['skin'])or die("<br>Error Code 1020: Please contact the Root Administrator immediately.<br>" . mysql_error());
$skin = mysql_fetch_array( $skincheck );
$cookie = 1;
if (($mgroup['ban'] == 1 OR $member['ban'] == 1) AND $member['gid'] != $ra)
{
$banned = 1;
}
}
}
}
else
{
$check3 = mysql_query("SELECT * FROM `ban` WHERE `id` LIKE '%'")or die("<br>Error Code 1021: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($ban = mysql_fetch_array( $check3 ))
{
if (fnmatch($ban['ip'], $remoteip))
{
$ipban = 1;
}
}
$skincheck = mysql_query("SELECT * FROM `memberskin` WHERE `id` = " . $general['skin'])or die("<br>Error Code 1022: Please contact the Root Administrator immediately.<br>" . mysql_error());
$skin = mysql_fetch_array( $skincheck );
$time = 3600 * $general['time'];
$ldate = $general['date'];
$sdate = $general['sdate'];
$cookie = 0;
}
}
?>