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
echo "Articles";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Search by Article Name.
<form action='index.php' method='get'>
<input type='text' name='article'>
<input type='hidden' name='idx' value='41'>
<input type='submit' name='name' value='Search' /></form>
Search by Author.
<form action='index.php' method='get'>
<input type='text' name='author'>
<input type='hidden' name='idx' value='41'>
<input type='submit' name='maker' value='Search' /></form>
Search by Editor.
<form action='index.php' method='get'>
<input type='text' name='editor'>
<input type='hidden' name='idx' value='41'>
<input type='submit' name='edit' value='Search' /></form>
Search by Category.
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='41'>
<select name='category' onChange = 'this.form.submit()'>";
$box = mysql_query("SELECT * FROM `acat` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 350: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>
Search by Article Content. Use % as a wildcard.
<form action='index.php' method='get'>
<input type='text' name='content'>
<input type='hidden' name='idx' value='41'>
<input type='submit' name='contains' value='Search' /></form>";
echo "<a href='index.php?idx=42'>List all Articles.</a>";
echo $skins['postcontenttext'];
}
}
?>