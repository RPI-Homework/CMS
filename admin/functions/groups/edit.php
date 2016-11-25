<?php
if ($cookie == 1)
{
if ($mgroup['editgroups'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `group` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 378: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 == 0)
{
echo "<br>Error Code 87: Group ID does not exist.<br>
<a href='index.php?idx=6'>Back</a>";
}
else
{
$gedit = mysql_fetch_array( $check3 );
//-------------------------------
//Root Admin Edit
//-------------------------------
if ($gedit['id'] == $ra AND $member['gid'] != $ra)
{
echo "<br>Error Code 88: You cannot edit the Root Administrator group.<br>
<a href='index.php?idx=6'>Back</a>";
}
else if ($gedit['id'] == $member['gid'] AND $member['gid'] != $ra)
{
echo "<br>Error Code 89: You cannot edit your own group.<br>
<a href='index.php?idx=6'>Back</a>";
}
else if ($gedit['admin'] == 1 AND $mgroup['addadmin'] != 1 AND $member['gid'] != $ra)
{
echo "<br>Error Code 90: You cannot edit an Administrator group.<br>
<a href='index.php?idx=6'>Back</a>";
}
else
{
echo $skin['contentheader'];
echo "Now editing group " . $gedit['name'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "
<form action='index.php' method='post'>
<input type='hidden' name='id' value='" . $_GET['id'] . "' />
<input type='hidden' name='sum' value='61'>
<table border='0'>
<tr><td>Group Name</td><td><input type='text' maxlength='32' name='name' value='" . $gedit['name'] . "' /></td></tr>
<tr><td>Is this group banned?</td><td>";
if ($gedit['ban'] == 1)
{
echo "Yes<input type='radio' name='ban' value='1' checked='checked' />";
echo "No<input type='radio' name='ban' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='ban' value='1' />";
echo "No<input type='radio' name='ban' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Can this group view articles?</td><td>";
if ($gedit['viewarticles'] == 1)
{
echo "Yes<input type='radio' name='viewarticles' value='1' checked='checked' />";
echo "No<input type='radio' name='viewarticles' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='viewarticles' value='1' />";
echo "No<input type='radio' name='viewarticles' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Can send and recieve personal messages?</td><td>";
if ($gedit['canpm'] == 1)
{
echo "Yes<input type='radio' name='canpm' value='1' checked='checked' />";
echo "No<input type='radio' name='canpm' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='canpm' value='1' />";
echo "No<input type='radio' name='canpm' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Can edit their profile?</td><td>";
if ($gedit['editprofile'] == 1)
{
echo "Yes<input type='radio' name='editprofile' value='1' checked='checked' />";
echo "No<input type='radio' name='editprofile' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='editprofile' value='1' />";
echo "No<input type='radio' name='editprofile' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Is this group a staff member?</td><td>";
if  ($mgroup['addadmin'] == 1 OR $member['gid'] == $ra)
{
if ($gedit['isstaff'] == 1)
{
echo "Yes<input type='radio' name='isstaff' value='1' checked='checked' />";
echo "No<input type='radio' name='isstaff' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='isstaff' value='1' />";
echo "No<input type='radio' name='isstaff' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>Is an Administrative Group?</td><td>";
if ($gedit['admin'] == 1)
{
echo "Yes<input type='radio' name='admin' value='1' checked='checked' />";
echo "No<input type='radio' name='admin' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='admin' value='1' />";
echo "No<input type='radio' name='admin' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td colspan='2'><center>Ignore below if above is no</center></td></tr>";
if ($member['gid'] == $ra)
{
echo "<tr><td>Can add Administrators?</td><td>";
if ($gedit['addadmin'] == 1)
{
echo "Yes<input type='radio' name='addadmin' value='1' checked='checked' />";
echo "No<input type='radio' name='addadmin' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='addadmin' value='1' />";
echo "No<input type='radio' name='addadmin' value='0' checked='checked' /></td></tr>";
}
if ($mgroup['caneditmembers'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit members?</td><td>";
if ($gedit['caneditmembers'] == 1)
{
echo "Yes<input type='radio' name='caneditmembers' value='1' checked='checked' />";
echo "No<input type='radio' name='caneditmembers' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='caneditmembers' value='1' />";
echo "No<input type='radio' name='caneditmembers' value='0' checked='checked' /></td></tr>";
}
}
if ($mgroup['editarticles'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit articles?</td><td>";
if ($gedit['editarticles'] == 1)
{
echo "Yes<input type='radio' name='editarticles' value='1' checked='checked' />";
echo "No<input type='radio' name='editarticles' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='editarticles' value='1' />";
echo "No<input type='radio' name='editarticles' value='0' checked='checked' /></td></tr>";
}
}
if ($mgroup['edithome'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit homepage?</td><td>";
if ($gedit['edithome'] == 1)
{
echo "Yes<input type='radio' name='edithome' value='1' checked='checked' />";
echo "No<input type='radio' name='edithome' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='edithome' value='1' />";
echo "No<input type='radio' name='edithome' value='0' checked='checked' /></td></tr>";
}
}
echo "<tr><td>Can edit member groups?</td><td>";
if ($gedit['editgroups'] == 1)
{
echo "Yes<input type='radio' name='editgroups' value='1' checked='checked' />";
echo "No<input type='radio' name='editgroups' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='editgroups' value='1' />";
echo "No<input type='radio' name='editgroups' value='0' checked='checked' /></td></tr>";
}
if ($mgroup['editskin'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit skins?</td><td>";
if ($gedit['editskin'] == 1)
{
echo "Yes<input type='radio' name='editskin' value='1' checked='checked' />";
echo "No<input type='radio' name='editskin' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='editskin' value='1' />";
echo "No<input type='radio' name='editskin' value='0' checked='checked' /></td></tr>";
}
}
if ($mgroup['caneditgeneral'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can edit general settings?</td><td>";
if ($gedit['caneditgeneral'] == 1)
{
echo "Yes<input type='radio' name='caneditgeneral' value='1' checked='checked' />";
echo "No<input type='radio' name='caneditgeneral' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='caneditgeneral' value='1' />";
echo "No<input type='radio' name='caneditgeneral' value='0' checked='checked' /></td></tr>";
}
}
if ($mgroup['viewlogs'] == 1 OR $member['gid'] == $ra)
{
echo "<tr><td>Can view site logs?</td><td>";
if ($gedit['viewlogs'] == 1)
{
echo "Yes<input type='radio' name='viewlogs' value='1' checked='checked' />";
echo "No<input type='radio' name='viewlogs' value='0' /></td></tr>";
}
else
{
echo "Yes<input type='radio' name='viewlogs' value='1' />";
echo "No<input type='radio' name='viewlogs' value='0' checked='checked' /></td></tr>";
}
}
}
echo "<tr><td colspan='2'><center><input type='submit' name='submit' value='Update Group' /></center></td></tr></table></form>";
echo $skin['postcontenttext'];
}
}
}
}
}
?>