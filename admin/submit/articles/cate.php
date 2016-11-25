<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_POST['ecname'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo "<br>Error Code 43: No category name entered.<br>
<a href='index.php?idx=5'>Back</a>";
include $skinfooter;
}
else
{
$upcat = mysql_query("UPDATE `" . $database . "`.`acat` SET
`name` = '" . $_POST['ecname'] . "',
`order` = '" . $_POST['ecorder'] . "' WHERE `acat`.`id` = " . $_POST['ecid'] . " LIMIT 1")or die("<br>Error Code 305: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=5");
}
}
}
?>