<?php
if ($cookie == 1)
{
if ($mgroup['edithome'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Homepages";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Add a Homepage<form action='index.php' method='get'>
<input type='hidden' name='idx' value='71'/>
<input type='text' name='add' />
<input type='submit' name='submit' value='Add' />
</form>";
echo "Edit a Homepage<form action='index.php' method='get'>
<input type='hidden' name='idx' value='72'/>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Homepage</option>";
$box = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 410: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['title'];
if ($row['id'] == $general['guesthome'])
{
echo " (Guest)";
}
if ($row['id'] == $general['memberhome'])
{
echo " (Member)";
}
if ($row['id'] == $general['staffhome'])
{
echo " (Staff)";
}
if ($row['id'] == $general['adminhome'])
{
echo " (Admin)";
}
if ($row['id'] == $general['banhome'])
{
echo " (Banned)";
}
echo "</option>";
}
echo "</select></form>";
echo "Delete a Homepage<form action='index.php' method='get'>
<input type='hidden' name='idx' value='73'/>
<select name='did' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Homepage</option>";
$box2 = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 411: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box2))
{
if ($row['id'] == $general['guesthome'] OR $row['id'] == $general['memberhome'] OR $row['id'] == $general['staffhome'] OR $row['id'] == $generaln['adminhome'] OR $row['id'] == $general['banhome'])
{}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
}
}
echo "</select></form>";
echo $skin['postcontenttext'];
}
}
?>