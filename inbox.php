<?php
// Connects to your Database
include "global.php";
if (isset($_POST['loggin']))
{
include $loggin;
}
if (isset($_POST['pm']))
{
include "functions/pm/submit.php";
}
echo "<html><title>" . $gen['name'] . "</title><head>
" . $skin['header'] . "</head>
" . $skin['banner'];
include $loginbox;
include $menu;
echo $skin['content'];
if ($ipban == 1 OR $banned == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['banhome'])or die("<br>Error Code 1001: Please contact the Root Administrator immediately.<br>" . mysql_error());
$home = mysql_fetch_array( $homecheck ); 
echo $skin['contentheader'];
echo $home['title'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo $home['content'];
echo $skin['postcontenttext'];
}
else if ($cookie == 1 AND $member['canpm'] == 1)
{
if (isset($_GET['id']))
{
include "functions/pm/send.php";
}
else if (isset($_POST['send']))
{
include "functions/pm/send.php";
}
else if (isset($_GET['pid']))
{
include "functions/pm/pid.php";
}
else if (isset($_GET['sent']))
{
include "functions/pm/sent.php";
}
else
{
include "functions/pm/inbox.php";
}
}
else
{
echo "You cannot send or receive personal messages.";
}
include $skinfooter;
?>