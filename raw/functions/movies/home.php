<?php
if ($function == 1)
{
if ($cookie == 1)
{
if (!$_GET['id'] OR $_GET['id'] == $member['id'])
{
$mymovies = 1;
$_GET['id'] = $member['id'];
}
if (isset($_GET['page']))
{
$page = $_GET['page'];
$num1 = $page * 6;
$num2 = $num1 + 3;
}
else
{
$page = 0;
$num1 = 0;
$num2 = 3;
}
$mhheck = mysql_query("SELECT * FROM `movies` WHERE `member` = " . $_GET['id'] . " ORDER BY `date` DESC")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($mhheck);
if ($num == 0)
{
if ($mymovies == 1)
{
echo "My Gallery<br>";
}
else
{
$mmcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mm = mysql_fetch_array($mmcheck);
echo $mm['user'] . "'s Gallery<br>";
}
echo "<div align='right'>";
if ($mymovies != 1)
{
echo "<a href='index.php?idx=9'>Your Gallery</a> - ";
}
echo "<a href='index.php?idx=92'>Other Galleries</a> - <a href='index.php?idx=91'>Upload Movie</a></div><br>";
echo "There is no gallery to view.";
}
else
{
$pages2 = mysql_num_rows($mhheck) % 6;
if ($pages2 > 0)
{
$pages3 = mysql_num_rows($mhheck) - $pages2;
$pages = $pages3 / 6;
}
else
{
$pages3 = mysql_num_rows($mhheck) / 6;
$pages = $pages3 - 1;
}
if ($mymovies == 1)
{
echo "My Gallery<br>";
}
else
{
$mmcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mm = mysql_fetch_array($mmcheck);
echo $mm['user'] . "'s Gallery<br>";
}
echo "<div align='right'>";
if ($mymovies != 1)
{
echo "<a href='index.php?idx=9'>Your Gallery</a> - ";
}
echo "<a href='index.php?idx=92'>Other Galleries</a> - <a href='index.php?idx=91'>Upload Movie</a></div><br>";
$mcheck = mysql_query("SELECT * FROM `movies` WHERE `member` = " . $_GET['id'] . " ORDER BY `date` DESC LIMIT " . $num1 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<table width='100%'><tr>";
while ($movies1 = mysql_fetch_array($mcheck))
{
if (!$movies1['thumbnail'])
{
$movies1['thumbnail'] = "movies/nothumb.png";
}
echo "<td width='33%'><center>" . $movies1['title'] . "<br>
" . gmdate($sdate, $movies1['date'] + $time) . "<br>
<a href='index.php?movie=" . $movies1['id'] . "'><img height='100' width='100' border='0' src='" . $movies1['thumbnail'] . "'></a></center>";
if ($mymovies == 1)
{
echo "<br><center><table><tr><td>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='97' />
<input type='hidden' name='id' value='" . $movies1['id'] . "' />
<input type='submit' name='Edit' value='Edit' />
</form>
</td><td>
<form action='index.php' method='POST'>
<input type='hidden' name='sum' value='99' />
<input type='hidden' name='id' value='" . $movies1['id'] . "' />
<input type='submit' name='Delete' value='Delete' />
</form>
</td></tr></table></center>";
}
echo "</td>";
}
echo "</tr>";
$mcheck = mysql_query("SELECT * FROM `movies` WHERE `member` = " . $_GET['id'] . " ORDER BY `date` DESC LIMIT " . $num2 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<tr>";
while ($movies2 = mysql_fetch_array($mcheck))
{
if (!$movies2['thumbnail'])
{
$movies2['thumbnail'] = "movies/nothumb.png";
}
echo "<td width='33%'><center>" . $movies2['title'] . "<br>
" . gmdate($sdate, $movies2['date'] + $time) . "<br>
<a href='index.php?movie=" . $movies2['id'] . "'><img height='100' width='100' border='0' src=" . $movies2['thumbnail'] . "></a></center>";
if ($mymovies == 1)
{
echo "<br><center><table><tr><td>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='97' />
<input type='hidden' name='id' value='" . $movies2['id'] . "' />
<input type='submit' name='Edit' value='Edit' />
</form>
</td><td>
<form action='index.php' method='POST'>
<input type='hidden' name='sum' value='99' />
<input type='hidden' name='id' value='" . $movies2['id'] . "' />
<input type='submit' name='Delete' value='Delete' />
</form>
</td></tr></table></center>";
}
echo "</td>";
}
echo "</tr></table>";
if ($pages >= 1)
{
echo "<center>";
if ($page == 0)
{
echo "0 ";
echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=1'>1</a> ";
if ($pages >= 2) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=2'>2</a> "; }
if ($pages >= 3) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=3'>3</a> "; }
if ($pages >= 4) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=4'>4</a> "; }
if ($pages >= 5) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=5'>5</a> "; }
echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=1'>Next Page</a>";
}
elseif ($page == $pages)
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page;
}
else
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page . " ";
$page5 = $page + 5;
$page4 = $page + 4;
$page3 = $page + 3;
$page2 = $page + 2;
$page1 = $page + 1;
echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page1 . "'>" . $page1 . "</a> ";
if ($pages >= $page2) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page2 . "'>" . $page2 . "</a> "; }
if ($pages >= $page3) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page3 . "'>" . $page3 . "</a> "; }
if ($pages >= $page4) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page4 . "'>" . $page4 . "</a> "; }
if ($pages >= $page5) { echo "<a href='index.php?idx=9&id=" . $_GET['id'] . "&page=" . $page5 . "'>" . $page5 . "/a> "; }
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page1 . "'>Next Page</a>";
}
echo "</center>";
}
}
}
else
{
echo "Please log in to view your gallery.";
}
}
?>