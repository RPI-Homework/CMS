<?php
if ($cookie == 1)
{
if ($mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['id'])
{
echo "<br>Error Code 27: No user ID.<br>
<a href='index.php?idx=3'>Back</a>";
}
else
{
//-------------------------------
//Rest of Page
//-------------------------------
$check3 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 274: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 == 0)
{
echo "<br>Error Code 28: User ID does not exist.<br>
<a href='index.php?idx=3'>Back</a>";
}
else
{
$medit = mysql_fetch_array( $check3 );
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 275: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gedit = mysql_fetch_array( $check4 );
//-------------------------------
//Admin no edit Root Admin
//-------------------------------
if ($medit['gid'] == $ra AND $member['gid'] != $ra)
{
echo "<br>Error Code 29: You cannot edit Root Administrators.<br>
<a href='index.php?idx=3'>Back</a>";
}
//-------------------------------
//Global Root admin edits
//-------------------------------
else if ($member['gid'] == $ra)
{
if ($medit['id'] != $member['id'])
{
echo $skin['contentheader'];
echo "Now editing " . $medit['user'] . ".";
echo $skin['postcontentheader'];
}
else
{
echo $skin['contentheader'];
echo "You are now editing Yourself.";
echo $skin['postcontentheader'];
}
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 276: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<input type='hidden' name='sum' value='32' />
<input type='hidden' name='id' value='" . $medit['id'] . "' />
<table border='0'><tr><td>Group</td><td><select name='group'>
";
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'";
if ($medit['gid'] == $row['id'])
{
echo " selected='selected'";
}
echo ">" . $row['name'] . "</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Is user banned?</td><td>";
if ($medit['ban'] == 1)
{
echo "Yes<input type='radio' name='ban' value='1' checked='checked' />";
echo "No<input type='radio' name='ban' value='0' />";
}
else
{
echo "Yes<input type='radio' name='ban' value='1' />";
echo "No<input type='radio' name='ban' value='0' checked='checked' />";
}
echo "</td></tr><tr><td colspan='2'><center><input type='submit' name='Update' value='Update' /></center></td></tr></table></form>";
echo $skin['postcontenttext'];
}
//-------------------------------
//Admins editing admins
//-------------------------------
else if ($mgroup['addadmin'] == 1)
{
if ($medit['id'] == $member['id'])
{
echo "<br>Error Code 30: You cannot edit Yourself.<br>
<a href='index.php?idx=3'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Now editing " . $medit['user'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 277: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<input type='hidden' name='sum' value='32' />
<input type='hidden' name='id' value='" . $medit['id'] . "' />
<table border='0'><tr><td>Group</td><td><select name='group'>";
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $ra)
{

}
else
{
echo "<option value='" . $row['id'] . "'";
}
if ($medit['gid'] == $row['id'])
{
echo " selected='selected'";
}
echo ">" . $row['name'] . "</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Is user banned?</td><td>";
if ($medit['ban'] == 1)
{
echo "Yes<input type='radio' name='ban' value='1' checked='checked' />";
echo "No<input type='radio' name='ban' value='0' />";
}
else
{
echo "Yes<input type='radio' name='ban' value='1' />";
echo "No<input type='radio' name='ban' value='0' checked='checked' />";
}
echo "</td></tr><tr><td colspan='2'><center><input type='submit' name='Update' value='Update' /></center></td></tr></table></form>";
echo $skin['postcontenttext'];
}
}
//-------------------------------
//Admins editing admins
//-------------------------------
else
{
echo "<br>Error Code 31: Unknown Error.<br>
<a href='index.php?idx=3'>Back</a>";
}
}
}
//--------------------
//Submitted edit
//--------------------
}
}
?>