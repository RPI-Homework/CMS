<?php
if ($function == 1)
{
if ($cookie == 1 AND $member['canpm'] == 1)
{
echo "<font class='header-text'>";
echo "Personal Messenger";
echo "</font>";
echo "<center><table width='98%' class='main-text'>";
echo "<tr><td width='20%' class='main-text'>Menu</td><td width='80%' class='main-text'><table width='100%'><tr><td width='30%' class='main-text'>Title</td><td width='20%' class='main-text'>From</td><td width='35%' class='main-text'>Date</td><td align='left' width='15%' class='main-text'>Is Read</td></tr></table></td></tr>";
echo "<tr><td align='left' valign='top' width='20%' class='main-text'>";
echo "<a href='index.php?idx=5'><b>My Inbox</b></a><br>";
echo "<a href='index.php?idx=51'>My Outbox</a><br>";
echo "<a href='index.php?idx=52'>Create Message</a><br>";
echo "</td><td align='center' valign='top' width='80%' class='main-text'>";
$pmcheck = mysql_query("SELECT * FROM `pm` WHERE `to` = " . $member['id'])or die("<br>Error Code 1054: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($pmcheck);
if ($num == 0)
{
echo "No Personal Messages</td></tr></table></center>";
}
else
{
echo "<table width='100%'>";
while($pm = mysql_fetch_assoc($pmcheck))
{ 
echo "<tr><td width='30%' class='main-text' align='left'><a href='index.php?mail=" . $pm['id'] . "'>";
echo $pm['title'];
echo "</a></td><td width='20%' class='main-text'>";
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $pm['from'])or die("<br>Error Code 1055: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mfrom = mysql_fetch_assoc($mcheck);
echo "<a href='index.php?mid=" . $mfrom['id'] . "'>";
echo $mfrom['user'];
echo "</a></td><td width='35%' class='main-text'>";
echo gmdate($sdate, $pm['date'] + $time) . "</td><td width='15%' align='left' class='main-text'>";
if ($pm['read'] == 1)
{
echo "Yes";
}
else
{
echo "<b>No</b>";
}
echo "</td></tr>";
}
echo "</table></center></table>";
}
}
else
{
echo "You cannot send or receive personal messages.";
}
}
?>