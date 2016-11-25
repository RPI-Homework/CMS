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
echo "<br>Error Code 59: No article name entered.<br>
<a href='index.php?idx=4'>Back</a>";
include $skinfooter;
}
else
{
if (!$_POST['author'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 60: No author name entered.<br>
<a href='index.php?idx=4'>Back</a>";
include $skinfooter;
}
else
{
if (!$_POST['article'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 61: No article text entered.<br>
<a href='index.php?idx=4'>Back</a>";
include $skinfooter;
}
else
{
if ($_POST['guestredirect'] == 1 AND !$_POST['redirectto'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 62: A URL must be provided to use guest redirection.<br>
<a href='index.php?idx=4'>Back</a>";
include $skinfooter;
}
else
{
$update = mysql_query("UPDATE `" . $database . "`.`articles` SET
`name` = '" . $_POST['name'] . "',
`author` = '" . $_POST['author'] . "',
`edit` = '" . $_POST['edit'] . "',
`article` = '" . $_POST['article'] . "',
`memberonly` = '" . $_POST['memberonly'] . "',
`guestredirect` = '" . $_POST['guestredirect'] . "',
`redirectto` = '" . $_POST['redirectto'] . "',
`guestview` = '" . $_POST['garticle'] . "',
`public` = '" . $_POST['public'] . "',
`cat` = '" . $_POST['cat'] . "' WHERE `articles`.`id` = " . $_POST['id'] . " LIMIT 1")or die("<br>Error Code 338: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=4");
}
}
}
}
}
}
?>