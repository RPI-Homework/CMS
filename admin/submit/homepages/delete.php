<?php
if ($cookie == 1)
{
if ($mgroup['edithome'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if ($_POST['ddid'] == $general['guesthome'] OR $_POST['ddid'] == $general['memberhome'] OR $_POST['ddid'] == $general['staffhome'] OR $_POST['ddid'] == $general['adminhome'] OR $_POST['ddid'] == $general['banhome'])
{
include $skinheader;
include "../menu.php";
include $skincontent;
echo"<br>Error Code 93: You cannot delete a default homepage.<br>
<a href='index.php?idx=7'>Back</a>";
include $skinfooter;
}
else
{
$delhome = mysql_query("DELETE FROM `homepage` WHERE `homepage`.`id` = " . $_POST['ddid'] . " LIMIT 1")or die("<br>Error Code 399: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=7");
}
}
}
?>