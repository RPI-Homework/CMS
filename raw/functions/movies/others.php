<?php
if ($function == 1)
{
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
$ihheck = mysql_query("SELECT * FROM `users`")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$pages2 = mysql_num_rows($ihheck) % 6;
if ($pages2 > 0)
{
$pages3 = mysql_num_rows($ihheck) - $pages2;
$pages = $pages3 / 6;
}
else
{
$pages3 = mysql_num_rows($ihcheck) / 6;
$pages = $pages3 - 1;
}
echo "Galleries<br>";
echo "<div align='right'><a href='index.php?idx=9'>Your Gallery</a> - <a href='index.php?idx=91'>Upload Movie</a></div><br>";
echo "<table width='100%'><tr>";
$mcheck = mysql_query("SELECT * FROM `users` ORDER BY `rdate` ASC LIMIT " . $num1 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($member1 = mysql_fetch_array($mcheck))
{
if (!$member1['aheight']) { $member1['aheight'] = $general['maheight']; }
if (!$member1['awidth']) { $member1['awidth'] = $general['mawidth']; }
if (!$member1['avatar']) { $member1['avatar'] = "images/avatar/noavatar.png"; }
echo "<td width='33%'><center>" . $member1['user'] . "<br>
" . gmdate($sdate, $member1['rdate'] + $time) . "<br>";
$gallery = mysql_query("SELECT * FROM `movies` WHERE `member` = " . $member1['id'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo mysql_num_rows($gallery);
echo " Movies";
echo "<br><a href='index.php?idx=9&id=" . $member1['id'] . "'><img border='0' height='" . $member1['aheight'] . "' width='" . $member1['awidth'] . "' src='" . $member1['avatar'] . "'></a></center></td>";
}
echo "</tr>";
$mcheck = mysql_query("SELECT * FROM `users` ORDER BY `rdate` ASC LIMIT " . $num2 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<tr>";
while ($member2 = mysql_fetch_array($mcheck))
{
if (!$member2['aheight']) { $member2['aheight'] = $general['maheight']; }
if (!$member2['awidth']) { $member2['awidth'] = $general['mawidth']; }
if (!$member2['avatar']) { $member2['avatar'] = "images/avatar/noavatar.png"; }
echo "<td width='33%'><center>" . $member2['user'] . "<br>
" . gmdate($sdate, $member2['rdate'] + $time) . "<br>";
$gallery = mysql_query("SELECT * FROM `movies` WHERE `member` = " . $member2['id'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo mysql_num_rows($gallery);
echo " Movies";
echo "<br><a href='index.php?idx=9&id=" . $member2['id'] . "'><img border='0' height='" . $member2['aheight'] . "' width='" . $member2['awidth'] . "' src=" . $member2['avatar'] . "></a></center></td>";
}
echo "</tr></table>";
if ($pages >= 1)
{
echo "<center>";
if ($page == 0)
{
echo "0 ";
echo "<a href='index.php?idx=92&page=1'>1</a> ";
if ($pages >= 2) { echo "<a href='index.php?idx=92&page=2'>2</a> "; }
if ($pages >= 3) { echo "<a href='index.php?idx=92&page=3'>3</a> "; }
if ($pages >= 4) { echo "<a href='index.php?idx=92&page=4'>4</a> "; }
if ($pages >= 5) { echo "<a href='index.php?idx=92&page=5'>5</a> "; }
echo "<a href='index.php?idx=92&page=1'>Next Page</a>";
}
elseif ($page == $pages)
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=92&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=92&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=92&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=92&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=92&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=92&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page;
}
else
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=92&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=92&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=92&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=92&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=92&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=92&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page . " ";
$page5 = $page + 5;
$page4 = $page + 4;
$page3 = $page + 3;
$page2 = $page + 2;
$page1 = $page + 1;
echo "<a href='index.php?idx=92&page=" . $page1 . "'>" . $page1 . "</a> ";
if ($pages >= $page2) { echo "<a href='index.php?idx=92&page=" . $page2 . "'>" . $page2 . "</a> "; }
if ($pages >= $page3) { echo "<a href='index.php?idx=92&page=" . $page3 . "'>" . $page3 . "</a> "; }
if ($pages >= $page4) { echo "<a href='index.php?idx=92&page=" . $page4 . "'>" . $page4 . "</a> "; }
if ($pages >= $page5) { echo "<a href='index.php?idx=92&page=" . $page5 . "'>" . $page5 . "/a> "; }
echo "<a href='index.php?idx=92&page=1'>Next Page</a>";
}
echo "</center>";
}
}
?>