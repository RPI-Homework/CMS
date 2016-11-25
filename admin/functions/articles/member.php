<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `public` = 0")or die("<br>Error Code 355: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 75: No articles to be checked.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Member Articles";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Author</center></td>
<td><center>Editor</center></td>
<td><center>Category</center></td>
<td><center>Member Only</center></td>
<td><center>Is Public</center></td>
<td><center>Edit</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 356: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check4);
if ($count == 0)
{
  echo "<tr>
<td><center>" . $aedit['name'] . "</center></td>
<td><center>" . $aedit['author'] . "</center></td>
<td><center>" . $aedit['edit'] . "</center></td>
<td><center>None</center></td>
<td><center>";
if ($aedit['memberonly'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($aedit['public'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>";
}
else
{
while ($cedit = mysql_fetch_array( $check4 ))
{
  echo "<tr>
<td><center>" . $aedit['name'] . "</center></td>
<td><center>" . $aedit['author'] . "</center></td>
<td><center>" . $aedit['edit'] . "</center></td>
<td><center>" . $cedit['name']    . "</center></td>
<td><center>";
if ($aedit['memberonly'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><center>";
if ($aedit['public'] == 1)
{
echo "Yes</center></td>";
}
else
{
echo "No</center></td>";
}
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>";
}
}
}
echo "</table>";
}
}
echo $skin['postcontenttext'];
}
?>