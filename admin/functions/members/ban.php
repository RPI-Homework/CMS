<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
echo $skin['contentheader'];
echo "IP Ban";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Add an IP. Use * as a wildcard.
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='85' />
<input type='text' name='ip1' maxlength='3' size='3'> .
<input type='text' name='ip2' maxlength='3' size='3'> .
<input type='text' name='ip3' maxlength='3' size='3'> .
<input type='text' name='ip4' maxlength='3' size='3'>
<input type='submit' name='add' value='Add' /></form>
Delete an IP.
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='86' />
<select name='del' onChange = 'this.form.submit()'>";
$box = mysql_query("SELECT * FROM `ban` WHERE `id` LIKE '%' ORDER BY `ip`")or die("<br>Error Code 439: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<option selected='selected' disabled='disabled'>Select an IP</option>";
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['ip'] . "</option>";
}
echo "</select></form>";
echo $skin['postcontenttext'];
}
}
?>