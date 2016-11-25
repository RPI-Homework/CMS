<?php
if ($cookie == 1)
{
if ($mgroup['editskin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['author'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 135: No author name entered.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['skin'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 136: No skin name entered.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['id'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 137: Invalid skin ID.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
else
{
$check3 = mysql_query("SELECT * FROM `adminskin` WHERE `id` = " . $_POST['id'])or die("<br>Error Code 534: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 == 0)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 138: Invalid skin ID.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
else
{
$update = mysql_query("UPDATE `" . $database . "`.`adminskin` SET
`skin` = '" . $_POST['skin'] . "',
`author` = '" . $_POST['author'] . "',
`header` = '" . $_POST['header'] . "',
`banner` = '" . $_POST['banner'] . "',
`login` = '" . $_POST['login'] . "',
`prelogin` = '" . $_POST['prelogin'] . "',
`prename` = '" . $_POST['prename'] . "',
`prelogout` = '" . $_POST['prelogout'] . "',
`postlogin` = '" . $_POST['postlogin'] . "',
`menu` = '" . $_POST['menu'] . "',
`menutitles` = '" . $_POST['menutitles'] . "',
`menulinks` = '" . $_POST['menulinks'] . "',
`postmenu` = '" . $_POST['postmenu'] . "',
`postmenulinks` = '" . $_POST['postmenulinks'] . "',
`loginas` = '" . $_POST['loginas'] . "',
`betlinks` = '" . $_POST['betlinks'] . "',
`postloginas` = '" . $_POST['postloginas'] . "',
`content` = '" . $_POST['content'] . "',
`contentheader` = '" . $_POST['contentheader'] . "',
`contenttext` = '" . $_POST['contenttext'] . "',
`postcontenttext` = '" . $_POST['postcontenttext'] . "',
`copyright` = '" . $_POST['copyright'] . "',
`footer` = '" . $_POST['footer'] . "',
`postcontentheader` = '" . $_POST['postcontentheader'] . "',
`selectable` = '" . $_POST['selectable'] . "'
WHERE `adminskin`.`id` = " . $_POST['id'] . " LIMIT 1")or die("<br>Error Code 535: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=9");
}
}
}
}
?>