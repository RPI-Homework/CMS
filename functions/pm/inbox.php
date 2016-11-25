<?php
if ($function == 1)
{
echo $skin['contentheader'];
echo "Inbox";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<center><table width='80%'>";
echo "<tr><td width='20%'>Menu</td><td width='80%'><table width='100%'><tr><td width='40%'>Title</td><td width='40%'>From</td><td align='right' width='20%'>Is Read</td></tr></table></td></tr>";
echo "<tr><td align='left' valign='top' width='20%'>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Inbox</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?sent=true'>Sent Items</a><br>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?id='>Send an Item</a><br>";
echo "</td><td align='center' valign='top' width='80%'>";
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
echo "<tr><td width='40%'><a href='" . $_SERVER['PHP_SELF'] . "?pid=" . $pm['id'] . "'>";
echo $pm['title'];
echo "</a></td><td width='40%'>";
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $pm['from'])or die("<br>Error Code 1055: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mfrom = mysql_fetch_assoc($mcheck);
echo "<a href='members.php?id=" . $mfrom['id'] . "'>";
echo $mfrom['user'];
echo "</a></td><td width='20%' align='right'>";
if ($pm['read'] == 1)
{
echo "Yes";
}
else
{
echo "No";
}
echo "</td></tr>";
}
echo "</table></center></table>";
echo $skin['postcontenttext'];
}
}
?>