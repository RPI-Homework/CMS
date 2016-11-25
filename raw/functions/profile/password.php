<?php
if ($function == 1)
{
if ($cookie == 1)
{
echo "<h3>Editing Password</h3>";
echo "<div align='right'><a href='index.php?idx=4'>Edit Profile</a> - <a href='index.php?idx=41'>Edit Date</a> - <a href='index.php?idx=42'>Change Avatar</a> - <a href='index.php?idx=44'>Change Signature</a></div>";
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='43'>";
echo "<table>";
echo "<tr><td>Old Password</td><td><input type='password' name='opass' /></td></tr>";
echo "<tr><td>New Password</td><td><input type='password' name='npass' /></td></tr>";
echo "<tr><td>Confirm New Password</td><td><input type='password' name='cnpass' /></td></tr>";
echo "<tr><td colspan='2'><input type='submit' name='pro' value='Update Password' /></td></tr>";
echo "</table>";
echo "</form>";
}
}
?>