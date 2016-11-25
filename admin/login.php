<?php

//-------------------------------
//if the login form is submitted
//-------------------------------
$login = "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table>
<tr><td>
Username</td><td><input type='text' name='Username' maxlength='32'></td></tr>
<tr><td>
Password</td><td><input type='password' name='Password' maxlength='32'></td></tr>
<tr>
<td colspan='2'>
<center>
<input type='submit' name='submit' value='Login' />
</center>
</td>
</tr>
</table>
</form>";
if (isset($_POST['submit']))
{ 
if (!$_POST['Username'])
{
include $skinheader;
include $skincontent;
echo "<center>";
echo "<br>Error Code 1: Please enter a username.<br>";
echo $login;
echo "</center>";
include $skinfooter;
}
else
{
if (!$_POST['Password'])
{
include $skinheader;
include $skincontent;
echo "<center>";
echo "<br>Error Code 2: Please enter a password.<br>";
echo $login;
echo "</center>";
include $skinfooter;
}
else
{
//-------------------------------
// find username data
//-------------------------------
$check = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['Username'] . "'")or die("<br>Error Code 269: Please contact the Root Administrator immediately.<br>");
//-------------------------------
//bad username
//-------------------------------
$rows = mysql_num_rows($check);
if ($rows == 0)
{
include $skinheader;
include $skincontent;
echo "<center>";
echo "<br>Error Code 3: The username entered is incorrect.<br>";
echo $login;
echo "</center>";
include $skinfooter;
}
else
{
$member = mysql_fetch_array( $check );
$check2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $member['gid'])or die("<br>Error Code 270: Please contact the Root Administrator immediately.<br>");
$mgroup = mysql_fetch_array( $check2 );
$pass = md5($_POST['Password']);

//-------------------------------
//bad password
//-------------------------------
if ($pass != $member['password'])
{
include $skinheader;
include $skincontent;
echo "<center>";
echo "<br>Error Code 4: The password entered is incorrect.<br>";
echo $login;
echo "</center>";
include $skinfooter;
}
else if ($mgroup['admin'] != 1 AND $member['gid'] != $ra)
{
setcookie(admin_id    , $member['id']       , 0 , $adminindex);
setcookie(pass_hash   , $member['password'] , 0 , $adminindex);
echo "You are in a restricted area, <a href='" . $mdex . "'>click here</a> to leave.<br>";
}
else if ($mgroup['admin'] == 1 OR $member['gid'] == $ra)
{

//-------------------------------
// if login is ok add a cookie
//-------------------------------

setcookie(admin_id    , $member['id']       , 0 , "/");
setcookie(pass_hash   , $member['password'] , 0 , "/");


//-------------------------------
//then tell member name
//-------------------------------
header("Location: " . $_SERVER['PHP_SELF']);
}
else
{
echo "<br>Error Code 5: Unknown error.<br>";
}
}
}
}
}
else
{

//-------------------------------
// if they are not logged in
//-------------------------------
include $skinheader;
include $skincontent;
echo "<center>";
echo "Please log in.";
echo $login;
echo "</center>";
include $skinfooter;
}

?>