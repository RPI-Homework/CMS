<?php
// Connects to your Database
include "global.php";
if (isset($_POST['loggin']))
{
include $loggin;
}
if (isset($_POST['send']))
{
include "functions/submit/send.php";
}
echo "<html><title>" . $gen['name'] . "</title><head>
" . $skin['header'] . "</head>
" . $skin['banner'];
include $loginbox;
include $menu;
echo $skin['content'];
if ($ipban == 1 OR $banned == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $gen['banhome'])or die("<br>Error Code 1015: Please contact the Root Administrator immediately.<br>" . mysql_error());
$home = mysql_fetch_array( $homecheck ); 
echo $skin['contentheader'];
echo $home['title'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo $home['content'];
echo $skin['postcontenttext'];
}

else if ($cookie == 1)
{
include "functions/submit/submit.php";
}
else if ($gen['guestarticles'] == 1)
{
include "functions/submit/submit.php";
}
else
{
echo $skin['contentheader'];
echo "Submit an Article";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Guests cannot submit articles.";
echo $skin['postcontenttext'];
}
include $skinfooter;
?>