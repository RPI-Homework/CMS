<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Adding Member";
echo $skin['postcontentheader'];
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 427: Please contact the Root Administrator immediately.<br>" . mysql_error());
$box2 = mysql_query("SELECT * FROM `adminskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 428: Please contact the Root Administrator immediately.<br>" . mysql_error());
$box3 = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 429: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='84' />
<table border='0'>
<tr><td>Username</td><td><input type='text' maxlength='32' name='name' /></td></tr>
<tr><td>Password</td><td><input type='text' maxlength='32' name='password' /></td></tr>
<tr><td>Email Address</td><td><input type='text' name='email' /></td></tr>";
echo "<tr><td>Group</td><td><select name='group'>";
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $ra AND $member['gid'] != $ra)
{

}
elseif ($row['addadmin'] == 1 AND $member['gid'] != $ra)
{

}
elseif ($row['admin'] == 1 AND $member['gid'] != $ra AND $mgroup['addadmin'] != 1)
{

}
elseif ($row['isstaff'] == 1 AND $member['gid'] != $ra AND $mgroup['addadmin'] != 1)
{

}
else if ($general['membergroup'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['name'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Administrative Panel Skin</td><td><select name='adminskin'>";
while($row = mysql_fetch_assoc($box2))
{
if ($general['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
$genset = mysql_query("SELECT * FROM `general` WHERE `id` = 1")or die("<br>Error Code 431: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<tr><td>Main Site Skin</td><td><select name='skin'>";
while($row = mysql_fetch_assoc($box3))
{
if ($general['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Gender</td><td>";
echo "Male<input type='radio' name='gender' value='1' checked='checked' />";
echo "Female<input type='radio' name='gender' value='0' /></td></tr>";
echo "<tr><td>Can send and recieve personal messages?</td><td>";
echo "Yes<input type='radio' name='canpm' value='1' checked='checked' />";
echo "No<input type='radio' name='canpm' value='0' /></td></tr>";
echo "<tr><td>Can edit their own profile?</td><td>";
echo "Yes<input type='radio' name='editprofile' value='1' checked='checked' />";
echo "No<input type='radio' name='editprofile' value='0' /></td></tr>";
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
echo "Yes<input type='radio' name='ban' value='1' />";
echo "No<input type='radio' name='ban' value='0' checked='checked' /></td></tr>";
echo "<tr><td colspan='2'><center>";
echo "<input type='submit' name='Update' value='Add Member' /></center></td></tr></table></form>";
}
}
?>