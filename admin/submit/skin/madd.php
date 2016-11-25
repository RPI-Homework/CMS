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
echo"<br>Error Code 141: No author name entered.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
elseif (!$_POST['skin'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 142: No skin name entered.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
else
{
$check3 = mysql_query("SELECT * FROM `adminskin` WHERE `skin` = '" . $_GET['add'] . "'")or die("<br>Error Code 546: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 != 0)
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 143: A skin with that name already exists.<br>
<a href='index.php?idx=9'>Back</a>";
include $skinfooter;
}
else
{
$add = mysql_query("INSERT INTO `" . $database . "`.`memberskin` (`id` , `skin` , `author` , `header` , `banner` , `login` , `prelogin` , `prename` , `prelogout` , `postlogin` , `menu` , `menutitles` , `menulinks` , `postmenu` , `postmenulinks` , `eachlink` , `posteachlink`, `loginas` , `postloginas` , `content` , `contentheader` , `contenttext` , `postcontentheader` , `postcontenttext` , `copyright` , `footer` , `selectable` ) VALUES (NULL , '" . $_POST['skin'] . "', '" . $_POST['author'] . "', '" . $_POST['header'] . "', '" . $_POST['banner'] . "', '" . $_POST['login'] . "', '" . $_POST['prelogin'] . "', '" . $_POST['prename'] . "', '" . $_POST['prelogout'] . "', '" . $_POST['postlogin'] . "', '" . $_POST['menu'] . "', '" . $_POST['menutitles'] . "', '" . $_POST['menulinks'] . "', '" . $_POST['postmenu'] . "', '" . $_POST['postmenulinks'] . "', '" . $_POST['eachlink'] . "', '" . $_POST['posteachlink'] . "', '" . $_POST['loginas'] . "', '" . $_POST['postloginas'] . "', '" . $_POST['content'] . "', '" . $_POST['contentheader'] . "', '" . $_POST['contenttext'] . "', '" . $_POST['postcontentheader'] . "', '" . $_POST['postcontenttext'] . "', '" . $_POST['copyright'] . "', '" . $_POST['footer'] . "', '" . $_POST['selectable'] . "')")or die("<br>Error Code 547: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=9");
}
}
}
}
?>