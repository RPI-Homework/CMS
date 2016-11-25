<?php
// Connects to Database
include "global.php";
$register = "<html><title>" . $gen['name'] . "</title><head>
" . $skin['header'] . "</head>
" . $skin['banner'] . "
" . $skin['content'] . "
" . $skin['contentheader'] . "
Register
" . $skin['postcontentheader'] . "
" . $skin['contenttext'] . "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
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
</form>
" . $skin['postcontenttext'];
//-----------------------
//Submitted?
//-----------------------
if (isset($_POST['submit']))
{
//-----------------------
//Left Any Out?
//-----------------------
if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] | !$_POST['email'] | !$_POST['email2']) 
{
echo "You did not fill everything out.";
echo $register;
include $skinfooter;
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

}
//-------------------------------
//password does not match
//-------------------------------
else if ($_POST['pass'] != $_POST['pass2'])
{
echo "The passwords typed did not match.";
echo $register;
include $skinfooter;
}
//-------------------------------
//emails do not match
//-------------------------------
else if ($_POST['email'] != $_POST['email2'])
{
echo "The emails typed did not match.";
echo $register;
include $skinfooter;
}
else
{
$checkit = mysql_query("SELECT * FROM `general` WHERE `id` = 1")or die(mysql_error());
$gen = mysql_fetch_array( $checkit );
$ip = getenv("REMOTE_ADDR");
$pass = md5($_POST['pass']);
$add_member = mysql_query("INSERT INTO `users` (`user`, `gid`, `password`, `email`, `ip`, `referal`, `date`) VALUES ('" . $_POST['username'] . "', '" . $gen['membergroup'] . "', '" . $pass . "', '" . $_POST['email'] . "', '" . $ip . "', '" . $_POST['referal'] . "', " . gmmktime() . ")")or die(mysql_error());
$check = mysql_query("SELECT * FROM `users` WHERE `user` = '" . $_POST['username'] . "'")or die("<br>Error Code 1014: Please contact the Root Administrator immediately.<br>" . mysql_error());
while($member = mysql_fetch_array( $check ))
{
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
}
}
}
else
//-------------------------------
//registration page
//-------------------------------
{
echo $register;
include $skinfooter;
}

?>