<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$linkcheck = mysql_query("SELECT * FROM `menu` WHERE `id` = " . $_GET['elink'])or die("<br>Error Code 239: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($linkcheck);
if ($num2 == 0)
{
echo "<br>Error Code 16: Link ID does not exist.<br>
<a href='index.php?idx=2'>Back</a>";
}
else
{
$link = mysql_fetch_array( $linkcheck );
echo $skin['contentheader'];
echo "Editing Link " . $link['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo"<form action='index.php' method='post'>
<table><tr><td>
<input type='hidden' name='sum' value='26'/>
<input type='hidden' name='elid' value='" . $_GET['elink'] ."'/>
<tr><td>Name</td><td><input type='text' name='elname' value='" . $link['name'] ."'/></td></tr>
<tr><td>Link</td><td><input type='text' name='ellink' value='" . $link['link'] ."' size='75'/></td></tr>
<tr><td>Order</td><td><input type='text' name='elorder' value='" . $link['order'] ."' maxlength='2' size='3'/></td></tr>
<tr><td>Category</td><td>
<select name='elcat'>";
$box = mysql_query("SELECT * FROM `category` WHERE `id` LIKE '%' ORDER BY `order`")or die("<br>Error Code 240: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($row = mysql_fetch_assoc($box))
{
if ($row['id'] == $link['cat'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['name'] . " (Current)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
}
echo "</select></td></tr>
<tr><td><input type='submit' name='eledit' value='Edit Link'/>
</td></tr></table>
</form>
";
echo $skin['postcontenttext'];
}
}
}
?>