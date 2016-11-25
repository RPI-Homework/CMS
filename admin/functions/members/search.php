<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
//-------------
//By name
//-------------
if (isset($_GET['user']))
{
if (!$_GET['user'])
{
echo "<br>Error Code 122: No username entered.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `user` LIKE '%" . $_GET['user'] . "%' ORDER BY `user`")or die("<br>Error Code 501: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 123: No usernames contain " . $_GET['user'] . ".<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
echo $skins['contentheader'];
echo "Usernames that contain " . $_GET['user'] . ".";
echo $skins['postcontentheader'];
echo $skins['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>IP Address</center></td>
<td><center>Banned</center></td>
<td><center>Is Admin</center></td>
<td><center>Root Admin</center></td>
<td><center>Edit</center></td>
<td><center>Delete</center></td>
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 502: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check4 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
<td><center>" . $medit['ip']    . "</center></td>
<td><center>";
if ($medit['ban'] == 1 OR $gedit['ban'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='index.php?idx=82&id=" . $medit['id'] . "'>Edit</a></td>";
echo "<td><a href='index.php?idx=83&id=" . $medit['id'] . "'>Delete</a></td>";
}
}
echo "</table>";
}
}
echo $skins['postcontenttext'];
}
//-----------------
//by email 0
//-----------------
else if (isset($_GET['mail']))
{
if (!$_GET['mail'])
{
echo "<br>Error Code 124: No email address entered.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `email` LIKE '%" . $_GET['mail'] . "%' ORDER BY `user`")or die("<br>Error Code 503: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 125: No emails contain " . $_GET['mail'] . ".<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
echo $skins['contentheader'];
echo "Emails that contain " . $_GET['mail'] . ".";
echo $skins['postcontentheader'];
echo $skins['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>IP Address</center></td>
<td><center>Banned</center></td>
<td><center>Is Admin</center></td>
<td><center>Root Admin</center></td>
<td><center>Edit</center></td>
<td><center>Delete</center></td>
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 504: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check4 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
<td><center>" . $medit['ip']    . "</center></td>
<td><center>";
if ($medit['ban'] == 1 OR $gedit['ban'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='index.php?idx=82&id=" . $medit['id'] . "'>Edit</a></td>";
echo "<td><a href='index.php?idx=83&id=" . $medit['id'] . "'>Delete</a></td>";
}
}
echo "</table>";
echo $skins['postcontenttext'];
}
}
}
//-----------------
//by ip 0
//-----------------
else if (isset($_GET['ips']))
{
if (!$_GET['ip1'])
{
$_GET['ip1'] = "%";
}
if (!$_GET['ip2'])
{
$_GET['ip2'] = "%";
}
if (!$_GET['ip3'])
{
$_GET['ip3'] = "%";
}
if (!$_GET['ip4'])
{
$_GET['ip4'] = "%";
}
$check3 = mysql_query("SELECT * FROM `users` WHERE `ip` LIKE '" . $_GET['ip1'] . "." . $_GET['ip2'] . "." . $_GET['ip3'] . "." . $_GET['ip4'] . "' ORDER BY `user`")or die("<br>Error Code 505: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 106: No IPs are " . $_GET['ip1'] . "." . $_GET['ip2'] . "." . $_GET['ip3'] . "." . $_GET['ip4'] . ".<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
echo $skins['contentheader'];
echo "IPs that contain " . $_GET['ip1'] . "." . $_GET['ip2'] . "." . $_GET['ip3'] . "." . $_GET['ip4'] . ".";
echo $skins['postcontentheader'];
echo $skins['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>IP Address</center></td>
<td><center>Banned</center></td>
<td><center>Is Admin</center></td>
<td><center>Root Admin</center></td>
<td><center>Edit</center></td>
<td><center>Delete</center></td>
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 506: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check4 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
<td><center>" . $medit['ip']    . "</center></td>
<td><center>";
if ($medit['ban'] == 1 OR $gedit['ban'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='index.php?idx=82&id=" . $medit['id'] . "'>Edit</a></td>";
echo "<td><a href='index.php?idx=83&id=" . $medit['id'] . "'>Delete</a></td>";
}
}
echo "</table>";
echo $skins['postcontenttext'];
}
}
//-----------------
//by group 0
//-----------------
else if (isset($_GET['group']))
{
$check5 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_GET['group'])or die("<br>Error Code 507: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check5);
if ($count == 0)
{
echo "<br>Error Code 107: Invalid group ID.<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
while ($extra = mysql_fetch_array( $check5 ))
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `gid` = " . $_GET['group'] . " ORDER BY `user`")or die("<br>Error Code 508: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 108: No users are in the group " . $extra['name'] . ".<br>
<a href='index.php?idx=8'>Back</a>";
}
else
{
echo $skins['contentheader'];
echo "User in group " . $extra['name'] . ".";
echo $skins['postcontentheader'];
echo $skins['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>IP Address</center></td>
<td><center>Banned</center></td>
<td><center>Is Admin</center></td>
<td><center>Root Admin</center></td>
<td><center>Edit</center></td>
<td><center>Delete</center></td>
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 509: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check4 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
<td><center>" . $medit['ip']    . "</center></td>
<td><center>";
if ($medit['ban'] == 1 OR $gedit['ban'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='index.php?idx=82&id=" . $medit['id'] . "'>Edit</a></td>";
echo "<td><a href='index.php?idx=83&id=" . $medit['id'] . "'>Delete</a></td>";
}
}
echo "</table>";
echo $skins['postcontenttext'];
}
}
}
}
//-----------------
//search bars 0
//-----------------
else
{
echo $skin['contentheader'];
echo "Listing All Members";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>Ip Address</center></td>
<td><center>Banned</center></td>
<td><center>Is Admin</center></td>
<td><center>Root Admin</center></td>
<td><center>Edit</center></td>
<td><center>Delete</center></td>
</tr>";
$check = mysql_query("SELECT * FROM `users` WHERE `user` LIKE '%'")or die("<br>Error Code 512: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($medit = mysql_fetch_array( $check ))
{
//-------------------------------
//list
//-------------------------------
$check2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 513: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check2 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
<td><center>" . $medit['ip']    . "</center></td>
<td><center>";
if ($medit['ban'] == 1 OR $gedit['ban'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='index.php?idx=82&id=" . $medit['id'] . "'>Edit</a></td>";
echo "<td><a href='index.php?idx=83&id=" . $medit['id'] . "'>Delete</a></td>";
}
}
echo "</table>";
echo $skin['postcontenttext'];
}
}
}
?>