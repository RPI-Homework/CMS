<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['ecname'])
{
include $skinheader;
include "menu.php";
include $skincontent;
echo "<br>Error Code 21: No category name entered.<br>";
echo "<a href='index.php?idx=25&ecat= " . $_POST['ecid'] . "'>Back</a>";
include $skinfooter;
}
else
{
$upcat = mysql_query("UPDATE `" . $database . "`.`category` SET
`name` = '" . $_POST['ecname'] . "',
`order` = '" . $_POST['ecorder'] . "' WHERE `category`.`id` = " . $_POST['ecid'] . " LIMIT 1")or die("<br>Error Code 244: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=2");
}
}
}
?>