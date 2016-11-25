<?php
if ($cookie == 1)
{
echo $skin['content'];
}
else
{
$skincheck = mysql_query("SELECT * FROM `adminskin` WHERE `id` = " . $general['adminskin'])or die("<br>Error Code 621: Please contact the Root Administrator immediately.<br>");
$skin = mysql_fetch_array( $skincheck );
echo $skin['content'];
}
?>