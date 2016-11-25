<?php
if ($cookie == 1)
{
if ($mgroup['editgroups'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_POST['id'])or die("<br>Error Code 378: Please contact the Root Administrator immediately.<br>" . mysql_error());
$group = mysql_fetch_array( $check2 );
if (!$_POST['name'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 91: No group name entered.<br>
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
else { $caneditmembers2 = $group['caneditmembers']; }
if ($mgroup['viewlogs'] == 1) { $viewlogs2 = $_POST['viewlogs']; }
else { $viewlogs2 = $group['viewlogs']; }
if ($mgroup['editarticles'] == 1) { $editarticles2 = $_POST['editarticles']; }
else { $editarticles2 = $group['editarticles']; }
if ($mgroup['edithome'] == 1) { $edithome2 = $_POST['edithome']; }
else { $edithome2 = $group['edithome']; }
if ($mgroup['editskin'] == 1) { $editskin2 = $_POST['editskin']; }
else { $editskin2 = $group['editskin']; }
if ($mgroup['caneditgeneral'] == 1) { $caneditgeneral2 = $_POST['caneditgeneral']; }
else { $caneditgeneral2 = $group['caneditgeneral']; }
$caneditgroups2 = $_POST['editgroups'];
$staff2 = $_POST['isstaff'];
$admin2 = $_POST['admin'];
$addadmin2 = $group['addadmin'];
}
else
{
$caneditmembers2 = $group['caneditmembers'];
$viewlogs2 = $group['viewlogs'];
$editarticles2 = $group['editarticles'];
$edithome2 = $group['edithome'];
$editskin2 = $group['editskin'];
$caneditgeneral2 = $group['caneditgeneral'];
$caneditgroups2 = $group['editgroups'];
$staff2 = $group['isstaff'];
$admin2 = $group['admin'];
$addadmin2 = $group['addadmin'];
}
$update = mysql_query("UPDATE `" . $database . "`.`group` SET
`name` = '" . $_POST['name'] . "',
`ban` = " . $_POST['ban'] . ",
`viewarticles` = " . $_POST['viewarticles'] . ",
`canpm` = " . $_POST['canpm'] . ",
`editprofile` = " . $_POST['editprofile'] . ",
`isstaff` = " . $staff2 . ",
`admin` = " . $admin2 . ",
`addadmin` = " . $addadmin2 . ",
`caneditmembers` = " . $caneditmembers2 . ",
`editarticles` = " . $editarticles2 . ",
`edithome` = " . $edithome2 . ",
`editgroups` = " . $caneditgroups2 . ",
`editskin` = " . $editskin2 . ",
`caneditgeneral` = " . $caneditgeneral2 . ",
`viewlogs` = " . $viewlogs2 . "
WHERE `group`.`id` = " . $_POST['id'] . " LIMIT 1 ;")or die("<br>Error Code 381: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=6");
}
}
}
?>