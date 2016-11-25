<?php
if ($cookie == 1)
{
if ($mgroup['editgroups'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['id'])
{
echo "<br>Error Code 78: Invalid group ID.<br>
<a href='index.php?idx=6'>Back</a>";
}
else
{
$box2 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 370: Please contact the Root Administrator immediately.<br>" . mysql_error());
$row = mysql_fetch_assoc($box2);
if ($_GET['id'] == $general['membergroup'])
{
echo "<br>Error Code 79: Cannot delete default Member group.<br>
<a href='index.php?idx=6'>Back</a>";
}
elseif ($_GET['id'] == $ra)
{
echo "<br>Error Code 80: Cannot delete Root Administrator group.<br>
<a href='index.php?idx=6'>Back</a>";
}
elseif ($row['admin'] == 1 AND $mgroup['addadmin'] != 1)
{
echo "<br>Error Code 81: You cannot delete an Administrative group.<br>
<a href='index.php?idx=6'>Back</a>";
}
elseif ($_GET['id'] == $mgroup['id'])
{
echo "<br>Error Code 82: Cannot delete your group.<br>
<a href='index.php?idx=6'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Deleteing " . $row['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<form action='index.php' method='post'><table>
<input type='hidden' name='sum' value='63'>
<tr><td>Move group users to</td><td colspan='2'><table>
<select name='mem'>";
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 371: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($_GET['id'] == $row['id'])
{

}
else if ($general['membergroup'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['name'] . "</option>";
}
else if ($member['gid'] == $ra)
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
echo "</select>";
echo "</table></td></tr>
<tr><td>Are you sure?</td><td><table>
<input type='hidden' name='dddid' value='" . $_GET['id'] . "' />
<input type='submit' name='ddrid' value='Yes' /></form></table></td><td><table>
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='6'>
<input type='submit' name='none' value='No' /></form></table></td></tr></table></form>";
echo $skin['postcontenttext'];
}
}
}
}
?>