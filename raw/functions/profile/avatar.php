<?php
if ($function == 1)
{
if ($cookie == 1)
{
echo "<h3>Editing Avatar</h3>";
echo "<div align='right'><a href='index.php?idx=4'>Edit Profile</a> - <a href='index.php?idx=43'>Change Password</a> - <a href='index.php?idx=41'>Edit Date</a> - <a href='index.php?idx=44'>Change Signature</a></div>";
echo "<form enctype='multipart/form-data' action='index.php' method='post'>";
echo "<input type='hidden' name='sum' value='42'>";
echo "<table>";
if (!$member['avatar'])
{}
else
{
echo "<tr><td align='center' colspan='2'><img src='" . $member['avatar'] . "' height='" . $member['aheight'] . "' width='" . $member['awidth'] . "' /></td></tr>";
}
echo "<tr><td>Avatar URL</td><td><input type='text' name='avatar' value='" . $member['avatar'] . "' /></td></tr>";
echo "<tr><td>Upload Avatar</td><td><input type='file' name='image' /></td></tr>";
echo "<tr><td>Auto Resize</td><td>Yes <input type='radio' name='aresize' value='1' checked='checked' /> No <input type='radio' name='aresize' value='0' /></td></tr>";
echo "<tr><td colspan='2'>Height: <input type='text' maxlength='3' size='4' name='height' value='" . $member['aheight'] . "' /> Width: <input type='text' maxlength='3' size='4' name='width' value='" . $member['awidth'] . "' /></td></tr>";
echo "<tr><td colspan='2'><input type='submit' name='pro' value='Update Avatar' /></td></tr>";
echo "</table>";
echo "</form>
Your file limit is " . $mgroup['alimit'] . " Kb.";
}
}
?>