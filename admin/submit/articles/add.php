<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['name'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 36: No article name entered.<br>";
echo "<a href='index.php?idx=45'>Back</a>";
include $skinfooter;
}
else
{
if (!$_POST['author'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 37: No author name entered.<br>";
echo "<a href='index.php?idx=45'>Back</a>";
include $skinfooter;
}
else
{
if (!$_POST['article'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 38: No article text entered.<br>";
echo "<a href='index.php?idx=45'>Back</a>";
include $skinfooter;
}
else
{
if ($_POST['guestredirect'] == 1 AND !$_POST['redirectto'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 39: A URL must be provided to use guest redirection.<br>";
echo "<a href='index.php?idx=45'>Back</a>";
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
'" . $_POST['edit'] . "',
'" . $_POST['article'] . "',
'" . $_POST['memberonly'] . "',
'" . $_POST['guestredirect'] . "',
'" . $_POST['redirectto'] . "',
'" . $_POST['garticle'] . "',
'" . $_POST['public'] . "',
'" . $_POST['cat'] . "')")or die("<br>Error Code 298: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=4");
}
}
}
}
}
}
?>