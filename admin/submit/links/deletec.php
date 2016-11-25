<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (isset($_POST['dcdel']))
{
if (!$_POST['dccat'])
{
include $skinheader;
include "menu.php";
include $skincontent;
$catcheck = mysql_query("SELECT * FROM `category` WHERE `id` = " . $_POST['dcid'])or die("<br>Error Code 257: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($catcheck);
if ($num2 == 0)
{
echo "<br>Error Code 24: That category does not exist.<br>
<a href='index.php?idx=2'>Back</a>";
include $skinfooter;
}
else
{
$cat = mysql_fetch_array( $catcheck );
echo $skins['contentheader'];
echo "Deleting Category " . $cat['name'];
echo $skins['postcontentheader'];
echo $skins['contenttext'];
echo "
<form action='index.php' method='post'>
<table>
<input type='hidden' name='dcid' value='" . $_POST['dcid'] ."'/> 
<tr><td valign='top' width='40%'>No new category was selected. If yes is pressed, all links under this category will be deleted.</td><td width='5' valign='top'>
<input type='hidden' name='sum' value='21'/>
<input type='submit' name='dddddddddel' value='Yes'/>
</form>
</td><td valign='top' width='5'>
<table>
<form action='index.php?idx=2' method='post'>
<input type='submit' name='none' value='No'/>
</form>
</table>
</td><td></td></tr></table>";
echo $skins['postcontenttext'];
include $skinfooter;
}
}
else
{
$uplink = mysql_query("UPDATE `" . $database . "`.`menu` SET `cat` = '" . $_POST['dccat'] . "' WHERE `menu`.`cat` = " . $_POST['dcid'])or die("<br>Error Code 258: Please contact the Root Administrator immediately.<br>");
$delcar = mysql_query("DELETE FROM `category` WHERE `category`.`id` = " . $_POST['dcid'] . " LIMIT 1")or die("<br>Error Code 259: Please contact the Root Administrator immediately.<br>");
header("Location: index.php?idx=2");
}
}
else if (isset($_POST['dddddddddel']))
{
$dellink = mysql_query("DELETE FROM `menu` WHERE `menu`.`cat` = " . $_POST['dcid'])or die("<br>Error Code 260: Please contact the Root Administrator immediately.<br>");
$delcar = mysql_query("DELETE FROM `category` WHERE `category`.`id` = " . $_POST['dcid'] . " LIMIT 1")or die("<br>Error Code 261: Please contact the Root Administrator immediately.<br>");
header("Location: index.php?idx=2");
}
}
}
?>