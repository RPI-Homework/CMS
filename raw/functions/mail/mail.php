<?php
if ($function == 1)
{
if ($cookie == 1 AND $member['canpm'] == 1)
{
if (!$_GET['mail'])
{
echo "<font class='main-text'>No personal message selected.</font><br>
<a href='index.php?idx=5'>Back </a>";
}
else
{
$pmcheck = mysql_query("SELECT * FROM `pm` WHERE `id` = " . $_GET['mail'])or die("<br>Error Code 1056: Please contact the Root Administrator immediately.<br>" . mysql_error());
$pm = mysql_fetch_assoc($pmcheck);
if ($pm['to'] == $member['id'])
{
$pmup = mysql_query("UPDATE `" . $database . "`.`pm` SET `read` = '1' WHERE `pm`.`id` = " . $pm['id'] . " LIMIT 1")or die("<br>Error Code 1057: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<font class='header-text'>";
echo "My Inbox";
echo "</font>";
echo "<center><table width='98%'>";
echo "<tr><td width='20%' class='main-text'>Menu</td><td width='80%' class='main-text'>Subject: " . $pm['title'] . "</td></tr>";
echo "<tr><td align='left' valign='top' width='20%' class='main-text'>";
echo "<a href='index.php?idx=5'>My Inbox</a><br>";
echo "<a href='index.php?idx=51'>My Outbox</a><br>";
echo "<a href='index.php?idx=52'>Create Message</a><br>";
echo "</td><td valign='top' width='80%' class='main-text'>";
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $pm['from'])or die("<br>Error Code 1058: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mfrom = mysql_fetch_assoc($mcheck);
echo "Date: ";
echo gmdate($ldate, $pm['date'] + $time);
echo "<br>";
echo "From: <a href='index.php?mid=" . $mfrom['id'] . "'>";
echo $mfrom['user'];
echo "</a><br><br>";
echo "<font class='main-text'>";
echo $pm['content'];
echo "</font>";
echo "</td></tr></table>
<div align='right'><table><tr><td>
<form action='index.php?idx=52' method='post'>
<input type='hidden' name='title' value='Re: " . $pm['title'] . "' />
<input type='hidden' name='id' value='" . $mfrom['id'] . "' />
<input type='submit' name='send' value='Reply' />
</form></td><td>
<form action='index.php?idx=52' method='post'>
<input type='hidden' name='title' value='Fw: " . $pm['title'] . "' />
<input type='hidden' name='content' value='" . $pm['content'] . "' />
<input type='submit' name='send' value='Foward' />
</form></td></tr></table>
</div>
</center>";
}
else if ($pm['from'] == $member['id'])
{
echo "<font class='header-text'>";
echo "My Outbox";
echo "</font>";
echo "<center><table width='89%'>";
echo "<tr><td width='20%' class='main-text'>Menu</td><td width='80%' class='main-text'>Subject: " . $pm['title'] . "</td></tr>";
echo "<tr><td align='left' valign='top' width='20%' class='main-text'>";
echo "<a href='index.php?idx=5'>My Inbox</a><br>";
echo "<a href='index.php?idx=51'>My Outbox</a><br>";
echo "<a href='index.php?idx=52'>Create Message</a><br>";
echo "</td><td valign='top' width='80%' class='main-text'>";
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $pm['to'])or die("<br>Error Code 1059: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mto = mysql_fetch_assoc($mcheck);
echo "Date: ";
echo gmdate($ldate, $pm['date'] + $time);
echo "<br>";
echo "To: <a href='index.php?mid=" . $mto['id'] . "'>";
echo $mto['user'];
echo "</a><br><br>";
echo "<font class='main-text'>";
echo $pm['content'];
echo "</font>";
echo "</td></tr></table>
<div align='right'><table><tr><td>
<form action='index.php?idx=52' method='post'>
<input type='hidden' name='title' value='Addition: " . $pm['title'] . "' />
<input type='hidden' name='id' value='" . $mto['id'] . "' />
<input type='submit' name='send' value='Reply' />
</form></td><td>
<form action='index.php?idx=52' method='post'>
<input type='hidden' name='title' value='Fw: " . $pm['title'] . "' />
<input type='hidden' name='content' value='" . $pm['content'] . "' />
<input type='submit' name='send' value='Foward' />
</form></td></tr></table>
</div>
</center>";
}
else
{
echo "<font class='main-text'>You cannot view that personal message.</font><br>
<a href='index.php?idx=5'>Back </a>";
}
}
}
else
{

echo "<font class='main-text'>You cannot send or receive personal messages.</font>";
}
}
?>