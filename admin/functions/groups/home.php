<?php
if ($cookie == 1)
{
if ($mgroup['editgroups'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Member Groups";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Add a Group<form action='index.php' method='get'>
<input type='hidden' name='idx' value='62'>
<input type='text' name='add' />
<input type='submit' name='submit' value='Add' />
</form>";
$gencheck = mysql_query("SELECT * FROM `general` WHERE `id` = 1")or die("<br>Error Code 391: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gen = mysql_fetch_array( $gencheck );
echo "Edit a Group<form action='index.php' method='get'>
<input type='hidden' name='idx' value='61'>
<select name='id' onChange = 'this.form.submit()'>";
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 394: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<option selected='selected' disabled='disabled'>Select a Group</option>";
while($row = mysql_fetch_assoc($box))
{
if ($member['gid'] == $ra)
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
else if ($row['id'] == $ra)
{

}
else if ($mgroup['addadmin'] != 1 AND $row['admin'] == 1)
{

}
else if ($row['id'] == $member['gid'])
{

}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
}
echo "</select></form>";
$box2 = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 395: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "Delete a Group<form action='index.php' method='get'>
<input type='hidden' name='idx' value='63'>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Group</option>";
while($row = mysql_fetch_assoc($box2))
{
if ($row['id'] == $ra)
{

}
else if ($mgroup['addadmin'] != 1 AND $member['gid'] != $ra AND $row['admin'] == 1)
{

}
else if ($row['id'] == $member['gid'])
{

}
else if ($row['id'] == $gen['membergroup'])
{

}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
}
echo "</select></form>";
echo $skin['postcontenttext'];
}
}
?>