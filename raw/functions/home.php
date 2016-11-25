<?php
if ($cookie == 1)
{
if ($member['gid'] == $ra)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $general['adminhome'])or die("<br>Error Code 1003: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
}
else if ($mgroup['admin'] == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $general['adminhome'])or die("<br>Error Code 1004: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
}
else if ($mgroup['isstaff'] == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $general['staffhome'])or die("<br>Error Code 1005: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
}
else
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $general['memberhome'])or die("<br>Error Code 1006: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
}
}
//-------------------------------
//if guest
//-------------------------------
else
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $general['guesthome'])or die("<br>Error Code 1007: Please contact the Root Administrator immediately.<br>");
$home = mysql_fetch_array( $homecheck ); 
}
echo $home['content'];
?>