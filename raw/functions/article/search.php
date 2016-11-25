<?php
//-----------------
//by article name
//-----------------
if ($function == 1)
{
if (isset($_GET['listall']))
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `name` LIKE '%' ORDER BY `id` DESC")or die("<br>Error Code 1028: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No articles.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Listing All Articles";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table border='1' rules='all' frame='void'>
<tr>
<td><center>Name</center></td>
<td><center>Author</center></td>
<td><center>Editor</center></td>
<td><center>Category</center></td>
<td><center>Member Only</center></td>
<td><center>View</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
if ($aedit['public'] == 1)
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 1029: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
}
}
}
}
echo "</tr></table>";
}
echo $skins['postcontenttext'];
}
else if (isset($_GET['article']))
{
if (!$_GET['article'])
{
echo "<br>No article name entered.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `name` LIKE '%" . $_GET['article'] . "%' ORDER BY `name`")or die("<br>Error Code 1030: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No article names contains " . $_GET['article'] . ".<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
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
<td><center>View</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
if ($aedit['public'] == 1)
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 1031: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
}
}
}
}
echo "</tr></table>";
}
}
echo $skin['postcontenttext'];
}
else if (isset($_GET['author']))
{
if (!$_GET['author'])
{
echo "<br>No author name entered.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `author` LIKE '%" . $_GET['author'] . "%' ORDER BY `name`")or die("<br>Error Code 1032: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No article made by author " . $_GET['author'] . ".<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
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
<td><center>View</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
if ($aedit['public'] == 1)
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 1033: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
}
}
}
}
echo "</tr></table>";
}
}
echo $skin['postcontenttext'];
}
else if (isset($_GET['editor']))
{
if (!$_GET['editor'])
{
echo "<br>No editor name entered.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `edit` LIKE '%" . $_GET['editor'] . "%' ORDER BY `name`")or die("<br>Error Code 1034: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No articles were edited by " . $_GET['editor'] . ".<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
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
<td><center>View</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
if ($aedit['public'] == 1)
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 1035: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
}
}
}
}
echo "</tr></table>";
}
}
echo $skin['postcontenttext'];
}
else if (isset($_GET['category']))
{
if (!$_GET['category'])
{
echo "<br>No category ID.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $_GET['category'])or die("<br>Error Code 1036: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check4);
if ($count == 0)
{
echo "<br>Invalid category ID.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$cedit = mysql_fetch_array( $check4 );
$check3 = mysql_query("SELECT * FROM `articles` WHERE `cat` = '" . $_GET['category'] . "' ORDER BY `name`")or die("<br>Error Code 1037: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>Error Code 71: No Article in category " . $cedit['name'] . ".<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
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
<td><center>View</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
if ($aedit['public'] == 1)
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
}
}
echo "</tr></table>";
}
}
}
echo $skin['postcontenttext'];
}
else if (isset($_GET['content']))
{
if (!$_GET['content'])
{
echo "<br>No articles text enetered.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `article` LIKE '%" . $_GET['article'] . "%' ORDER BY `name`")or die("<br>Error Code 1038: Please contact the Root Administrator immediately.<br>" . mysql_error());
$count = mysql_numrows($check3);
if ($count == 0)
{
echo "<br>No articles contain that text.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
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
<td><center>View</center></td>
</tr>";
while ($aedit = mysql_fetch_array( $check3 ))
{
if ($aedit['public'] == 1)
{
$check4 = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $aedit['cat'])or die("<br>Error Code 1039: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
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
echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $aedit['id'] . "'>View</a></td>";
}
}
}
}
echo "</tr></table>";
}
}
echo $skin['postcontenttext'];
}
//-----------------
//search bars 0
//-----------------
else
{
echo $skin['contentheader'];
echo "Articles";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Search by Article Name.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<input type='text' name='article'>
<input type='submit' name='name' value='Search' /></form>
Search by Author.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<input type='text' name='author'>
<input type='submit' name='maker' value='Search' /></form>
Search by Editor.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<input type='text' name='editor'>
<input type='submit' name='edit' value='Search' /></form>
Search by Category.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<select name='category' onChange = 'this.form.submit()'>";
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 1040: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>
Search by Article Content. Use % as a wildcard.
<form action='" . $_SERVER['PHP_SELF'] . "' method='get'>
<input type='text' name='content'>
<input type='submit' name='contains' value='Search' /></form>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?listall=true'>List all Articles.</a>";
echo $skin['postcontenttext'];
}
}
?>