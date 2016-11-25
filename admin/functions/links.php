<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: " . $index);
}
else
{
echo "<table>";
echo "<tr><td colspan='2'>";
echo $skin['contentheader'];
echo "<center>Links</center>";
echo $skin['postcontentheader'];
echo "</td><td colspan='2'>";
echo $skin['contentheader'];
echo "<center>Categories</center>";
echo $skin['postcontentheader'];
echo "</td></tr>";
echo $skin['contenttext'];
echo "<tr><td valign='top'><center>Add a Link</center></td><td><form action='index.php' method='get'>
<center>
<center><table><tr><td>
<input type='text' name='alink'/></td></tr><tr><td>
<div align='right'>
<input type='hidden' name='idx' value='28'/>
<input type='submit' name='add' value='Add Link'/>
</div>
</td></tr></table></center>
</center>
</form></td><td valign='top'><center>Add a Category</center></td><td><form action='index.php' method='get'>
<center><table><tr><td>
<input type='text' name='acat'/></td></tr><tr><td>
<div align='right'>
<input type='hidden' name='idx' value='27'/>
<input type='submit' name='add' value='Add Category'/>
</div>
</td></tr></table></center>
</form></td></tr>
<tr><td valign='top'><center>Edit a Link</center></td><td>
<center>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='26'/>
<select name='elink' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Link</option>";
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 263: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option disabled='disabled'>" . $row['name'] . "</option>";
$box2 = mysql_query("SELECT * FROM `menu` WHERE `cat` = '" . $row['id'] . "' ORDER BY `order`")or die("<br>Error Code 264: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row2 = mysql_fetch_assoc($box2))
{
echo "<option value='" . $row2['id'] . "'>---" . $row2['name'] . "---</option>";
}
}
echo "</select></form>
</center>
</td><td valign='top'><center>Edit a Category</center></td><td><center>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='25'/>
<select name='ecat' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 265: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>
</center></td></tr>
<tr><td valign='top'><center>Order Links</center></td><td><form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<center>
<input type='hidden' name='idx' value='24'/>
<input type='submit' name='olink' value='Order Links'/>
</center>
</form></td><td valign='top'><center>Order Categories</center></td><td><form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<center>
<input type='hidden' name='idx' value='23'/>
<input type='submit' name='ocat' value='Order Categories'/>
</center>
</form></td></tr>
<tr><td valign='top'><center>Delete a Link</center></td><td><center>
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<input type='hidden' name='idx' value='22'/>
<select name='dlink' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Link</option>";
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 266: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option disabled='disabled'>" . $row['name'] . "</option>";
$box2 = mysql_query("SELECT * FROM `menu` WHERE `cat` = '" . $row['id'] . "' ORDER BY `order`")or die("<br>Error Code 267: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row2 = mysql_fetch_assoc($box2))
{
echo "<option value='" . $row2['id'] . "'>---" . $row2['name'] . "---</option>";
}
}
echo "</select></form>
</center></td><td valign='top'><center>Delete a Category</center></td><td><center>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='21'/>
<select name='dcat' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 268: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>
</center></td></tr></table>";
echo $skin['postcontenttext'];
}
}
?>