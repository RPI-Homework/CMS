<?php
if ($function == 1)
{
$icheck = mysql_query("SELECT * FROM `images` WHERE `id` = " . $_GET['image'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$images = mysql_fetch_array($icheck);
$imcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $images['member'])or die("<br>Error Code 603: Please contact the Root Administrator immediately.<br>" . mysql_error());
$im = mysql_fetch_array($imcheck);
echo $images['title'];
echo "<div align='right'><a href='index.php?idx=8'>Your Gallery</a> - <a href='index.php?idx=82'>Other Galleries</a> - <a href='index.php?idx=81'>Upload Image</a></div><br>";
echo "<center><b>";
echo $images['title'];
echo "</b><i> Posted by: ";
echo $im['user'];
echo "</i><br><Small>Join Date:";
echo gmdate($ldate, $im['rdate'] + $time);
echo "<br>Posted Date:";
echo gmdate($ldate, $images['date'] + $time);
echo "</small><br>";
echo "<a href='" . $images['url'] . "'><img width='350' border='0' src='" . $images['url'] . "'></a>";
echo "<br><a href='index.php?idx=8&id=" . $images['member'] . "'>More Images</a><br>";
echo $images['uploadnotes'];
echo "</center>";
}
?>