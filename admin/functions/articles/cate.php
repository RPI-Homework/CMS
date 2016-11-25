<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$catcheck = mysql_query("SELECT * FROM `acat` WHERE `id` = " . $_GET['ecat'])or die("<br>Error Code 304: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($catcheck);
if ($num2 == 0)
{
echo "<br>Error Code 42: Category ID does not exist.<br>
<a href='index.php?idx=5'>Back</a>";
}
else
{
$cat = mysql_fetch_array( $catcheck );
echo $skin['contentheader'];
echo "Editing Category " . $cat['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo"<form action='index.php' method='post'>
<input type='hidden' name='sum' value='52'>
<table><tr><td>
<input type='hidden' name='ecid' value='" . $_GET['ecat'] ."'/>
Name</td><td><input type='text' name='ecname' value='" . $cat['name'] ."'/></td></tr>
<tr><td>Order</td><td><input type='text' name='ecorder' value='" . $cat['order'] ."' maxlength='2' size='3'/></td></tr>
<tr><td><input type='submit' name='ecedit' value='Edit Category'/>
</td></tr></table>
</form>
";
echo $skin['postcontenttext'];
}
}
}
?>