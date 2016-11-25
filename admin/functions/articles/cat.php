<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Categories";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Add a Category<form action='index.php' method='get'>
<input type='hidden' name='idx' value='51'>
<input type='text' name='acat'/><input type='submit' name='add' value='Add Category'/>
</form>
Edit a Category
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='52'>
<select name='ecat' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 315: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>
Order Categories<form action='index.php' method='get'>
<input type='hidden' name='idx' value='53'>
<input type='submit' name='ocat' value='Order Categories'/>
</form>Delete a Category
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='54'>
<select name='dcat' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 316: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>";
echo $skin['postcontenttext'];
}
}
?>