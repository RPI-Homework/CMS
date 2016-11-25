<?php
if ($function == 1)
{
if ($cookie == 1 AND $member['canpm'] == 1)
{
if ($_POST['id'])
{
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_POST['id'])or die("<br>Error Code 1060: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mto = mysql_fetch_assoc($mcheck);
}
if ($_GET['id'])
{
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 1061: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mto = mysql_fetch_assoc($mcheck);
}
echo "<font class='header-text'>";
echo "Send an Item";
echo "</font>";
echo "<center><table width='98%'>";
echo "<tr><td width='20%' class='main-text'>Menu</td><td width='80%' class='main-text'>Send a Message</td></tr>";
echo "<tr><td align='left' valign='top' width='20%' class='main-text'>";
echo "<a href='index.php?idx=5'>My Inbox</a><br>";
echo "<a href='index.php?idx=51'>My Outbox</a><br>";
echo "<a href='index.php?idx=52'>Create Message</a><br>";
echo "</td><td valign='top' width='80%'><form action='index.php' method='post'>";
echo "<input type='hidden' name='sum' value='52' />";
echo "<table><tr><td>Title:</td><td><input type='text' size='35' name='title' value='" . stripslashes($_POST['title']) . "' /></td></tr>";
echo "<tr><td>To:</td><td><input type='text' size='35' name='to' value='" . stripslashes($mto['user']) . "' /></td></tr>";
echo "<tr><td colspan='2'><textarea cols='40' rows='10' name='content'>" . stripslashes($_POST['content']) . "</textarea></td></tr>";
echo "
<tr><td colspan='2'><input type='reset' name='content' value='Clear' /><input type='submit' name='pm' value='Send' /></td></tr>
</table>
</form>
</td></tr></table>
</center>";
}
else
{
echo "You cannot send or receive personal messages.";
}
}
?>