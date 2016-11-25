<?php
if ($function == 1)
{
if ($cookie == 0)
{
$register = "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='2'>
<table border='0'>
<tr><td>Username:</td><td>
<input type='text' name='username' maxlength='32'>
</td></tr>
<tr><td>Password:</td><td>
<input type='password' name='pass' maxlength='32'>
</td></tr>
<tr><td>Confirm Password:</td><td>
<input type='password' name='pass2' maxlength='32'>
</td></tr>
<tr><td>Email:</td><td>
<input type='text' name='email'>
</td></tr>
<tr><td>Confirm Email:</td><td>
<input type='text' name='email2'>
</td></tr>
<tr><td>Referral:</td><td>
<input type='text' name='referal'>
</td></tr>
<tr><th colspan=2><input type='submit' name='submit' value='Register'></th></tr> </table>
</form>";
if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] | !$_POST['email'] | !$_POST['email2']) 
{
echo "You did not fill everything out.";
echo $register;
}
else
{
$check = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['username'] . "'")or die("<br>Error Code 1013: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num = mysql_num_rows($check);
//-------------------------------
//username exists
//-------------------------------
if ($num != 0)
{
echo "The username " . $_POST['username'] . " is already in use.";
echo $register;
}
//-------------------------------
//password does not match
//-------------------------------
elseif ($_POST['pass'] != $_POST['pass2'])
{
echo "The passwords typed did not match.";
echo $register;
}
//-------------------------------
//emails do not match
//-------------------------------
elseif ($_POST['email'] != $_POST['email2'])
{
echo "The emails typed did not match.";
echo $register;
}
elseif (fnmatch('*@*.*', $_POST['email']))
{
$ip = getenv("REMOTE_ADDR");
$pass = md5($_POST['pass']);
$add_member = mysql_query("INSERT INTO `users` (`user`, `gid`, `password`, `email`, `ip`, `referal`, `date`, `time`, `rdate`, `sdate`) VALUES ('" . $_POST['username'] . "', '" . $general['membergroup'] . "', '" . $pass . "', '" . $_POST['email'] . "', '" . $ip . "', '" . $_POST['referal'] . "', '" . $general['date'] . "', '" . $general['time'] . "', " . gmmktime() . ", '" . $general['sdate'] . "')")or die(mysql_error());
$check = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['username'] . "'")or die("<br>Error Code 1014: Please contact the Root Administrator immediately.<br>" . mysql_error());
$member = mysql_fetch_array( $check );
$mlogin = mysql_query("INSERT INTO `" . $database . "`.`login` (`id` , `date`, `ip`)
VALUES ('" . $member['id'] . "', '" . gmmktime() . "', '" . $remoteip . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
$alogin = mysql_query("INSERT INTO `" . $database . "`.`alogin` (`id` , `date`, `ip`)
VALUES ('" . $member['id'] . "', '0', '" . $remoteip . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Register', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
//-------------------------------
//add cookie
//-------------------------------
$hour = time() + 604800;
setcookie(member_id   , $member['id']       , $hour);
setcookie(pass_hash   , $member['password'] , $hour);

//-------------------------------
//redirect home
//-------------------------------
header("Location: index.php");
}
else
{
echo "Please use a valid email.";
echo $register;
}
}
}
}
?>