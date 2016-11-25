<?php
if ($cookie == 1)
{
if ($mgroup['editgroups'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `group` WHERE `name` = '" . $_POST['name'] . "'")or die("<br>Error Code 378: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 != 0)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 87: Group already exists.<br>
<a href='index.php?idx=6'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['name'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 77: No group name enetered.<br>
<a href='index.php?idx=6'>Back</a>";
include $skinfooter;
}
else
{
if ($member['gid'] == $ra)
{
$caneditmembers2 = $_POST['caneditmembers'];
$viewlogs2 = $_POST['viewlogs'];
$editarticles2 = $_POST['editarticles'];
$edithome2 = $_POST['edithome'];
$editskin2 = $_POST['editskin'];
$caneditgeneral2 = $_POST['caneditgeneral'];
$caneditgroups2 = $_POST['editgroups'];
$staff2 = $_POST['isstaff'];
$admin2 = $_POST['admin'];
$addadmin2 = $_POST['addadmin'];
}
elseif ($mgroup['addadmin'] == 1)
{
if ($mgroup['caneditmembers'] == 1) { $caneditmembers2 = $_POST['caneditmembers']; }
else { $caneditmembers2 = 0; }
if ($mgroup['viewlogs'] == 1) { $viewlogs2 = $_POST['viewlogs']; }
else { $viewlogs2 = 0; }
if ($mgroup['editarticles'] == 1) { $editarticles2 = $_POST['editarticles']; }
else { $editarticles2 = 0; }
if ($mgroup['edithome'] == 1) { $edithome2 = $_POST['edithome']; }
else { $edithome2 = 0; }
if ($mgroup['editskin'] == 1) { $editskin2 = $_POST['editskin']; }
else { $editskin2 = 0; }
if ($mgroup['caneditgeneral'] == 1) { $caneditgeneral2 = $_POST['caneditgeneral']; }
else { $caneditgeneral2 = 0; }
$caneditgroups2 = $_POST['editgroups'];
$staff2 = $_POST['isstaff'];
$admin2 = $_POST['admin'];
$addadmin2 = 0;
}
else
{
$caneditmembers2 = 0;
$viewlogs2 = 0;
$editarticles2 = 0;
$edithome2 = 0;
$editskin2 = 0;
$caneditgeneral2 = 0;
$caneditgroups2 = 0;
$staff2 = 0;
$admin2 = 0;
$addadmin2 = 0;
}
$add = mysql_query("
INSERT INTO `" . $database . "`.`group` (
`id` ,
`name` ,
`admin` ,
`rootadmin` ,
`caneditmembers` ,
`editarticles` ,
`edithome` ,
`addadmin` ,
`editgroups` ,
`editskin` ,
`caneditgeneral` ,
`viewlogs` ,
`ban` ,
`viewarticles` ,
`isstaff` ,
`canpm` ,
`editprofile`
)
VALUES (
NULL , '" . $_POST['name'] . "', '" . $admin2 . "', '" . $addadmin2 . "' , '" . $caneditmembers2 . "', '" . $editarticles2 . "', '" . $edithome2 . "', '0', '" . $caneditgroups2 . "', '" . $editskin2 . "', '" . $caneditgeneral2 . "', '" . $viewlogs2 . "', '" . $_POST['ban'] . "', '" . $_POST['viewarticles'] . "', '" . $staff2 . "', '" . $_POST['canpm'] . "', '" . $_POST['editprofile'] . "')
")or die("<br>Error Code 364: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=6");
}
}
}
?>