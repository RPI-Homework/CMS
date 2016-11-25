<?php
if ($cookie == 1)
{
if ($mgroup['editgroups'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `group` WHERE `name` = '" . $_GET['add'] . "'")or die("<br>Error Code 360: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 != 0)
{
echo "<br>Error Code 76: Group name already exists.<br>
<a href='index.php?idx=6'>Back</a>";
}
else
{
//-------------------------------
//Root Admin Edit
//-------------------------------
echo $skin['contentheader'];
echo "Adding Group " . $_GET['add'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "
<form action='index.php' method='post'>
<input type='hidden' name='sum' value='62'>
<table border='0'>
<tr><td>Group Name</td><td><input type='text' maxlength='32' name='name' value='" . $_GET['add'] . "' /></td></tr>
<tr><td>Is this group banned?</td><td>
Yes<input type='radio' name='ban' value='1' />
No<input type='radio' name='ban' value='0' checked='checked' /></td></tr>
<tr><td>Can this group view articles?</td><td>
Yes<input type='radio' name='viewarticles' value='1' checked='checked' />
No<input type='radio' name='viewarticles' value='0' /></td></tr>
<tr><td>Can send and recieve personal messages?</td><td>
Yes<input type='radio' name='canpm' value='1' checked='checked' />
No<input type='radio' name='canpm' value='0' /></td></tr>
<tr><td>Can edit their profile?</td><td>
Yes<input type='radio' name='editprofile' value='1' checked='checked' />
No<input type='radio' name='editprofile' value='0' /></td></tr>";
if  ($mgroup['addadmin'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Is this group a staff member?</td><td>
Yes<input type='radio' name='isstaff' value='1' />
No<input type='radio' name='isstaff' value='0' checked='checked' /></td></tr>
<tr><td>Is an Administrative Group?</td><td>
Yes<input type='radio' name='admin' value='1' />
No<input type='radio' name='admin' value='0' checked='checked' /></td></tr>
<tr><td colspan='2'><center>Ignore below if above is no</center></td></tr>";
if  ($member['gid'] == $ra)
{
echo "<tr><td>Can add other administrators?</td><td>
Yes<input type='radio' name='addadmin' value='1' />
No<input type='radio' name='addadmin' value='0' checked='checked' /></td></tr>";
}
if  ($mgroup['caneditmembers'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit members?</td><td>
Yes<input type='radio' name='caneditmembers' value='1' />
No<input type='radio' name='caneditmembers' value='0' checked='checked' /></td></tr>";
}
if  ($mgroup['editarticles'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit articles?</td><td>
Yes<input type='radio' name='editarticles' value='1' />
No<input type='radio' name='editarticles' value='0' checked='checked' /></td></tr>";
}
if  ($mgroup['edithome'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit homepage?</td><td>
Yes<input type='radio' name='edithome' value='1' />
No<input type='radio' name='edithome' value='0' checked='checked' /></td></tr>";
}
if  ($mgroup['editgroups'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit member groups?</td><td>
Yes<input type='radio' name='editgroups' value='1' />
No<input type='radio' name='editgroups' value='0' checked='checked' /></td></tr>";
}
if  ($mgroup['editskin'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit skins?</td><td>
Yes<input type='radio' name='editskin' value='1' />
No<input type='radio' name='editskin' value='0' checked='checked' /></td></tr>";
}
if  ($mgroup['caneditgeneral'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit general settings?</td><td>
Yes<input type='radio' name='caneditgeneral' value='1' />
No<input type='radio' name='caneditgeneral' value='0' checked='checked' /></td></tr>";
}
if  ($mgroup['viewlogs'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can view site logs?</td><td>
Yes<input type='radio' name='viewlogs' value='1' />
No<input type='radio' name='viewlogs' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td colspan='2'><center><input type='submit' name='submit' value='Add Group' /></center></td></tr></table></form>";
echo $skin['postcontenttext'];
}
}
}
}
?>