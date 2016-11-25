<?php
if ($function == 1)
{
if ($cookie == 1)
{
if (!$_GET['id'] OR $_GET['id'] == $member['id'])
{
$myimages = 1;
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
$ihheck = mysql_query("SELECT * FROM `images` WHERE `member` = " . $_GET['id'] . " ORDER BY `date` DESC")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($ihheck);
if ($num == 0)
{
if ($myimages == 1)
{
echo "My Gallery<br>";
}
else
{
$imcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$im = mysql_fetch_array($imcheck);
echo $im['user'] . "'s Gallery<br>";
}
echo "<div align='right'>";
if ($myimages != 1)
{
echo "<a href='index.php?idx=8'>Your Gallery</a> - ";
}
echo "<a href='index.php?idx=82'>Other Galleries</a> - <a href='index.php?idx=81'>Upload Image</a></div><br>";
echo "There is no gallery to view.";
}
else
{
$pages2 = mysql_num_rows($ihheck) % 6;
if ($pages2 > 0)
{
$pages3 = mysql_num_rows($ihheck) - $pages2;
$pages = $pages3 / 6;
}
else
{
$pages3 = mysql_num_rows($ihheck) / 6;
$pages = $pages3 - 1;
}
if ($myimages == 1)
{
echo "My Gallery<br>";
}
else
{
$imcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$im = mysql_fetch_array($imcheck);
echo $im['user'] . "'s Gallery<br>";
}
echo "<div align='right'>";
if ($myimages != 1)
{
echo "<a href='index.php?idx=8'>Your Gallery</a> - ";
}
echo "<a href='index.php?idx=82'>Other Galleries</a> - <a href='index.php?idx=81'>Upload Image</a></div><br>";
$icheck = mysql_query("SELECT * FROM `images` WHERE `member` = " . $_GET['id'] . " ORDER BY `date` DESC LIMIT " . $num1 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<table width='100%'><tr>";
while ($images1 = mysql_fetch_array($icheck))
{
echo "<td width='33%'><center>" . $images1['title'] . "<br>
" . gmdate($sdate, $images1['date'] + $time) . "<br>
<a href='index.php?image=" . $images1['id'] . "'>";
if ($images1['thumbnail'] == '0')
{
list($width, $height) = getimagesize($images1['url']);
if ($width > $general['mawidth'] AND $height > $general['maheight'])
{
if ($width > $height)
{
$twidth = $general['thumbw'];
$theight = $height * ( $general['thumbh'] / $width );
}
if ($width < $height)
{
$twidth = $width * ( $general['thumbw'] / $height );
$theight = $general['thumbh'];
}
if ($width == $height)
{
$twidth = $general['thumbw'];
$theight = $general['thumbh'];
}
}
else
{
$twidth = $width;
$theight = $height;
}
echo "<img height='" . $theight . "' width='" . $twidth . "' border='0' src='" . $images1['url'] . "'>";
}
else
{
echo "<img border='0' src='" . $images1['thumbnail'] . "'>";
}
echo "</a></center>";
if ($myimages == 1)
{
echo "<br><center><table><tr><td>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='87' />
<input type='hidden' name='id' value='" . $images1['id'] . "' />
<input type='submit' name='Edit' value='Edit' />
</form>
</td><td>
<form action='index.php' method='POST'>
<input type='hidden' name='sum' value='88' />
<input type='hidden' name='id' value='" . $images1['id'] . "' />
<input type='submit' name='Delete' value='Delete' />
</form>
</td></tr></table></center>";
}
echo "</td>";
}
echo "</tr>";
$icheck = mysql_query("SELECT * FROM `images` WHERE `member` = " . $_GET['id'] . " ORDER BY `date` DESC LIMIT " . $num2 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<tr>";
while ($images2 = mysql_fetch_array($icheck))
{
echo "<td width='33%'><center>" . $images2['title'] . "<br>
" . gmdate($sdate, $images2['date'] + $time) . "<br>
<a href='index.php?image=" . $images2['id'] . "'>";
if ($images2['thumbnail'] == '0')
{
list($width, $height) = getimagesize($images2['url']);
if ($width > $general['mawidth'] OR $height > $general['maheight'])
{
if ($width > $height)
{
$twidth = $general['thumbw'];
$theight = $height * ( $general['thumbh'] / $width );
}
if ($width < $height)
{
$twidth = $width * ( $general['thumbw'] / $height );
$theight = $general['thumbh'];
}
if ($width == $height)
{
$twidth = $general['thumbw'];
$theight = $general['thumbh'];
}
}
else
{
$twidth = $width;
$theight = $height;
}
echo "<img height='" . $theight . "' width='" . $twidth . "' border='0' src='" . $images1['url'] . "'>";
}
else
{
echo "<img border='0' src='" . $images2['thumbnail'] . "'>";
}
echo "</a></center>";
if ($myimages == 1)
{
echo "<br><center><table><tr><td>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='87' />
<input type='hidden' name='id' value='" . $images2['id'] . "' />
<input type='submit' name='Edit' value='Edit' />
</form>
</td><td>
<form action='index.php' method='POST'>
<input type='hidden' name='sum' value='88' />
<input type='hidden' name='id' value='" . $images2['id'] . "' />
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
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=1'>1</a> ";
if ($pages >= 2) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=2'>2</a> "; }
if ($pages >= 3) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=3'>3</a> "; }
if ($pages >= 4) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=4'>4</a> "; }
if ($pages >= 5) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=5'>5</a> "; }
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=1'>Next Page</a>";
}
elseif ($page == $pages)
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page;
}
else
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page . " ";
$page5 = $page + 5;
$page4 = $page + 4;
$page3 = $page + 3;
$page2 = $page + 2;
$page1 = $page + 1;
echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page1 . "'>" . $page1 . "</a> ";
if ($pages >= $page2) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page2 . "'>" . $page2 . "</a> "; }
if ($pages >= $page3) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page3 . "'>" . $page3 . "</a> "; }
if ($pages >= $page4) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page4 . "'>" . $page4 . "</a> "; }
if ($pages >= $page5) { echo "<a href='index.php?idx=8&id=" . $_GET['id'] . "&page=" . $page5 . "'>" . $page5 . "/a> "; }
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