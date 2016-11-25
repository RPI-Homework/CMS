<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (isset($_GET['id']))
{
if (!$_GET['id'])
{
echo "<br>Error Code 57: No article ID.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
//-------------------------------
//Rest of Page
//-------------------------------
$check3 = mysql_query("SELECT * FROM `articles` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 335: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 == 0)
{
echo "<br>Error Code 58: Article ID does not exist.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$aedit = mysql_fetch_array( $check3 );
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 336: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num3 = mysql_num_rows($check4);
if ($num3 != 0)
{
$cedit = mysql_fetch_array( $check4 );
}
//-------------------------------
//article edits
//-------------------------------
echo $skin['contentheader'];
echo "Now editing " . $aedit['name'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 337: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='43'>
<table border='0'>
<tr><td>Name</td><td><input type='text' name='name' value='" . $aedit['name'] . "' /></td></tr>
<tr><td>Author</td><td><input type='text' name='author' value='" . $aedit['author'] . "' /></td></tr>
<tr><td>Editor</td><td><input type='text' name='edit' value='" . $aedit['edit'] . "' /></td></tr>
<tr><td colspan='2'>Article<br><textarea rows='10' cols='75' name='article'>" . $aedit['article'] . "</textarea></td></tr>
<input type='hidden' name='id' value='" . $aedit['id'] . "' />
<tr><td>Category</td><td><select name='cat'>
";
$num4 = mysql_num_rows($box);
if ($num4 == 0)
{
echo "<option value='0'>No Categories</option>";
echo "</select></td></tr>";
}
else
{
if ($num3 != 0)
{
echo "<option value='0'>None</option>";
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'";
if ($aedit['cat'] == $row['id'])
{
echo " selected='selected'";
}
echo ">" . $row['name'] . "</option>";
}
echo "</select></td></tr>";
}
else
{
echo "<option value='0' selected='selected'>None</option>";
while($row = mysql_fetch_assoc($box))
{ 
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></td></tr>";
}
}
echo "<tr><td>Available to Public</td><td>";
if ($aedit['public'] == 1)
{
echo "Yes<input type='radio' name='public' value='1' checked='checked' />";
echo "No<input type='radio' name='public' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='public' value='1' />";
echo "No<input type='radio' name='public' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Member Only Article<br>----If no fill out below</td><td>";
if ($aedit['memberonly'] == 1)
{
echo "Yes<input type='radio' name='memberonly' value='1' checked='checked' />";
echo "No<input type='radio' name='memberonly' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='memberonly' value='1' />";
echo "No<input type='radio' name='memberonly' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Guest Automatically Redirect</td><td>";
if ($aedit['guestredirect'] == 1)
{
echo "Yes<input type='radio' name='guestredirect' value='1' checked='checked' />";
echo "No<input type='radio' name='guestredirect' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='guestredirect' value='1' />";
echo "No<input type='radio' name='guestredirect' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Redirects to</td><td><input type='text' name='redirectto' value='" . $aedit['redirectto'] . "' /></td></tr>
<tr><td colspan='2'>Guest Article<br>----If guest redirect is no<br><textarea rows='10' cols='75' name='garticle'>" . $aedit['guestview'] . "</textarea></td></tr>
<tr><td><input type='submit' name='upart' value='Update Article' /></form></td><td>
<form action='index.php' method='get'>
<input type='hidden' name='sum' value='46'>
<input type='hidden' name='id' value='" . $aedit['id'] . "' />
<input type='submit' name='upart' value='Delete Article' /></form></td></tr>
</table>";
}
}
}
}
}
?>