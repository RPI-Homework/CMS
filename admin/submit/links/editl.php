<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$catcheck = mysql_query("SELECT * FROM `category` WHERE `id` = " . $_POST['elcat'])or die("<br>Error Code 241: Please contact the Root Administrator immediately.<br>");
$num2 = mysql_num_rows($catcheck);
if (!$_POST['elname'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 17: No link name entered.<br>";
echo "<a href='index.php?idx=26&elink= " . $_POST['elid'] . "'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['elcat'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 18: No category ID entered.<br>";
echo "<a href='index.php?idx=26&elink= " . $_POST['elid'] . "'>Back</a>";
include $skinfooter;
}
elseif ($num2 == 0)
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 19: Category does not exist.<br>";
echo "<a href='index.php?idx=26&elink= " . $_POST['elid'] . "'>Back</a>";
include $skinfooter;
}
else
{
$uplink = mysql_query("UPDATE `" . $database . "`.`menu` SET
`name` = '" . $_POST['elname'] . "',
`link` = '" . $_POST['ellink'] . "',
`order` = '" . $_POST['elorder'] . "',
`cat` = '" . $_POST['elcat'] . "' WHERE `menu`.`id` = " . $_POST['elid'] . " LIMIT 1")or die("<br>Error Code 242: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=2");
}
}
}
?>