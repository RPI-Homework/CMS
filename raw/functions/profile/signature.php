<?php
if ($function == 1)
{
if ($cookie == 1)
{
echo "<h3>Editing Signature</h3>";
echo "<div align='right'><a href='index.php?idx=4'>Edit Profile</a> - <a href='index.php?idx=43'>Change Password</a> - <a href='index.php?idx=42'>Change Avatar</a> - <a href='index.php?idx=41'>Edit Date</a></div>";
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='44'>";
echo "<table>";
if (!$member['signature'])
{}
else
{
echo "<tr><td colspan='2'>" . $member['signature'] . "</td></tr>";
}
echo "<tr><td>Signature</td><td><textarea rows='3' cols='30' name='signature'>" . $member['signature'] . "</textarea></td></tr>";
echo "<tr><td colspan='2'><input type='submit' name='pro' value='Update Signature' /></td></tr>";
echo "</table>";
echo "</form></table>";
}
}
?>