<?php
if ($function == 1)
{
if (!$_POST['username'])
{}
else
{
if (!$_POST['password'])
{}
else
{
$check = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['username'] . "'")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
//-------------------------------
//bad username
//-------------------------------
$num = mysql_num_rows($check);
if ($num != 0)
{
$loggin = mysql_fetch_array( $check );
$pass = md5($_POST['password']);

//-------------------------------
//bad password
//-------------------------------
if ($pass == $loggin['password'])
{

//-------------------------------
// if login is ok add a cookie
//-------------------------------

$hour = time() + 604800;
setcookie(member_id   , $loggin['id']       , $hour);
setcookie(pass_hash   , $loggin['password'] , $hour);


//-------------------------------
//then tell member name
//-------------------------------
header("Location: " . $_SERVER['PHP_SELF']);
}
}
}
}
}
?>