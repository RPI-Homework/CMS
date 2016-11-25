<?php
if ($function == 1)
{
if ($cookie == 1)
{
if (!$_POST['article'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>No article text entered.<br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
include $skinfooter;
}
else if (!$_POST['name'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>No article name entered.<br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
include $skinfooter;
}
else
{
$add = mysql_query("INSERT INTO `" . $database . "`.`articles` (
`id` ,
`name` ,
`author` ,
`edit` ,
`article` ,
`memberonly` ,
`guestredirect` ,
`redirectto` ,
`guestview` ,
`public` ,
`cat`
)
VALUES (
NULL ,
'" . $_POST['name'] . "',
'" . $member['user'] . "',
'',
'" . $_POST['article'] . "',
'0',
'0',
'register.php',
'" . $_POST['garticle'] . "',
'0',
'" . $_POST['cat'] . "')")or die("<br>Error Code 1068: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: " . $_SERVER['PHP_SELF']);
}
}
else
{
if ($gen['guestarticles'] == 1)
{
if (!$_POST['author'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>No author name entered.<br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
include $skinfooter;
}
else if (!$_POST['name'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>No article name entered.<br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
include $skinfooter;
}
else if (!$_POST['article'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>No article text entered.<br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
include $skinfooter;
}
else
{
$add = mysql_query("INSERT INTO `" . $database . "`.`articles` (
`id` ,
`name` ,
`author` ,
`edit` ,
`article` ,
`memberonly` ,
`guestredirect` ,
`redirectto` ,
`guestview` ,
`public` ,
`cat`
)
VALUES (
NULL ,
'" . $_POST['name'] . "',
'" . $_POST['author'] . "',
'',
'" . $_POST['article'] . "',
'0',
'0',
'register.php',
'" . $_POST['garticle'] . "',
'0',
'" . $_POST['cat'] . "')")or die("<br>Error Code 1069: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: " . $_SERVER['PHP_SELF']);
}
}
else
{}
}
}
?>