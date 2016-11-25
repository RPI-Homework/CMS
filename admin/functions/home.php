<?php
if ($cookie == 1)
{
if (!$_POST['lines'])
{
$lines = 3;
}
else
{
$lines = $_POST['lines'];
}
echo $skin['contentheader'];
echo "Administrator Index";
echo $skin['postcontentheader'];
//Admin Notes
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='2'/>
<center>
<textarea rows='" . $lines . "' cols='75' name='adminnotes'>" . $general['adminnote'] . "</textarea>
<input type='submit' value='Update Notes' />
</center>
</form>
<form action='index.php' method='post'>
<center>
Rows<input type='text' name='lines' value='" . $lines . "' size='3' />
<input type='submit' value='Update Rows' />
</center>
</form>";
echo $skin['contenttext'];
$box2 = mysql_query("SELECT * FROM `adminskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 225: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<table><tr><td valign='top'>Administrative Panel Skin</td><td><form action='index.php' method='post'>
<input type='hidden' name='sum' value='20'/>
<select name='adminskin' onChange = 'this.form.submit()'>";
while($row = mysql_fetch_assoc($box2))
{
if ($general['adminskin'] == $member['adminskin'] AND $member['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Default)</option>";
}
else if ($member['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Current)</option>";
}
else if ($general['adminskin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></form></td></tr>";
include "mcheck.php";
//Administrators
if ($adaccess == 1)
{
echo "<tr><td valign='top'>Edit Administrators</td><td><form action='index.php' method='get'>
<input type='hidden' name='idx' value='31'/>
<input type='text' name='add' />
<input type='submit' name='submit' value='Search' /></form></td></tr>";
}
//Articles
if ($aaccess == 1)
{
echo "<tr><td valign='top'>Edit Articles</td><td><form action='index.php' method='get'>
<input type='hidden' name='idx' value='41'/>
<input type='text' name='article'>
<input type='submit' name='name' value='Search' /></form></td></tr>";
}
//Group
if ($graccess == 1)
{
echo "<tr><td valign='top'>Edit Groups</td><td><form action='index.php' method='get'>
<input type='hidden' name='idx' value='61'/>
<select name='id' onChange = 'this.form.submit()'>";
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 226: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<option selected='selected' disabled='disabled'>Select a Group</option>";
while($row = mysql_fetch_assoc($box))
{
if ($member['gid'] == $ra)
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
else if ($row['id'] == $ra)
{

}
else if ($mgroup['addadmin'] != 1 AND $row['admin'] == 1)
{

}
else if ($row['id'] == $member['gid'])
{

}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
}
echo "</form></td></tr>";
}
//Homepage
if ($haccess == 1)
{
echo "<tr><td valign='top'>Edit Homepages</td><td><form action='index.php' method='get'>
<input type='hidden' name='idx' value='72'/>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option selected='selected' disabled='disabled'>Select a Homepage</option>";
$box = mysql_query("SELECT * FROM `homepage` WHERE `id` LIKE '%' ORDER BY `title`")or die("<br>Error Code 227: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['title'];
if ($row['id'] == $general['guesthome'])
{
echo " (Guest)";
}
if ($row['id'] == $general['memberhome'])
{
echo " (Member)";
}
if ($row['id'] == $general['staffhome'])
{
echo " (Staff)";
}
if ($row['id'] == $general['adminhome'])
{
echo " (Admin)";
}
if ($row['id'] == $general['banhome'])
{
echo " (Banned)";
}
echo "</option>";
}
echo "</select></form></td></tr>";
}
//Members
if ($maccess == 1)
{
echo "<tr><td valign='top'>Edit Members</td><td><form action='index.php' method='get'>
<input type='hidden' name='idx' value='81'/>
<input type='text' name='user'>
<input type='submit' name='name' value='Search' /></form></td></tr>";
}
//Member Skins
if ($saccess = 1)
{
echo "<tr><td valign='top'>Edit Member Skins</td><td><form action='index.php' method='get'>
<input type='hidden' name='idx' value='94'/>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option value='2' selected='selected' disabled='disabled'>Select a Skin</option>";
$box = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 228: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
$genset = mysql_query("SELECT * FROM `general` WHERE `id` = 1")or die("<br>Error Code 229: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($gen = mysql_fetch_assoc($genset))
{
if ($row['id'] == $gen['skin'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
}
echo "</select></form></td></tr>";
//Admin Skins
echo "<tr><td valign='top'>Edit Administrative Skin</td><td><form action='index.php' method='get'>
<input type='hidden' name='idx' value='93'/>
<select name='id' onChange = 'this.form.submit()'>";
echo "<option value='2' selected='selected' disabled='disabled'>Select a Skin</option>";
$box = mysql_query("SELECT * FROM `adminskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 230: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
$genset = mysql_query("SELECT * FROM `general` WHERE `id` = 1")or die("<br>Error Code 231: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($gen = mysql_fetch_assoc($genset))
{
if ($row['id'] == $gen['adminskin'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
}
echo "</select></form></td></tr>";
}
echo "</table>";
echo $skin['postcontenttext'];
}
?>