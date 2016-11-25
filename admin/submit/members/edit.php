<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_POST['id'])or die("<br>Error Code 462: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
$medit = mysql_fetch_array( $check3 );
if (!$_POST['group'])
{}
else
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_POST['group'])or die("<br>Error Code 463: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gedit = mysql_fetch_array( $check4 );
}
$check5 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 464: Please contact the Root Administrator immediately.<br>" . mysql_error());
$extra = mysql_fetch_array( $check5 );
if ($medit['gid'] == $ra AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 115: You cannot edit Root Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
include $skinfooter;
}
elseif ($gedit['id'] == $ra AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 116: You cannot add Root Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
include $skinfooter;
}
elseif ($gedit['admin'] == 1 AND $mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 117: You cannot edit Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
include $skinfooter;
}
elseif ($extra['admin'] == 1 AND $mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 118: You cannot add Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
include $skinfooter;
}
else
{
if (!$_POST['password'])
{

}
else
{
$uppass = mysql_query("UPDATE `" . $database . "`.`users` SET
`password` = '" . md5($_POST['password']) . "'
WHERE `users`.`id` = " . $_POST['id'] . " LIMIT 1")or die("<br>Error Code 465: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
if (!$_POST['name'])
{

}
else
{
$upuser = mysql_query("UPDATE `" . $database . "`.`users` SET
`user` = '" . $_POST['name'] . "'
WHERE `users`.`id` = " . $_POST['id'] . " LIMIT 1")or die("<br>Error Code 466: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
if (!$_POST['email'])
{

}
else
{
$upmail = mysql_query("UPDATE `" . $database . "`.`users` SET
`email` = '" . $_POST['email'] . "'
WHERE `users`.`id` = " . $_POST['id'] . " LIMIT 1")or die("<br>Error Code 467: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
if ($medit['id'] != $member['id'] AND $member['gid'] != $ra)
{
$_POST['group'] == $medit['gid'];
}
$upmem = mysql_query("UPDATE `" . $database . "`.`users` SET
`gid` = '" . $_POST['group'] . "',
`ban` = '" . $_POST['ban'] . "',
`adminskin` = '" . $_POST['adminskin'] . "',
`skin` = '" . $_POST['skin'] . "',
`gender` = '" . $_POST['gender'] . "',
`canpm` = '" . $_POST['canpm'] . "',
`editprofile` = '" . $_POST['editprofile'] . "',
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
WHERE `users`.`id` = " . $_POST['id'] . " LIMIT 1")or die("<br>Error Code 468: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=8");
}
}
}
?>