<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['adel'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 41: No Article ID.<br>
<a href='index.php?idx=4'>Back</a>";
include $skinfooter;
}
else
{
$del = mysql_query("DELETE FROM `articles` WHERE `articles`.`id` = " . $_POST['adel'] . " LIMIT 1")or die("<br>Error Code 332: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=4");
}
}
}
?>