<?php
if ($function == 1)
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
echo $skin['contentheader'];
echo "Send an Item";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<center><table width='80%'>";
echo "<tr><td width='20%'>Menu</td><td width='80%'>Send a Message</td></tr>";
echo "<tr><td align='left' valign='top' width='20%'>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Inbox</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?sent=true'>Sent Items</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?id='>Send an Item</a><br>";
echo "</td><td valign='top' width='80%'><form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
echo "<table><tr><td>Title:</td><td><input type='text' name='title' value='" . $_POST['title'] . "' /></td></tr>";
echo "<tr><td>To:</td><td><input type='text' name='to' value='" . $mto['user'] . "' /></td></tr>";
echo "<tr><td colspan='2'><textarea cols='40' rows='10' name='content'>" . $_POST['content'] . "</textarea></td></tr>";
echo "
<tr><td colspan='2'><input type='submit' name='pm' value='Send' /></td></tr>
</table>
</form>
</td></tr></table>
</center>";
echo $skin['postcontenttext'];
}
?>