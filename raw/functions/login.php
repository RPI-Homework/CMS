<?php
if ($cookie == 1)
	{
	echo "
    <div class='boxone'>
	<b><font class='userbar'><a href='index.php?idx=4'><font class='userbar'>Profile</font></a>  -  <a href='index.php?idx=6'><font class='userbar'>Members</font></a>  -   <a href='index.php'><font class='userbar'>Home</font></a> -  <a href='index.php?idx=3'><font class='userbar'>Log Out</font></a></font></b>
    </div>
    <div class='boxtwo'>
	<table>
	<tr>
	<td colspan='2'>
	<font class='username'>" . $member['user'] . " </font>";
	if ($mgroup['admin'] == 1 OR $member['gid'] == $ra) { echo "<a href='admin/index.php'><font class='userstats'>[" . $mgroup['name'] . "]</font></a>"; }
	elseif ($mgroup['isstaff'] == 1) { echo "<a href='staff.php'><font class='userstats'>[" . $mgroup['name'] . "]</font></a>"; }
	elseif ($ipban == 1 OR $banned == 1) { echo "<font class='userstats'>[Banned]</font>"; }
	else { echo "<font class='userstats'>[" . $mgroup['name'] . "]</font>"; }
	echo "
	</td>
	</tr>
	<tr>
	<td>";
	if ($tempban == 1)
	{
	$date = gmdate($ldate, $member['unban'] + 3600 * $member['time']);
	echo "<font class='bantext'>You have been banned until:<br>" . $date . "<br>For The reason:<br>" . $member['reason'] . "</font>";	
	}
	elseif ($ipban == 1 OR $banned == 1)
	{
	echo "<font class='bantext'>You have been permanently banned for:<br>" . $member['reason'] . "</font>";
	}
	else
	{
	$fcheck = mysql_query("SELECT * FROM `friends` WHERE `member` = " . $member['id'])or die("<br>Error Code 600: Please contact the Root Administrator immediately.<br>" . mysql_error());
	$friends = mysql_num_rows($fcheck);
	$pcheck = mysql_query("SELECT `read` FROM `pm` WHERE `to` = " . $member['id'])or die("<br>Error Code 601: Please contact the Root Administrator immediately.<br>" . mysql_error());
	$pm = mysql_num_rows($pcheck);
	while ($pms = mysql_fetch_assoc($pcheck))
	{
	if ($pms['read'] == 0)
	{
	$newmessage = 1;
	}
	}
	$icheck = mysql_query("SELECT * FROM `images` WHERE `member` = " . $member['id'])or die("<br>Error Code 602: Please contact the Root Administrator immediately.<br>" . mysql_error());
	$images = mysql_num_rows($icheck);
	$acheck = mysql_query("SELECT * FROM `articles` WHERE `author` = '" . $member['user'] . "'")or die("<br>Error Code 603: Please contact the Root Administrator immediately.<br>" . mysql_error());
	$articles = mysql_num_rows($acheck);
	$mcheck = mysql_query("SELECT * FROM `movies` WHERE `member` = " . $member['id'])or die("<br>Error Code 604: Please contact the Root Administrator immediately.<br>" . mysql_error());
	$movies = mysql_num_rows($mcheck);
    echo "<ul><li class='userstats'><a href='index.php'><font class='userstats'>Friends: " . $friends . "</a></li>";
	if ($newmessage == 1)
	{
    echo "<li class='userstats'><a href='index.php?idx=5'><b><font class='userstats'>Inbox: " . $pm . "</font></b></a></li>";
	}
	else
	{
    echo "<li class='userstats'><a href='index.php?idx=5'><font class='userstats'>Inbox: " . $pm . "</font></a></li>";
	}
    echo "<li class='userstats'><a href='index.php?idx=8'><font class='userstats'>Images: " . $images . "</a></li>
    <li class='userstats'><a href='index.php'><font class='userstats'>Articles: " . $articles . "</a></li>
    <li class='userstats'><a href='index.php?idx=9'><font class='userstats'>Movies: " . $movies . "</a></li>";
	}
	echo "</ul>
	</td>
	<td align='center'>";
	if (!$member['avatar'])
{}
else
{
echo "	<ul><img src='" . $member['avatar'] . "' height='" . $member['aheight'] . "' width='" . $member['awidth'] . "'></ul>";
}
	echo "</td>
	</tr>
	</table>
    </div>";
	}
else
	{
	echo "
    <div class='boxone'>
    <h3 class='userbar'>Please Log In</h3>
    </div>
    <div class='boxtwo'>
 	<font class='username'>Guest</font>
	<ul>
	<form action='index.php' method='post'>
	<input type='hidden' name='sum' value='1'>
	<table><tr><td>
	<font class='userstats'>Username</font></td><td><input type='text' name='username' maxlength='33'  size='15' /><br>
	</td></tr><td>	
	<font class='userstats'>Password</font></td><td><input type='password' name='password' maxlength='33' size='15' /><br>
	</td></tr></table>
	<table align='center' valign='top'><tr><td>
	<input type='submit' name='loggin' value='Login' />
	</form></td><td>
	<form action='index.php' method='get'>
	<input type='hidden' name='idx' value='2'>
	<input type='submit' name='reg' value='Register' />
	</form></td></tr></table>
	</ul>
    </div>";
	}
?>