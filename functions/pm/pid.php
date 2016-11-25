<?php
if ($function == 1)
{
if (!$_GET['pid'])
{
echo "No personal message selected.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back </a>";
}
else
{
$pmcheck = mysql_query("SELECT * FROM `pm` WHERE `id` = " . $_GET['pid'])or die("<br>Error Code 1056: Please contact the Root Administrator immediately.<br>" . mysql_error());
$pm = mysql_fetch_assoc($pmcheck);
if ($pm['to'] == $member['id'])
{
$pmup = mysql_query("UPDATE `" . $database . "`.`pm` SET `read` = '1' WHERE `pm`.`id` = " . $pm['id'] . " LIMIT 1")or die("<br>Error Code 1057: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo $skin['contentheader'];
echo $pm['title'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<center><table width='80%'>";
echo "<tr><td width='20%'>Menu</td><td width='80%'>" . $pm['title'] . "</td></tr>";
echo "<tr><td align='left' valign='top' width='20%'>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Inbox</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?sent=true'>Sent Items</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?id='>Send an Item</a><br>";
echo "</td><td valign='top' width='80%'>";
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $pm['from'])or die("<br>Error Code 1058: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mfrom = mysql_fetch_assoc($mcheck);
echo "From: <a href='members.php?id=" . $mfrom['id'] . "'>";
echo $mfrom['user'];
echo "</a><br>";
echo $pm['content'];
echo "</td></tr></table>
<div align='right'><table><tr><td>
<form action='" . $_SERVER['PHP_SELF'] . "'
method='post'>
<input type='hidden' name='title' value='Re: " . $pm['title'] . "' />
<input type='hidden' name='id' value='" . $mfrom['id'] . "' />
<input type='submit' name='send' value='Reply' />
</form></td><td>
<form action='" . $_SERVER['PHP_SELF'] . "'
method='post'>
<input type='hidden' name='title' value='Fw: " . $pm['title'] . "' />
<input type='hidden' name='content' value='" . $pm['content'] . "' />
<input type='submit' name='send' value='Foward' />
</form></td></tr></table>
</div>
</center>";
echo $skin['postcontenttext'];
}
else if ($pm['from'] == $member['id'])
{
echo $skin['contentheader'];
echo $pm['title'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<center><table width='80%'>";
echo "<tr><td width='20%'>Menu</td><td width='80%'>" . $pm['title'] . "</td></tr>";
echo "<tr><td align='left' valign='top' width='20%'>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Inbox</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?sent=true'>Sent Items</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?id='>Send an Item</a><br>";
echo "</td><td valign='top' width='80%'>";
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $pm['to'])or die("<br>Error Code 1059: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mto = mysql_fetch_assoc($mcheck);
echo "To: <a href='members.php?id=" . $mto['id'] . "'>";
echo $mto['user'];
echo "</a><br>";
echo $pm['content'];
echo "</td></tr></table>
<div align='right'><table><tr><td>
<form action='" . $_SERVER['PHP_SELF'] . "'
method='post'>
<input type='hidden' name='title' value='Addition: " . $pm['title'] . "' />
<input type='hidden' name='id' value='" . $mto['id'] . "' />
<input type='submit' name='send' value='Reply' />
</form></td><td>
<form action='" . $_SERVER['PHP_SELF'] . "'
method='post'>
<input type='hidden' name='title' value='Fw: " . $pm['title'] . "' />
<input type='hidden' name='content' value='" . $pm['content'] . "' />
<input type='submit' name='send' value='Foward' />
</form></td></tr></table>
</div>
</center>";
echo $skin['postcontenttext'];
}
else
{
echo "You cannot view that personal message.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back </a>";
}
}
}
?>