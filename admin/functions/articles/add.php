<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Adding an Article";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 300: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='45'/>
<table border='0'>
<tr><td>Name</td><td><input type='text' name='name' value='" . $_POST['name'] . "'/></td></tr>
<tr><td>Author</td><td><input type='text' name='author' value='" . $member['user'] . "' /></td></tr>
<tr><td>Editor</td><td><input type='text' name='edit' value='" . $_POST['edit'] . "'/></td></tr>
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
echo "<tr><td>Available to Public</td><td>";
echo "Yes<input type='radio' name='public' value='1' checked='checked' />";
echo "No<input type='radio' name='public' value='0' /></td></tr>";
echo "<tr><td>Member Only Article<br>----If no fill out below</td><td>";
echo "Yes<input type='radio' name='memberonly' value='1' />";
echo "No<input type='radio' name='memberonly' value='0' checked='checked' /></td></tr>";
echo "<tr><td>Guest Automatically Redirect</td><td>";
echo "Yes<input type='radio' name='guestredirect' value='1' />";
echo "No<input type='radio' name='guestredirect' value='0' checked='checked' /></td></tr>";
echo "<tr><td>Redirects to</td><td><input type='text' name='redirectto' value='" . $aedit['redirectto'] . "' /></td></tr>
<tr><td colspan='2'>Guest Article<br>----If guest redirect is no<br><textarea rows='10' cols='75' name='garticle'>" . $_POST['garticle'] . "</textarea></td></tr>
<tr><td colspan='2'><input type='submit' name='upart' value='Add Article' /></td></tr>
</table>
</form>";
}
}
?>