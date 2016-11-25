<?php
if ($function == 1)
{
if ($cookie == 1)
{
$box3 = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 1066: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<h3>Editing Profile</h3>";
echo "<table><tr><td><form action='index.php' method='post'>
<input type='hidden' name='sum' value='4'>";
echo "<table>";
echo "<tr><td>Avatar</td><td><input type='text' name='avatar' value='" . $member['avatar'] . "' /></td></tr>";
echo "<tr><td>Location</td><td><input type='text' name='location' value='" . $member['location'] . "' /></td></tr>";
echo "<tr><td>Birthday</td><td><input type='text' name='birthday' value='" . $member['birthday'] . "' /></td></tr>";
echo "<tr><td>Gender</td><td>";
if ($member['gender'] == 1)
{
echo "Male<input type='radio' name='gender' value='1' checked='checked' />";
echo "Female<input type='radio' name='gender' value='0' /></td></tr>";
}
else
{
echo "Male<input type='radio' name='gender' value='1' />";
echo "Female<input type='radio' name='gender' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>AIM</td><td><input type='text' name='aim' value='" . $member['aim'] . "' /></td></tr>";
echo "<tr><td>MSN</td><td><input type='text' name='msn' value='" . $member['msn'] . "' /></td></tr>";
echo "<tr><td>YIM</td><td><input type='text' name='yim' value='" . $member['yim'] . "' /></td></tr>";
echo "<tr><td>ICQ</td><td><input type='text' name='icq' value='" . $member['icq'] . "' /></td></tr>";
echo "<tr><td>URL</td><td><input type='text' name='url' value='" . $member['url'] . "' /></td></tr>";
echo "<tr><td>Interests</td><td><textarea rows='3' cols='30' name='interests'>" . $member['interests'] . "</textarea></td></tr>";
echo "<tr><td>Signature</td><td><textarea rows='3' cols='30' name='signature'>" . $member['signature'] . "</textarea></td></tr>";
echo "<tr><td>Referal</td><td><input type='text' name='referal' value='" . $member['referal'] . "' /></td></tr>";
echo "<tr><td>Selected Skin</td><td><select name='skin'>";
while($row = mysql_fetch_assoc($box3))
{
if ($gen['skin'] == $member['skin'] AND $member['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Default)</option>";
}
else if ($member['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Current)</option>";
}
else if ($gen['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Date</td><td><input type='text' name='date' value='" . $member['date'] . "' /></td></tr>";
echo "<tr><td>Short Date</td><td><input type='text' name='sdate' value='" . $member['sdate'] . "' /></td></tr>";
$date = gmdate($member['date'], gmmktime());
echo "<tr><td colspan='2'>" . $date . "</td></tr>";
echo "<tr><td>Time Zone</td><td><select name='time'>";
echo "<option value='" . $member['time'] . "' selected='selected'>" . $member['time'] . " (Current)</option>
<option value='-12'>-12</option>
<option value='-11'>-11</option>
<option value='-10'>-10</option>
<option value='-9'>-9</option>
<option value='-8'>-8</option>
<option value='-7'>-7</option>
<option value='-6'>-6</option>
<option value='-5'>-5</option>
<option value='-4'>-4</option>
<option value='-3'>-3</option>
<option value='-2'>-2</option>
<option value='-1'>-1</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>";
echo "</select></td></tr>";
echo "<tr><td colspan='2'><input type='submit' name='pro' value='Update Profile' /></td></tr>";
echo "</table>";
echo "</form></td><td valign ='top' height='150' width='150' >";
if (!$member['avatar'])
{}
else
{
echo "<img src='" . $member['avatar'] . "' height='100%' width='100%' />";

}
echo "</td></tr></table>";
}
}
?>