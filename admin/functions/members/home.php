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
echo "Members";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Search by Username.
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='81'> 
<input type='text' name='user'>
<input type='submit' name='name' value='Search' /></form>
Search by email.
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='81'> 
<input type='text' name='mail'>
<input type='submit' name='email' value='Search' /></form>
Search by ip. Use % as a wildcard.
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='81'> 
<input type='text' name='ip1' maxlength='3' size='3'> .
<input type='text' name='ip2' maxlength='3' size='3'> .
<input type='text' name='ip3' maxlength='3' size='3'> .
<input type='text' name='ip4' maxlength='3' size='3'>
<input type='submit' name='ips' value='Search' /></form>
Search by group.
<form action='index.php' method='get'>
<input type='hidden' name='idx' value='81'> 
<select name='group' onChange = 'this.form.submit()'>";
$box = mysql_query("SELECT * FROM `group` WHERE `id` LIKE '%' ORDER BY `name`")or die("<br>Error Code 510: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<option value='2' selected='selected' disabled='disabled'>Select a Group</option>";
while($row = mysql_fetch_assoc($box))
{
echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
echo "</select></form>";
echo "<a href='index.php?idx=81'>List all Users.</a>";
echo $skin['postcontenttext'];
}
}
?>