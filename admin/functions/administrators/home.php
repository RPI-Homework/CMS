<?php
if ($cookie == 1)
{
if ($mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo"Administration";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Add an Administrator<form action='index.php' method='get'>
<input type='text' name='add' />
<input type='hidden' name='idx' value='31'/>
<input type='submit' name='submit' value='Add' />
</form>";
//-------------------------------
//Edit Admin
//-------------------------------
echo "Edit an Administrator<form action='index.php' method='get'>
<input type='hidden' name='idx' value='32'/>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select an Administrator</option>";
if ($member['gid'] == $ra)
{
$add = mysql_query("SELECT * FROM `users` WHERE `gid` = " . $ra . " ORDER BY `user`")or die("<br>Error Code 292: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($editroot = mysql_fetch_assoc($add))
{
echo "<option value='" . $editroot['id'] . "'>" . $editroot['user'] . " (Root)</option>";
}
}
$add2 = mysql_query("SELECT * FROM `group` WHERE `admin` = 1")or die("<br>Error Code 293: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($editadmin = mysql_fetch_assoc($add2))
{
$add3 = mysql_query("SELECT * FROM `users` WHERE `gid` LIKE " . $editadmin['id'] . " ORDER BY `user`")or die("<br>Error Code 294: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($editmember = mysql_fetch_assoc($add3))
{
if ($editmember['gid'] == $ra)
{

}
else if ($editmember['id'] == $member['id'])
{

}
else
{
echo "<option value='" . $editmember['id'] . "'>" . $editmember['user'] . " (Admin)</option>";
}
}
}
$add2 = mysql_query("SELECT * FROM `group` WHERE `isstaff` = 1")or die("<br>Error Code 295: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($editadmin = mysql_fetch_assoc($add2))
{
if ($editadmin['admin'] != 1)
{
$add3 = mysql_query("SELECT * FROM `users` WHERE `gid` LIKE " . $editadmin['id'] . " ORDER BY `user`")or die("<br>Error Code 296: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($editmember = mysql_fetch_assoc($add3))
{
if ($editmember['gid'] == $ra)
{

}
else if ($editmember['id'] == $member['id'])
{

}
else
{
echo "<option value='" . $editmember['id'] . "'>" . $editmember['user'] . " (Staff)</option>";
}
}
}
}
echo "</select></form>";
echo $skin['postcontenttext'];
}
}
?>