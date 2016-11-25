<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
if (!$_GET['acat'])
{
echo "<br>Error Code 40: No category name entered.<br>
<a href='index.php?idx=5'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Adding Category " . $_GET['acat'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo"<form action='index.php' method='post'>
<input type='hidden' name='sum' value='51'>
<table><tr><td>
Name</td><td><input type='text' name='aoname' value='" . $_GET['acat'] ."'/></td></tr>
<tr><td>Order</td><td><input type='text' name='aoorder' maxlength='2' size='3'/></td></tr>
<tr><td colspan='2'><input type='submit' name='aoadd' value='Add Category'/>
</td></tr></table>
</form>
";
echo $skin['postcontenttext'];
}
}
}
?>