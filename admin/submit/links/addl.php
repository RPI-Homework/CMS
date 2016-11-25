<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$catcheck = mysql_query("SELECT * FROM `category` WHERE `id` = " . $_POST['alcat'])or die("<br>Error Code 234: Please contact the Root Administrator immediately.<br>");
$num2 = mysql_num_rows($catcheck);
if (!$_POST['alname'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 11: No link name entered.<br>";
echo "<a href='index.php?idx=28'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['alcat'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 12: No category ID entered.<br>";
echo "<a href='index.php?idx=28'>Back</a>";
include $skinfooter;
}
elseif ($num2 == 0)
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 13: Category does not exist.<br>";
echo "<a href='index.php?idx=28'>Back</a>";
include $skinfooter;
}
else
{
$addlink = mysql_query("INSERT INTO `" . $database . "`.`menu` (`id` , `name` , `link` , `order` , `cat`)
VALUES (NULL , '" . $_POST['alname'] . "', '" . $_POST['allink'] . "', '" . $_POST['alorder'] . "', '" . $_POST['alcat'] . "')")or die("<br>Error Code 235: Please contact the Root Administrator immediately.<br>");
header("Location: index.php?idx=2");
}
}
}
?>