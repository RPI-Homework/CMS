<?php
if ($cookie == 1)
{
echo $skin['copyright'];
echo "&copy; 2007-2008 <a href='http://computingonlinehelp.com/'>GiveMeHelp.net</a>";
echo "</html>";
}
else
{
$skincheck = mysql_query("SELECT * FROM `adminskin` WHERE `id` = " . $general['adminskin'])or die("<br>Error Code 624: Please contact the Root Administrator immediately.<br>");
$skin = mysql_fetch_array( $skincheck );
echo $skin['copyright'];
echo "&copy; 2007-2008 <a href='http://computingonlinehelp.com/'>GiveMeHelp.net</a>";
echo $skin['footer'];
echo "</html>";
}
?>