<?php
if ($cookie == 1)
{
if ($mgroup['editskin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Skins";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Add an Administrative Skin<form action='index.php' method='get'>
<input type='hidden' name='idx' value='91'>
<input type='text' name='add' />
<input type='submit' name='submit' value='Add' />
</form>";
echo "Add a Member Skin<form action='index.php' method='get'>
<input type='hidden' name='idx' value='92'>
<input type='text' name='add' />
<input type='submit' name='submit' value='Add' />
</form>";
echo "Edit an Administrative Skin<form action='index.php' method='get'>
<input type='hidden' name='idx' value='93'>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option value='2' selected='selected' disabled='disabled'>Select a Skin</option>";
$box = mysql_query("SELECT * FROM `adminskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 541: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $general['adminskin'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></form>";
echo "Edit a Member Skin<form action='index.php' method='get'>
<input type='hidden' name='idx' value='94'>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option value='2' selected='selected' disabled='disabled'>Select a Skin</option>";
$box = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 543: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $general['skin'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></form>";
echo "Delete an Administrative Skin<form action='index.php' method='get'>
<input type='hidden' name='idx' value='95'>
<select name='aid' onChange = 'this.form.submit()'>";
echo "<option value='2' selected='selected' disabled='disabled'>Select a Skin</option>";
$box = mysql_query("SELECT * FROM `adminskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 529: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $general['adminskin'])
{

}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></form>";
echo "Delete a Member Skin<form action='index.php' method='get'>
<input type='hidden' name='idx' value='96'>
<select name='mid' onChange = 'this.form.submit()'>";
echo "<option value='2' selected='selected' disabled='disabled'>Select a Skin</option>";
$box = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 530: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $general['skin'])
{

}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
}
echo "</select></form>";
echo $skin['postcontenttext'];
}
?>