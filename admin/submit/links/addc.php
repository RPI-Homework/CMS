<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['aoname'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 15: No category name entered.<br>";
echo "<a href='index.php?idx=27'>Back</a>";
include $skinfooter;
}
else
{
$addcat = mysql_query("INSERT INTO `" . $database . "`.`category` (`id` , `name` , `order`)
VALUES (NULL , '" . $_POST['aoname'] . "', '" . $_POST['aoorder'] . "')")or die("<br>Error Code 237: Please contact the Root Administrator immediately.<br>");
header("Location: index.php?idx=2");
}
}
}
?>