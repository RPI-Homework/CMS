<?php
if ($function == 1)
{
if (!$_GET['id'])
{
$_GET['id'] = $member['id'];
}
$mcheck = mysql_query("SELECT * FROM `users` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 1051: Please contact the Root Administrator immediately.<br>" . mysql_error());
$mem = mysql_fetch_array( $mcheck );
$gcheck = mysql_query("SELECT * FROM `group` WHERE `id` = " . $mem['gid'])or die("<br>Error Code 1052: Please contact the Root Administrator immediately.<br>" . mysql_error());
$gro = mysql_fetch_array( $gcheck );
$scheck = mysql_query("SELECT `skin` FROM `memberskin` WHERE `id` = " . $mem['skin'])or die("<br>Error Code 1053: Please contact the Root Administrator immediately.<br>" . mysql_error());
$sss = mysql_fetch_array( $scheck );
$lcheck = mysql_query("SELECT `date` FROM `login` WHERE `id` = " . $mem['id'])or die("<br>Error Code 1053: Please contact the Root Administrator immediately.<br>" . mysql_error());
$lll = mysql_fetch_array( $lcheck );
if ($mem['canpm'] == 1 AND $gro['canpm'] == 1)
{
$pm = "<a href='index.php?idx=52&id=" . $mem['id'] . "'>Send a PM</a>";
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
if ($mem['gid'] == $ra)
{
$staff = "Root Administrator";
}
else if ($gro['admin'] == 1)
{
$staff = "Administrator";
}
else if ($gro['isstaff'] == 1)
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
echo $mem['user'];
if (!$_GET['id'] OR $_GET['id'] == $member['id'])
{
echo "<br><div align='right'><a href='index.php?idx=6'>Find Other Users</a> - <a href='index.php?idx=4'>Edit Your Profile</a></div>";
echo "<center><a href='index.php?idx=9'>Edit Videos</a> - <a href='index.php?idx=8'>Edit Images</a> - <a href='index.php?idx=44'>Edit Signature</a> - <a href='index.php?idx=41'>Edit Dates</a> - <a href='index.php?idx=42'>Edit Avatar</a></center>";
}
else
{ 
echo "<br><div align='right'><a href='index.php?idx=6'>Find Other Users</a> - <a href='index.php?idx=61'>View Your Profile</a> - <a href='index.php?idx=4'>Edit Your Profile</a></div>";
echo "<center><a href='index.php?idx=9&id=" . $mem['id'] . "'>View Videos</a> - <a href='index.php?idx=8&id=" . $mem['id'] . "'>View Images</a> - <a href='index.php?'>View Articles</a> - <a href='index.php?'>Add to Friends</a> - <a href='index.php?idx=52&id=" . $mem['id'] . "'>Send PM</a></center>";
}
echo "<table width='100%'><tr><td align='center'>";
echo "General Information";
echo "</td><td align='center'>";
echo "Contact Information";
echo "</td></tr>";
echo "<tr><td>
<table width='100%'>
<tr><td>Username</td><td align='right'>
" . $mem['user'] . "</td></tr>
<tr><td>Group</td><td align='right'>
" . $gro['name'] . "</td></tr>
<tr><td>Last Active</td><td align='right'>
" . gmdate($sdate, $lll['date'] + $time) . "</td></tr>
<tr><td>Registered On</td><td align='right'>
" . gmdate($sdate, $mem['rdate'] + $time) . "</td></tr>
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
echo "Personal Information";
echo "</td><td align='center'>";
echo "Member Information";
echo "</td></tr>";
echo "<tr><td>
<table width='100%'>
<tr><td>Gender</td><td>
" . $gender . "</td></tr>
<tr><td>Birthday</td><td>
";
if ($mem['birthday'] != 0)
{
echo gmdate('F j, Y', $mem['birthday']);
}
echo "</td></tr>
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

$width = $mem['awidth'] * 1.5;
$height = $mem['aheight'] * 1.5;
echo "<img src='" . $mem['avatar'] . "' height='" . $height . "' width='" . $width . "' />";
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
?>