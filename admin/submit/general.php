<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (isset($_POST['name']))
{
$quary1 = mysql_query("SELECT * FROM `memberskin` WHERE `id` = " . $_POST['skin'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$quary2 = mysql_query("SELECT * FROM `adminskin` WHERE `id` = " . $_POST['adminskin'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$quary3 = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $_POST['guesthome'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$quary4 = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $_POST['memberhome'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$quary5 = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $_POST['staffhome'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$quary6 = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $_POST['adminhome'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$quary7 = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $_POST['banhome'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$quary8 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_POST['membergroup'])or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num1 = mysql_num_rows($quary1);
$num2 = mysql_num_rows($quary2);
$num3 = mysql_num_rows($quary3);
$num4 = mysql_num_rows($quary4);
$num5 = mysql_num_rows($quary5);
$num6 = mysql_num_rows($quary6);
$num7 = mysql_num_rows($quary7);
$num8 = mysql_num_rows($quary8);
if (!$_POST['name'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 6: A site name is required.<br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
include $skinfooter;
}
else{
if ($_POST['guestarticles'] == 1 OR $_POST['guestarticles'] == 0)
{
if ($num1 != 0 AND $num2 != 0 AND $num3 != 0 AND $num4 != 0 AND $num5 != 0 AND $num6 != 0 AND $num7 != 0 AND $num8 != 0)
{
$mgen = mysql_fetch_array( $quary8 );
if ($mgen['id'] != $ra AND $mgen['admin'] != 1 AND $mgen['isstaff'] != 1)
{
$update = mysql_query("UPDATE `" . $database . "`.`general` SET `name` = '" . $_POST['name'] . "', `skin` = '" . $_POST['skin'] . "', `adminskin` = '" . $_POST['adminskin'] . "', `guesthome` = '" . $_POST['guesthome'] . "', `memberhome` = '" . $_POST['memberhome'] . "', `staffhome` = '" . $_POST['staffhome'] . "', `adminhome` = '" . $_POST['adminhome'] . "',  `banhome` = '" . $_POST['banhome'] . "', `membergroup` = '" . $_POST['membergroup'] . "', `guestarticles` = '" . $_POST['guestarticles'] . "' WHERE `general`.`id` = 1 LIMIT 1")or die("<br>Error Code 220: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=1");
}
else
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 7: The default member group cannot be an Administrator or a Staff Member.<br>";
echo "<a href='index.php?idx=1'>Back</a>";
include $skinfooter;
}
}
else
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 8: All fields must be filled.<br>";
echo "<a href='index.php?idx=1'>Back</a>";
include $skinfooter;
}
}
else
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 9: Guest Articles must be 1 or 0.<br>";
echo "<a href='index.php?idx=1'>Back</a>";
include $skinfooter;
}
}
}
}
}
?>