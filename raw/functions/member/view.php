<?php
if ($function == 1)
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
if ($_GET['type'] == "user")
{
$search = "user";
$input = "%" . $_GET['value'] . "%";
}
elseif ($_GET['type'] == "email")
{
$search = "email";
$input = "%" . $_GET['value'] . "%";
}
elseif ($_GET['type'] == "group")
{
$search = "gid";
$input = $_GET['group'];
}
else
{
$search = "user";
$input = "%";
}
$ihheck = mysql_query("SELECT * FROM `users` WHERE `" . $search . "` LIKE '" . $input . "'")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "Members<br>";
echo "<div align='right'><a href='index.php?idx=61'>View Your Profile</a> - <a href='index.php?idx=4'>Edit Your Profile</a></div><br>";
echo "<table width='100%'><tr>";
$mmcheck = mysql_query("SELECT * FROM `users` WHERE `" . $search . "` LIKE '" . $input . "' ORDER BY `rdate` ASC LIMIT " . $num1 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($member1 = mysql_fetch_array($mmcheck))
{
if (!$member1['aheight']) { $member1['aheight'] = $general['maheight']; }
if (!$member1['awidth']) { $member1['awidth'] = $general['mawidth']; }
if (!$member1['avatar']) { $member1['avatar'] = "images/avatar/noavatar.png"; }
echo "<td width='33%'><center>" . $member1['user'] . "<br>
" . gmdate($sdate, $member1['rdate'] + $time) . "<br>";
$gallery = mysql_query("SELECT * FROM `group` WHERE `id` = " . $member1['gid'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mmgroup = mysql_fetch_array($gallery);
echo $mmgroup['name'];
echo "<br><a href='index.php?idx=61&id=" . $member1['id'] . "'><img border='0' height='" . $member1['aheight'] . "' width='" . $member1['awidth'] . "' src='" . $member1['avatar'] . "'></a></center></td>";
}
echo "</tr>";
$mmcheck = mysql_query("SELECT * FROM `users` WHERE `" . $search . "` LIKE '" . $input . "' ORDER BY `rdate` ASC LIMIT " . $num2 . " , 3")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<tr>";
while ($member2 = mysql_fetch_array($mmcheck))
{
if (!$member2['aheight']) { $member2['aheight'] = $general['maheight']; }
if (!$member2['awidth']) { $member2['awidth'] = $general['mawidth']; }
if (!$member2['avatar']) { $member2['avatar'] = "images/avatar/noavatar.png"; }
echo "<td width='33%'><center>" . $member2['user'] . "<br>
" . gmdate($sdate, $member2['rdate'] + $time) . "<br>";
$gallery = mysql_query("SELECT * FROM `group` WHERE `id` = " . $member2['gid'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mmgroup = mysql_fetch_array($gallery);
echo $mmgroup['name'];
echo "<br><a href='index.php?idx=61&id=" . $member2['id'] . "'><img border='0' height='" . $member2['aheight'] . "' width='" . $member2['awidth'] . "' src=" . $member2['avatar'] . "></a></center></td>";
}
echo "</tr></table>";
if ($pages >= 1)
{
echo "<center>";
if ($page == 0)
{
echo "0 ";
echo "<a href='index.php?idx=6&page=1'>1</a> ";
if ($pages >= 2) { echo "<a href='index.php?idx=6&page=2'>2</a> "; }
if ($pages >= 3) { echo "<a href='index.php?idx=6&page=3'>3</a> "; }
if ($pages >= 4) { echo "<a href='index.php?idx=6&page=4'>4</a> "; }
if ($pages >= 5) { echo "<a href='index.php?idx=6&page=5'>5</a> "; }
echo "<a href='index.php?idx=6&page=1'>Next Page</a>";
}
elseif ($page == $pages)
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=6&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=6&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=6&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=6&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=6&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=6&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page;
}
else
{
$page5 = $page - 5;
$page4 = $page - 4;
$page3 = $page - 3;
$page2 = $page - 2;
$page1 = $page - 1;
echo "<a href='index.php?idx=6&page=" . $page1 . "'>Last Page</a> ";
if (0 <= $page5) { echo "<a href='index.php?idx=6&page=" . $page5 . "'>" . $page5 . "</a> "; }
if (0 <= $page4) { echo "<a href='index.php?idx=6&page=" . $page4 . "'>" . $page4 . "</a> "; }
if (0 <= $page3) { echo "<a href='index.php?idx=6&page=" . $page3 . "'>" . $page3 . "</a> "; }
if (0 <= $page2) { echo "<a href='index.php?idx=6&page=" . $page2 . "'>" . $page2 . "</a> "; }
echo "<a href='index.php?idx=6&page=" . $page1 . "'>" . $page1 . "</a> ";
echo $page . " ";
$page5 = $page + 5;
$page4 = $page + 4;
$page3 = $page + 3;
$page2 = $page + 2;
$page1 = $page + 1;
echo "<a href='index.php?idx=6&page=" . $page1 . "'>" . $page1 . "</a> ";
if ($pages >= $page2) { echo "<a href='index.php?idx=6&page=" . $page2 . "'>" . $page2 . "</a> "; }
if ($pages >= $page3) { echo "<a href='index.php?idx=6&page=" . $page3 . "'>" . $page3 . "</a> "; }
if ($pages >= $page4) { echo "<a href='index.php?idx=6&page=" . $page4 . "'>" . $page4 . "</a> "; }
if ($pages >= $page5) { echo "<a href='index.php?idx=6&page=" . $page5 . "'>" . $page5 . "/a> "; }
echo "<a href='index.php?idx=6&page=1'>Next Page</a>";
}
echo "</center>";
}
echo "<center>Search By ";
echo "<form action='index.php' method='get'>
<input type='hidden' name='idx' value='6'>
<select name='type'>
<option value='user'>Name</option>
<option value='email'>Email</option>
</select>
<input type='text' name='value'>
<input type='submit' value='Search'>
</form>";
echo "
Search By Group: 
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='6'>
<input type='hidden' name='type' value='group'>
<select name='group'>";
$groups = mysql_query("SELECT * FROM `group` ORDER BY `name` ASC")or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
while ($groups2 = mysql_fetch_array($groups))
{
echo "<option value='" . $groups2['id'] . "'>" . $groups2['name'] . "</option>";
}
echo "</select>
<input type='submit' value='Search'>
</form>
</center>";
}
?>