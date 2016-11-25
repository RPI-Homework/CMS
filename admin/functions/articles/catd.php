<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$catcheck = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $_GET['dcat'])or die("<br>Error Code 310: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($catcheck);
if ($num2 == 0)
{
echo "<br>Error Code 44: Category ID does not exist.<br>
<a href='index.php?idx=5'>Back</a>";
}
else
{
$cat = mysql_fetch_array( $catcheck );
echo $skin['contentheader'];
echo "Deleting Category " . $cat['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='54'>
<table><tr><td valign='top'>
<input type='hidden' name='dcid' value='" . $_GET['dcat'] ."'/>
Category for Sub-Links</td><td colspan='2'>
<select name='dccat'>";
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 311: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $cat['id'])
{

}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
}
echo "</select></td></tr>
<tr><td valign='top'>Are you sure?</td><td>
<input type='submit' name='dcdel' value='Yes'/>
</form>
</td><td>
<table>
<form action='index.php' method='post'>
<input type='submit' name='none' value='No'/>
</form>
</table>
</td></tr></table>
";
echo $skin['postcontenttext'];
}
}
}
?>