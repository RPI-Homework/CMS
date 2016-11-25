<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
//-----------------
//search bars 0
//-----------------
echo $skin['contentheader'];
echo "General Settings";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='1'/>
<table>
<tr><td>Site Name</td><td><input type='text' name='name' value='" . $general['name'] . "'/></td></tr>
<tr><td>Default Member Skin</td><td>
<select name='skin'>";
$box = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($general['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Default Administrative Skin</td><td>
<select name='adminskin'>";
$box = mysql_query("SELECT * FROM `adminskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($general['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Default Guest Homepage</td><td>
<select name='guesthome'>";
$box = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($general['guesthome'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['title'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Default Member Homepage</td><td>
<select name='memberhome'>";
$home = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($home))
{
if ($general['memberhome'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['title'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Default Staff Homepage</td><td>
<select name='staffhome'>";
$home = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($home))
{
if ($general['staffhome'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['title'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Default Administrator Homepage</td><td>
<select name='adminhome'>";
$home = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($home))
{
if ($general['adminhome'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['title'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Default Banned Homepage</td><td>
<select name='banhome'>";
$home = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($home))
{
if ($general['banhome'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['title'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Default Member Group</td><td>
<select name='membergroup'>";
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($general['membergroup'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['name'] . " (Current)</option>";
}
else if ($row['id'] == $ra OR $row['admin'] == 1 OR $row['isstaff'] == 1)
{

}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td>Can guests add articles?</td><td>";
if ($general['guestarticles'] == 1)
{
echo "Yes<input type='radio' name='guestarticles' value='1' checked='checked' />";
echo "No<input type='radio' name='guestarticles' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='guestarticles' value='1' />";
echo "No<input type='radio' name='guestarticles' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td colspan='2'><center><input type='submit' name='update' value='Update Settings' /></center></td></tr></table></form>";
echo $skin['postcontenttext'];
}
//-------------------
//End
//-------------------
}
?>