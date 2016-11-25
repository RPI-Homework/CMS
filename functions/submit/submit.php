<?php
if ($function == 1)
{
if ($cookie == 1)
{
echo $skin['contentheader'];
echo "Submit an Article";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 1070: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table border='0'>
<tr><td>Name</td><td><input type='text' name='name' /></td></tr>
<tr><td colspan='2'>Article<br><textarea rows='10' cols='75' name='article'>" . $_POST['article'] . "</textarea></td></tr>
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
echo "<option value='0' selected='selected'>None</option>";
while($row = mysql_fetch_assoc($box))
{ 
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></td></tr>";
}
echo "<tr><td colspan='2'>Guest Article View<textarea rows='10' cols='75' name='garticle'>" . $_POST['garticle'] . "</textarea></td></tr>
<tr><td colspan='2'><input type='submit' name='send' value='Submit Article' /></td></tr>
</table>
</form>";
}
else
{
echo $skin['contentheader'];
echo "Submit an Article";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 1071: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table border='0'>
<tr><td>Name</td><td><input type='text' name='name' /></td></tr>
<tr><td>Author</td><td><input type='text' name='author' value='Anonymous' /></td></tr>
<tr><td colspan='2'>Article<br><textarea rows='10' cols='75' name='article'>" . $_POST['article'] . "</textarea></td></tr>
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
echo "<option value='0' selected='selected'>None</option>";
while($row = mysql_fetch_assoc($box))
{ 
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></td></tr>";
}
echo "<tr><td colspan='2'>Guest Article View<textarea rows='10' cols='75' name='garticle'>" . $_POST['garticle'] . "</textarea></td></tr>
<tr><td colspan='2'><input type='submit' name='send' value='Submit Article' /></td></tr>
</table>
</form>";
}
}
?>