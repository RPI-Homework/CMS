<?php
$time = gmmktime();
//extended format
$date = gmdate("l, j F Y g:i:s A T", $time + 3600 * $member['time']);
echo $date;
echo "<br>";
$date = gmdate("l, j F Y H:i:s T", $time + 3600 * $member['time']);
echo $date;
echo "<br>";
//date time month first
$date = gmdate("n/j/y g:i:s A", $time + 3600 * $member['time']);
echo $date;
echo "<br>";
//date time month second
$date = gmdate("j/n/y g:i:s A", $time + 3600 * $member['time']);
echo $date;
echo "<br>";
//date time month second 24 hour clock
$date = gmdate("j/n/y H:i:s", $time + 3600 * $member['time']);
echo $date;
echo "<br>";
//date time month first 24 hour clock
$date = gmdate("n/j/y H:i:s", $time + 3600 * $member['time']);
echo $date;
echo "<br>";
?>