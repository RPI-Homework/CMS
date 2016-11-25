<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['aoname'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 41: No category name entered.<br>
<a href='index.php?idx=5'>Back</a>";
include $skinfooter;
}
else
{
$addcat = mysql_query("INSERT INTO `" . $database . "`.`acat` (`id` , `name` , `order`)
VALUES (NULL , '" . $_POST['aoname'] . "', '" . $_POST['aoorder'] . "')")or die("<br>Error Code 302: Please contact the Root Administrator immediately.<br>");
header("Location: index.php?idx=5");
}
}
}
?>