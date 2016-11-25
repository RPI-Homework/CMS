<?php
if ($function == 1)
{
if (!$_GET['id'])
{

}
else
{
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 1051: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mem = mysql_fetch_array( $mcheck );
$gcheck = mysql_query("SELECT * FROM `group` WHERE `id` = " . $mem['gid'])or die("<br>Error Code 1052: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gro = mysql_fetch_array( $gcheck );
$scheck = mysql_query("SELECT `skin` FROM `memberskin` WHERE `id` = " . $mem['skin'])or die("<br>Error Code 1053: Please contact the Root Administrator immediately.<br>" . mysql_error());
$sss = mysql_fetch_array( $scheck );
if ($mem['canpm'] == 1 AND $gro['canpm'] == 1)
{
$pm = "<a href='inbox.php?id=" . $mem['id'] . "'>Send a PM</a>";
}
else
{
$pm = "No";
}
if ($mem['gender'] == 1)
{
$gender = "Male";
}
else
{
$gender = "Female";
}
if ($mem['editprofile'] == 1 AND $gro['editprofile'] == 1)
{
$profile = "Yes";
}
else
{
$profile = "No";
}
if ($member['id'] == $ra)
{
$staff = "Root Administrator";
}
else if ($member['admin'] == 1)
{
$staff = "Administrator";
}
else if ($member['isstaff'] == 1)
{
$staff = "Staff";
}
else
{
$staff = "None";
}
if (!$mem['referal']){$mem['referal'] = "None";}
if (!$mem['aim']){$mem['aim'] = "No Information";}
if (!$mem['msn']){$mem['msn'] = "No Information";}
if (!$mem['yim']){$mem['yim'] = "No Information";}
if (!$mem['icq']){$mem['icq'] = "No Information";}
if (!$mem['birthday']){$mem['birthday'] = "No Information";}
echo $skin['contentheader'];
echo $mem['user'];
echo $skin['postcontentheader'];
echo "<table width='100%'><tr><td align='center'>";
echo $skin['contentheader'];
echo "General Information";
echo $skin['postcontentheader'];
echo "</td><td align='center'>";
echo $skin['contentheader'];
echo "Contact Information";
echo $skin['postcontentheader'];
echo "</td></tr>";
echo "<tr><td>
<table width='100%'>
<tr><td>Username</td><td align='right'>
" . $mem['user'] . "</td></tr>
<tr><td>Group</td><td align='right'>
" . $gro['name'] . "</td></tr>
<tr><td>Can use PM system</td><td align='right'>
" . $pm . "</td></tr>
<tr><td>Can edit their Profile</td><td align='right'>
" . $profile . "</td></tr>
<tr><td>Staff Type</td><td align='right'>
" . $staff . "</td></tr>
</table>
</td><td>
<table width='100%'>
<tr><td>AIM</td><td align='right'>
" . $mem['aim'] . "</td></tr>
<tr><td>MSN</td><td align='right'>
" . $mem['msn'] . "</td></tr>
<tr><td>YIM</td><td align='right'>
" . $mem['yim'] . "</td></tr>
<tr><td>ICQ</td><td align='right'>
" . $mem['icq'] . "</td></tr>
<tr><td>Email</td><td align='right'>
" . $mem['email'] . "</td></tr>
</table>
</td></tr>";
echo "<tr><td align='center'>";
echo $skin['contentheader'];
echo "Personal Information";
echo $skin['postcontentheader'];
echo "</td><td align='center'>";
echo $skin['contentheader'];
echo "Member Information";
echo $skin['postcontentheader'];
echo "</td></tr>";
echo "<tr><td>
<table width='100%'>
<tr><td>Gender</td><td>
" . $gender . "</td></tr>
<tr><td>Birthday</td><td>
" . $mem['birthday'] . "</td></tr>
<tr><td>Location</td><td>
" . $mem['location'] . "
<tr><td>Homepage</td><td>
<a href='" . $mem['url'] . "'>" . $mem['url'] . "</a></td></tr>
<tr><td>Selected Skin</td><td>
" . $sss['skin'] . "</td></tr>
<tr><td>Referred By</td><td>
" . $mem['referal'] . "</td></tr>
<tr><td>Interests</td><td>
" . $mem['interests'] . "</td></tr>
</table>
</td><td>
<table width='100%'>
<tr><td colspan='2' align='center'>";
if ($mem['avatar'])
{
echo "<img src='" . $mem['avatar'] . "' height='150' width='150' />";
}
echo "</td></tr><tr><td>
Signature
</td><td>
" . $mem['signature'] . "
</td></tr>
</table>
</td></tr>
</table>";
}
}
?>