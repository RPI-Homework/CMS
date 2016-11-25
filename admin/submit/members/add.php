<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['password'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 99: No password entered.<br>
<a href='index.php?idx=84'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['name'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 100: No username entered.<br>
<a href='index.php?idx=84'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['email'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 101: No email entered.<br>
<a href='index.php?idx=84'>Back</a>";
include $skinfooter;
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['name'] . "'")or die("<br>Error Code 415: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_POST['group'])or die("<br>Error Code 416: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gedit = mysql_fetch_array( $check4 );
if ($num2 != 0)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 102: Username in use.<br>
<a href='index.php?idx=84'>Back</a>";
include $skinfooter;
}
elseif ($gedit['id'] == $ra AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 103: You cannot add a Root Administrator.<br>
<a href='index.php?idx=84'>Back</a>";
include $skinfooter;
}
else if ($gedit['admin'] == 1 AND $mgroup['addadmin'] == 1 AND $member['gid'] != $ra)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 104: You cannot add an Administrator.<br>
<a href='" . $membersindex . "'>Back</a>";
include $skinfooter;
}
elseif ($member['gid'] == $ra)
{
$addmember = mysql_query("INSERT INTO `" . $database . "`.`users` (
`id` ,
`user` ,
`gid` ,
`password` ,
`email` ,
`ip` ,
`ban` ,
`adminskin` ,
`skin` ,
`gender` ,
`canpm` ,
`editprofile` ,
`aim` ,
`msn` ,
`yim` ,
`icq` ,
`avatar` ,
`signature` ,
`interests` ,
`referal` ,
`birthday` ,
`url` ,
`location`
)
VALUES (
NULL ,
'" . $_POST['name'] . "',
'" . $_POST['group'] . "',
'" . md5($_POST['password']) . "',
'" . $_POST['email'] . "',
'0.0.0.0',
'" . $_POST['ban'] . "',
'" . $_POST['adminskin'] . "',
'" . $_POST['skin'] . "',
'" . $_POST['gender'] . "',
'" . $_POST['canpm'] . "',
'" . $_POST['editprofile'] . "',
'" . $_POST['aim'] . "',
'" . $_POST['msn'] . "',
'" . $_POST['yim'] . "',
'" . $_POST['icq'] . "',
'" . $_POST['avatar'] . "',
'" . $_POST['signature'] . "',
'" . $_POST['interests'] . "',
'" . $_POST['referal'] . "',
'" . $_POST['birthday'] . "',
'" . $_POST['url'] . "',
'" . $_POST['location'] . "'
)")or die("<br>Error Code 417: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=8");
}
}
}
}
?>