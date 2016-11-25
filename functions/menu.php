<?php
if ($function == 1)
{
if ($cookie == 1)
{
echo $skin['menu'];
$catcheck = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 619: Please contact the Root Administrator immediately.<br>");
while ($cat = mysql_fetch_array( $catcheck ))
{
echo $skin['menutitles'];
echo $cat['name'];
echo $skin['postmenu'];
echo $skin['menulinks'];
$menucheck = mysql_query("SELECT * FROM `menu` WHERE `cat` = " . $cat['id'] . " ORDER BY `order`")or die("<br>Error Code 619: Please contact the Root Administrator immediately.<br>");
while ($menu = mysql_fetch_array( $menucheck ))
{
echo $skin['eachlink'];
echo "<a href='" . $menu['link'] . "'>" . $menu['name'] . "</a>";
echo $skin['posteachlink'];
}
echo $skin['postmenulinks'];
}
echo $skin['loginas'];
if ($member['gid'] == $ra)
{
echo "You are a Root Administrator.<br>
<a href='" . $adminindex . "'>Administration Control Panel</a>";
}
else if ($mgroup['admin'] == 1)
{
echo "You are an Administrator.<br>
<a href='" . $adminindex . "'>Administration Control Panel</a>";
}
else if ($mgroup['isstaff'] == 1)
{
echo "You are a Staff Member.";
}
else
{
echo "You are a Member.";
}
echo $skin['postloginas'];
}
else
{
echo $skin['menu'];
$catcheck = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 619: Please contact the Root Administrator immediately.<br>");
while ($cat = mysql_fetch_array( $catcheck ))
{
echo $skin['menutitles'];
echo $cat['name'];
echo $skin['postmenu'];
echo $skin['menulinks'];
$menucheck = mysql_query("SELECT * FROM `menu` WHERE `cat` = " . $cat['id'] . " ORDER BY `order`")or die("<br>Error Code 619: Please contact the Root Administrator immediately.<br>");
while ($menu = mysql_fetch_array( $menucheck ))
{
echo $skin['eachlink'];
echo "<a href='" . $menu['link'] . "'>" . $menu['name'] . "</a>";
echo $skin['posteachlink'];
}
echo $skin['postmenulinks'];
}
echo $skin['loginas'];
echo "You are a Guest.<br>";
echo $skin['postloginas'];
}
}
?>