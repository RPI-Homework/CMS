<?php
if ($cookie == 1)
{
if ($mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['add'])
{
echo "<br>Error Code 25: No username entered.<br>
<a href='index.php?idx=3'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `user` LIKE '%" . $_GET['add'] . "%' ORDER BY `user`")or die("<br>Error Code 289: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 26: No usernames contains " . $_GET['add'] . ".<br>
<a href='index.php?idx=3'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Usernames that contain " . $_GET['add'] . ".<br>";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
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
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 290: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='index.php?idx=32&id=" . $medit['id'] . "'>Edit</a></td>";
}
}
echo "</table>";
echo $skin['postcontenttext'];
}
}
}
}
?>