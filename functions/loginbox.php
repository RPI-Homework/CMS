<?php
if ($function == 1)
{
if ($cookie == 1)
{
echo $skin['login'];
echo $skin['prelogin'];
echo "Now Logged in as " . $mgroup['name'] . ":";
echo $skin['prename'];
echo $member['user'];
echo $skin['prelogout'];
echo "[<a href='" . $logout . "'>Logout</a>]";
echo $skin['postlogin'];
}
else
{
echo $skin['login'];
echo "<center><form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table><tr><td>Username</td><td><input type='text' name='username' maxlength='33'  size='15' /></td></tr>
<tr><td>Password</td><td><input type='password' name='password' maxlength='33' size='15' /></td></tr>
<tr><td colspan='2'><center><input type='submit' name='loggin' value='Login' />
</form>
<table><form action='" . $register . "' method='post'>
<input type='submit' name='reg' value='Register' />
</form></table></center></td></tr></table></center>
";
echo $skin['postlogin'];
}
}
?>