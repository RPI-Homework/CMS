<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['id'])
{
echo"<br>Error Code 119: Invalid member ID.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 484: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
$medit = mysql_fetch_array( $check3 );
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 485: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gedit = mysql_fetch_array( $check4 );
//-------------------------------
//Admin no edit Root Admin
//-------------------------------
if ($num2 == 0)
{
echo "<br>Error Code 122: User does not exist.<br>
<a href='index.php?idx=8'>Back</a>";
}
elseif ($medit['gid'] == $ra AND $member['gid'] != $ra)
{
echo "<br>Error Code 120: You cannot edit Root Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
}
elseif ($gedit['admin'] == 1 AND $member['gid'] != $ra AND $mgroup['addadmin'] != 1)
{
echo"<br>Error Code 121: You cannot edit Administrators.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Now editing " . $medit['user'] . ".";
echo $skin['postcontentheader'];
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 490: Please contact the Root Administrator immediately.<br>" . mysql_error());
$box2 = mysql_query("SELECT * FROM `adminskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 491: Please contact the Root Administrator immediately.<br>" . mysql_error());
$box3 = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 492: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='82' />
<table border='0'>
<tr><td>Username</td><td><input type='text' maxlength='32' name='name' /></td></tr>
<tr><td>Password</td><td><input type='text' maxlength='32' name='password' /></td></tr>
<tr><td>Email Address</td><td><input type='text' name='email' /></td></tr>
<input type='hidden' name='id' value='" . $_GET['id'] . "' />";
if ($medit['id'] != $member['id'] OR $member['gid'] == $ra)
{
echo "<tr><td>Group</td><td><select name='group'>";
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $ra AND $member['gid'] != $ra)
{

}
elseif (($row['admin'] == 1 OR $row['isstaff']) AND ($mgroup['addadmin'] != 1 AND $member['gid'] != $ra))
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
}
echo "<tr><td>Administrative Panel Skin</td><td><select name='adminskin'>";
while($row = mysql_fetch_assoc($box2))
{
if ($general['adminskin'] == $medit['adminskin'] AND $medit['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Default)</option>";
}
else if ($medit['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Current)</option>";
}
else if ($general['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Main Site Skin</td><td><select name='skin'>";
while($row = mysql_fetch_assoc($box3))
{
if ($general['skin'] == $medit['skin'] AND $medit['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Default)</option>";
}
else if ($medit['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Current)</option>";
}
else if ($general['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Gender</td><td>";
if ($medit['gender'] == 1)
{
echo "Male<input type='radio' name='gender' value='1' checked='checked' />";
echo "Female<input type='radio' name='gender' value='0' /></td></tr>";
}
else
{
echo "Male<input type='radio' name='gender' value='1' />";
echo "Female<input type='radio' name='gender' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Can send and recieve personal messages?</td><td>";
if ($medit['canpm'] == 1)
{
echo "Yes<input type='radio' name='canpm' value='1' checked='checked' />";
echo "No<input type='radio' name='canpm' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='canpm' value='1' />";
echo "No<input type='radio' name='canpm' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Can edit their own profile?</td><td>";
if ($medit['editprofile'] == 1)
{
echo "Yes<input type='radio' name='editprofile' value='1' checked='checked' />";
echo "No<input type='radio' name='editprofile' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='editprofile' value='1' />";
echo "No<input type='radio' name='editprofile' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>AIM</td><td><input type='text' name='aim' value='" . $medit['aim'] . "' /></td></tr>";
echo "<tr><td>MSN</td><td><input type='text' name='msn' value='" . $medit['msn'] . "' /></td></tr>";
echo "<tr><td>YIM</td><td><input type='text' name='yim' value='" . $medit['yim'] . "' /></td></tr>";
echo "<tr><td>ICQ</td><td><input type='text' name='icq' value='" . $medit['icq'] . "' /></td></tr>";
echo "<tr><td>URL</td><td><input type='text' name='url' value='" . $medit['url'] . "' /></td></tr>";
echo "<tr><td>Avatar</td><td><input type='text' name='avatar' value='" . $medit['avatar'] . "' /></td></tr>";
echo "<tr><td>Signature</td><td><textarea rows='3' cols='30' name='signature'>" . $medit['signature'] . "</textarea></td></tr>";
echo "<tr><td>Referal</td><td><input type='text' name='referal' value='" . $medit['referal'] . "' /></td></tr>";
echo "<tr><td>Birthday</td><td><input type='text' name='birthday' value='" . $medit['birthday'] . "' /></td></tr>";
echo "<tr><td>Location</td><td><input type='text' name='location' value='" . $medit['location'] . "' /></td></tr>";
echo "<tr><td>Interests</td><td><textarea rows='3' cols='30' name='interests'>" . $medit['interests'] . "</textarea></td></tr>";
echo "<tr><td>Is user banned?</td><td>";
if ($medit['ban'] == 1)
{
echo "Yes<input type='radio' name='ban' value='1' checked='checked' />";
echo "No<input type='radio' name='ban' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='ban' value='1' />";
echo "No<input type='radio' name='ban' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td colspan='2'><center>";
echo "<input type='submit' name='Update' value='Update' /></center></td></tr></table></form>";
}
}
}
}
?>