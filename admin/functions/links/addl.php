<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "Adding Link " . $_GET['alink'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo"<form action='index.php' method='post'>
<input type='hidden' name='sum' value='28'/>
<table><tr><td>
Name</td><td><input type='text' name='alname' value='" . $_GET['alink'] ."'/></td></tr>
<tr><td>Link</td><td><input type='text' name='allink' size='75'/></td></tr>
<tr><td>Order</td><td><input type='text' name='alorder' maxlength='2' size='3'/></td></tr>
<tr><td>Category</td><td>
<select name='alcat'>";
echo "<option selected='selected' disabled='disabled'>Select a Category</option>";
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 233: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>
</td></tr>
<tr><td colspan='2'><input type='submit' name='aladd' value='Add Link'/>
</td></tr></table>
</form>
";
echo $skin['postcontenttext'];
}
}
?>