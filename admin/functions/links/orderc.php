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
echo "Ordering Categories";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 249: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<table>";
while($row = mysql_fetch_assoc($box))
{
echo "<tr><td><form action='index.php' method='post'><input type='hidden' name='sum' value='23'/></td><td>" . $row['name'] . "</td><td><table><input type='hidden' name='ocid' value='" . $row['id'] . "'><input type='text' name='ocupdate' value='" . $row['order'] . "' maxlength='2' size='3'/></table></td><td><table><input type='submit' name='ocorder' value='Edit'></table></form></td></tr>";
}
echo "<tr><td colspan='4'><table><form action='index.php' method='post'>
<input type='submit' name='none' value='Finish'/></form></table></td></tr>
</table>";
echo $skin['postcontenttext'];
}
}
?>