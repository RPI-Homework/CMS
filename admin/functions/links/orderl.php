<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Ordering Link";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 246: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<table>";
while($row = mysql_fetch_assoc($box))
{
echo "<tr><td>" . $row['name'] . "</td><td></td><td></td><td></td></tr>";
$box2 = mysql_query("SELECT * FROM `menu` WHERE `cat` = '" . $row['id'] . "' ORDER BY `order`")or die("<br>Error Code 247: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row2 = mysql_fetch_assoc($box2))
{
echo "<tr><td><form action='index.php' method='post'></td><td>" . $row2['name'] . "</td><td><table><input type='hidden' name='olid' value='" . $row2['id'] . "'><input type='text' name='olupdate' value='" . $row2['order'] . "' maxlength='2' size='3'/></table></td><td><table><input type='hidden' name='sum' value='24'/><input type='submit' name='olorder' value='Edit'></table></form></td></tr>";
}
}
echo "<tr><td colspan='4'><table><form action='index.php' method='post'>
<input type='submit' name='none' value='Finish'/></form></table></td></tr>
</table>";
echo $skin['postcontenttext'];
}
}
?>