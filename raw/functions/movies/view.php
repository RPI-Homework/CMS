<?php
if ($function == 1)
{
$mcheck = mysql_query("SELECT * FROM `movies` WHERE `id` = " . $_GET['movie'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$movies = mysql_fetch_array($mcheck);
$mmcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $movies['member'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mm = mysql_fetch_array($mmcheck);
echo $movies['title'];
echo "<div align='right'><a href='index.php?idx=9'>Your Gallery</a> - <a href='index.php?idx=92'>Other Galleries</a> - <a href='index.php?idx=91'>Upload Movie</a></div><br>";
echo "<center><b>";
echo $movies['title'];
echo "</b><i> Posted by: ";
echo $mm['user'];
echo "</i><br><Small>Join Date:";
echo gmdate($ldate, $mm['rdate'] + $time);
echo "<br>Posted Date:";
echo gmdate($ldate, $movies['date'] + $time);
echo "</small><br>";
echo "<embed width='350' src='" . $movies['url'] . "'>";
echo "<br><a href='" . $movies['url'] . "'>Larger View</a>";
echo "<br><a href='index.php?idx=9&id=" . $movies['member'] . "'>More Movies</a>";
echo $movies['uploadnotes'];
echo "</center>";
}
?>