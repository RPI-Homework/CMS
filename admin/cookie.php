<?php
if ($page == 1)
{
//-------------------------------
//check for good cookie
//-------------------------------
$check2 = mysql_query("SELECT * FROM `general` WHERE `id` = 1")or die("<br>Error Code 224: Please contact the Root Administrator immediately.<br>" . mysql_error());
$general = mysql_fetch_array( $check2 );
if(isset($_COOKIE['admin_id']))
{
$check = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_COOKIE['admin_id'])or die("<br>Error Code 600: Please contact the Root Administrator immediately.<br>");
$num = mysql_num_rows($check);
if ($num == 0)
{
header("Location: " . $logout);
}
else
{
$member = mysql_fetch_array( $check );
$askin = $member['adminskin'];
$group_id = $member['gid'];
$check3 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $member['gid'])or die("<br>Error Code 601: Please contact the Root Administrator immediately.<br>");
$mgroup = mysql_fetch_array( $check3 );
//-------------------------------
//cookie password match?
//-------------------------------
if ($_COOKIE['pass_hash'] != $member['password'])
{
header("Location: " . $logout);
}
//-------------------------------
//is admin?
//-------------------------------
else if ($mgroup['admin'] != 1 AND $member['gid'] != $ra)
{
echo "You are in a restricted area, <a href='" . $mdex ."'>click here</a> to leave.<br>";
}
else
{
$cookie = 1;
$admin_id = $_COOKIE['admin_id'];
$skincheck = mysql_query("SELECT * FROM `adminskin` WHERE `id` = " . $member['adminskin'])or die("<br>Error Code 619: Please contact the Root Administrator immediately.<br>");
$skin = mysql_fetch_array( $skincheck );
}
}
}
}
?>