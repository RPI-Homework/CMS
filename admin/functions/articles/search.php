<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
//-----------------
//by article name
//-----------------
if (isset($_GET['article']))
{
if (!$_GET['article'])
{
echo "<br>Error Code 63: No article name entered.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `name` LIKE '%" . $_GET['article'] . "%' ORDER BY `name`")or die("<br>Error Code 340: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 64: No article names contains " . $_GET['article'] . ".<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Article names that contain " . $_GET['article'] . ".";
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
<td><center>Delete</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 341: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
}
}
}
echo "</table>";
}
}
echo $skin['postcontenttext'];
}
//-----------------
//by article author
//-----------------
else if (isset($_GET['author']))
{
if (!$_GET['author'])
{
echo "<br>Error Code 65: No author name entered.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `author` LIKE '%" . $_GET['author'] . "%' ORDER BY `name`")or die("<br>Error Code 342: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 66: No article made by author " . $_GET['author'] . ".<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Article made by author " . $_GET['author'] . ".";
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
<td><center>Delete</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 343: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
}
}
}
echo "</table>";
}
}
echo $skin['postcontenttext'];
}
//-----------------
//by article editor
//-----------------
else if (isset($_GET['editor']))
{
if (!$_GET['editor'])
{
echo "<br>Error Code 67: No editor name entered.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `edit` LIKE '%" . $_GET['editor'] . "%' ORDER BY `name`")or die("<br>Error Code 344: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 68: No articles were edited by " . $_GET['editor'] . ".<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Articles edited by " . $_GET['editor'] . ".";
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
<td><center>Delete</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 345: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
}
}
}
echo "</table>";
}
}
echo $skin['postcontenttext'];
}
//-----------------
//by article category
//-----------------
else if (isset($_GET['category']))
{
if (!$_GET['category'])
{
echo "<br>Error Code 69: Invalid category ID.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $_GET['category'])or die("<br>Error Code 346: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check4);
if ($count == 0)
{
echo "<br>Error Code 70: Invalid category ID.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$cedit = mysql_fetch_array( $check4 );
$check3 = mysql_query("SELECT * FROM `articles` WHERE `cat` = '" . $_GET['category'] . "' ORDER BY `name`")or die("<br>Error Code 347: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 71: No Article in category " . $cedit['name'] . ".<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Article in category " . $cedit['name'] . ".";
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
<td><center>Delete</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
  echo "<tr>
<td><center>" . $aedit['name'] . "</center></td>
<td><center>" . $aedit['author'] . "</center></td>
<td><center>" . $aedit['edit'] . "</center></td>
<td><center>" . $cedit['name'] . "</center></td>
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
}
echo "</table>";
}
}
}
echo $skin['postcontenttext'];
}
//-----------------
//by article content
//-----------------
else if (isset($_GET['content']))
{
if (!$_GET['content'])
{
echo "<br>Error Code 72: No articles text enetered.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `article` LIKE '%" . $_GET['article'] . "%' ORDER BY `name`")or die("<br>Error Code 348: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 73: No articles contain that text.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Searching by articles text.";
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
<td><center>Delete</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 349: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
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
echo "<td><a href='index.php?idx=43&id=" . $aedit['id'] . "'>Edit</a></td>
<td><a href='index.php?idx=46&id=" . $aedit['id'] . "'>Delete</a></td>";
}
}
}
echo "</table>";
}
}
echo $skin['postcontenttext'];
}
}
}
?>