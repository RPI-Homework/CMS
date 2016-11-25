<?php
if ($function == 1)
{
//-----------------
//by username
//-----------------
if (isset($_GET['listall']))
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
<td><center>Banned</center></td>
<td><center>Staff</center></td>
<td><center>Administrator</center></td>
<td><center>View</center></td>
</tr>";
$check = mysql_query("SELECT * FROM `users` WHERE `user` LIKE '%'")or die("<br>Error Code 1042: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($medit = mysql_fetch_array( $check ))
{
//-------------------------------
//list
//-------------------------------
$check2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 1043: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check2 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
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
if ($gedit['isstaff'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1 OR $medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $medit['id'] . "'>View</a></td>";
}
}
echo "</table>";
echo $skin['postcontenttext'];
}
else if (isset($_GET['user']))
{

if (!$_GET['user'])
{
echo "<br>No username entered.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `user` LIKE '%" . $_GET['user'] . "%' ORDER BY `user`")or die("<br>Error Code 1044: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No usernames contain " . $_GET['user'] . ".<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Usernames that contain " . $_GET['user'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>Banned</center></td>
<td><center>Staff</center></td>
<td><center>Administrator</center></td>
<td><center>View</center></td>
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 1045: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check4 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
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
if ($gedit['isstaff'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1 OR $medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $medit['id'] . "'>View</a></td>";
}
}
echo "</table>";
}
}
echo $skin['postcontenttext'];

}
//-----------------
//by email 0
//-----------------
else if (isset($_GET['mail']))
{

if (!$_GET['mail'])
{
echo "<br>No email address entered.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `email` LIKE '%" . $_GET['mail'] . "%' ORDER BY `user`")or die("<br>Error Code 1046: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No emails contain " . $_GET['mail'] . ".<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Emails that contain " . $_GET['mail'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>Banned</center></td>
<td><center>Staff</center></td>
<td><center>Administrator</center></td>
<td><center>View</center></td>
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 1047: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
if ($gedit['isstaff'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1 OR $medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $medit['id'] . "'>View</a></td>";
}
}
echo "</table>";
echo $skin['postcontenttext'];
}
}

}
//-----------------
//by ip 0
//-----------------
//-----------------
//by group 0
//-----------------
else if (isset($_GET['group']))
{

$check5 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_GET['group'])or die("<br>Error Code 1048: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check5);
if ($count == 0)
{
echo "<br>Invalid group ID.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
while ($extra = mysql_fetch_array( $check5 ))
{
$check3 = mysql_query("SELECT * FROM `users` WHERE `gid` = " . $_GET['group'] . " ORDER BY `user`")or die("<br>Error Code 1049: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No users are in the group " . $extra['name'] . ".<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "User in group " . $extra['name'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Group</center></td>
<td><center>Email</center></td>
<td><center>Banned</center></td>
<td><center>Staff</center></td>
<td><center>Administrator</center></td>
<td><center>View</center></td>
</tr>";
while ($medit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $medit['gid'])or die("<br>Error Code 1050: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($gedit = mysql_fetch_array( $check4 ))
{
  echo "<tr>
<td><center>" . $medit['user'] . "</center></td>
<td><center>" . $gedit['name'] . "</center></td>
<td><center>" . $medit['email'] . "</center></td>
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
if ($gedit['isstaff'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($gedit['admin'] == 1 OR $medit['gid'] == $ra)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $medit['id'] . "'>View</a></td>";
}
}
echo "</table>";
echo $skin['postcontenttext'];
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
echo "Members";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Search by Username.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<input type='text' name='user'>
<input type='submit' name='name' value='Search' /></form>
Search by email.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<input type='text' name='mail'>
<input type='submit' name='email' value='Search' /></form>
Search by group.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<select name='group' onChange = 'this.form.submit()'>";
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 510: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<option value='2' selected='selected' disabled='disabled'>Select a Group</option>";
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?listall=true'>List all Users.</a>";
echo $skin['postcontenttext'];

}
}
?>