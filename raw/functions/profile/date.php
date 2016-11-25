<?php
if ($function == 1)
{
if ($cookie == 1)
{
echo "<h3>Editing Dates and Time</h3>";
echo "<div align='right'><a href='index.php?idx=4'>Edit Profile</a> - <a href='index.php?idx=43'>Change Password</a> - <a href='index.php?idx=42'>Change Avatar</a> - <a href='index.php?idx=44'>Change Signature</a></div>";
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='41'>";
echo "<table>";
$date = gmdate($sdate, gmmktime() + $time);
echo "<tr><td colspan='2'><center>" . $date . "</center></td></tr>";
$date = gmdate($ldate, gmmktime() + $time);
echo "<tr><td colspan='2'><center>" . $date . "</center></td></tr>";
echo "<tr><td>Date</td><td><input type='text' name='date' value='" . $member['date'] . "' /></td></tr>";
echo "<tr><td>Short Date</td><td><input type='text' name='sdate' value='" . $member['sdate'] . "' /></td></tr>";
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
<option value='0'>0</option>
<option value='1'>+1</option>
<option value='2'>+2</option>
<option value='3'>+3</option>
<option value='4'>+4</option>
<option value='5'>+5</option>
<option value='6'>+6</option>
<option value='7'>+7</option>
<option value='8'>+8</option>
<option value='9'>+9</option>
<option value='10'>+10</option>
<option value='11'>+11</option>
<option value='12'>+12</option>";
echo "</select></td></tr>";
echo "<tr><td colspan='2'><input type='submit' name='pro' value='Update Dates and Time' /></td></tr>";
echo "</table>";
echo "</form>";
}
}
?>