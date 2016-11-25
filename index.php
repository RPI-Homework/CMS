<?php
// Connects to your Database
include "global.php";
if (isset($_POST['loggin']))
{
include $loggin;
}
echo "<html><title>" . $gen['name'] . "</title><head>
" . $skin['header'] . "</head>
" . $skin['banner'];
include $loginbox;
include $menu;
echo $skin['content'];
if ($ipban == 1 OR $banned == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['banhome'])or die("<br>Error Code 1002: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
echo $home['content'];
}
else if ($cookie == 1)
{
if ($member['gid'] == $ra)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['adminhome'])or die("<br>Error Code 1003: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
echo $home['content'];
}
else if ($mgroup['admin'] == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['adminhome'])or die("<br>Error Code 1004: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
echo $home['content'];
}
else if ($mgroup['isstaff'] == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['staffhome'])or die("<br>Error Code 1005: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
echo $home['content'];
}
else
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['memberhome'])or die("<br>Error Code 1006: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
echo $home['content'];
}
}
//-------------------------------
//if guest
//-------------------------------
else
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['guesthome'])or die("<br>Error Code 1007: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
echo $home['content'];
}
include $skinfooter;
?>