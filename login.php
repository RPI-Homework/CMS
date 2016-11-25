<?php
// Connects to your Database
include "global.php";

$login = "<html><title>" . $gen['name'] . "</title><head>
" . $skin['header'] . "</head>
" . $skin['banner'] . "
" . $skin['content'] . "
" . $skin['contentheader'] . "
Log In
" . $skin['postcontentheader'] . "
" . $skin['contenttext'] . "
<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<center><table>
<tr>
<td>Username</td><td>
<input type='text' name='username' maxlength='33'></td></tr>
<tr>
<td>Password</td><td>
<input type='password' name='password' maxlength='33'></td></tr>
<tr>
<td colspan='2' align='center'><input type='submit' name='submit' value='Login' /><input type='reset' name='reset' value='Reset' /></td></tr></table></center>
</form>
" . $skin['postcontenttext'];
//Checks if there is a login cookie
if(isset($_COOKIE['member_id']))

//-------------------------------
//does cookie exsists
//-------------------------------
{
$check = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_COOKIE['member_id'])or die(mysql_error());

$num = mysql_num_rows($check);
if ($num != 0)
{
while($member = mysql_fetch_array( $check ))
{
$check2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $member['gid'])or die("<br>Error Code 1008: Please contact the Root Administrator immediately.<br>" . mysql_error());

while($mgroup = mysql_fetch_array( $check2 ))
{
//-------------------------------
//check cookie password
//-------------------------------
if ($_COOKIE['pass_hash'] != $member['password'])
{
echo $login;
include $skinfooter;
}
else
{
//-------------------------------
//to admin area
//-------------------------------
header("Location: index.php");
}
}
}
}
}
else
{
//if the login form is submitted
if (isset($_POST['submit'])) { 

//-------------------------------
// find username data
//-------------------------------
$check = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['username'] . "'")or die("<br>Error Code 1009: Please contact the Root Administrator immediately.<br>" . mysql_error());
//-------------------------------
//bad username
//-------------------------------
$check2 = mysql_num_rows($check);
if ($check2 == 0) {
echo $login;
include $skinfooter;
}

else {
while($member = mysql_fetch_array( $check ))
{
$check2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $member['gid'])or die("<br>Error Code 1010: Please contact the Root Administrator immediately.<br>" . mysql_error());

while($mgroup = mysql_fetch_array( $check2 ))
{
$pass = md5($_POST['password']);

//-------------------------------
//bad password
//-------------------------------
if ($pass != $member['password']) {
echo $login;
include $skinfooter;
}
else
{

//-------------------------------
// if login is ok add a cookie
//-------------------------------

$hour = time() + 604800;
setcookie(member_id   , $member['id']      , $hour);
setcookie(pass_hash   , $member['password'] , $hour);


//-------------------------------
//then tell member name
//-------------------------------
header("Location: index.php");
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
echo $login;
include $skinfooter;
}
}

?>