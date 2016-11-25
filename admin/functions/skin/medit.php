<?php
if ($cookie == 1)
{
if ($mgroup['editskin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `memberskin` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 555: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 == 0)
{
echo "<br>Error Code 151: Invalid skin ID.<br>
<a href='index.php?idx=9'>Back</a>";
}
else
{
$sedit = mysql_fetch_array( $check3 );
//-------------------------------
//Root Admin Edit
//-------------------------------
echo $skin['contentheader'];
echo "Now editing skin " . $sedit['skin'] . ".";
echo $skin['postcontentheader'];
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='94' />";
echo $skin['contenttext'];
echo "<table><tr><td>Skin Name</td><td><input type='text' name='skin' value='" . $sedit['skin'] . "' /></td></tr>
<tr><td>Author</td><td><input type='text' name='author' value='" . $sedit['author'] . "' /></td></tr></table>";
echo "&lt;html&gt;<br>
&lt;title&gt;<br>
" . $general['name'] . "<br>
&lt;/title&gt;<br>
&lt;head&gt;";
echo "
<textarea rows='6' cols='75' name='header'>" . $sedit['header'] . "</textarea>
<br>
&lt;/head&gt;<br>
<textarea rows='6' cols='75' name='banner'>" . $sedit['banner'] . "</textarea><br>
------Below is excluded in the log in------
<br>
<textarea rows='6' cols='75' name='login'>" . $sedit['login'] . "</textarea><br>
Log in Box
<br>
<textarea rows='3' cols='75' name='prelogin'>" . $sedit['prelogin'] . "</textarea><br>
Now Logged in as " . $mgroup['name'] . ":
<br>
<textarea rows='3' cols='75' name='prename'>" . $sedit['prename'] . "</textarea><br>
" . $member['user'] . "
<br>
<textarea rows='3' cols='75' name='prelogout'>" . $sedit['prelogout'] . "</textarea><br>
[Logout]
<br>
<textarea rows='3' cols='75' name='postlogin'>" . $sedit['postlogin'] . "</textarea><br>
<textarea rows='3' cols='75' name='menu'>" . $sedit['menu'] . "</textarea><br>
Menu Box
<br>
<textarea rows='3' cols='75' name='menutitles'>" . $sedit['menutitles'] . "</textarea><br>
[Menu Title]
<br>
<textarea rows='3' cols='75' name='postmenu'>" . $sedit['postmenu'] . "</textarea><br>
<textarea rows='3' cols='75' name='menulinks'>" . $sedit['menulinks'] . "</textarea><br>
<textarea rows='3' cols='75' name='eachlink'>" . $sedit['eachlink'] . "</textarea><br>
[Menu Links]
<br>
<textarea rows='3' cols='75' name='posteachlink'>" . $sedit['posteachlink'] . "</textarea><br>
<textarea rows='3' cols='75' name='postmenulinks'>" . $sedit['postmenulinks'] . "</textarea><br>
<textarea rows='3' cols='75' name='loginas'>" . $sedit['loginas'] . "</textarea><br>";
if ($member['gid'] == $ra)
{
echo "You are a Root Administrator.";
}
else
{
echo "You are an Administrator.";
}
echo "<br>
<textarea rows='3' cols='75' name='postloginas'>" . $sedit['postloginas'] . "</textarea><br>
------Above is excluded in the log in------
<br>
<textarea rows='6' cols='75' name='content'>" . $sedit['content'] . "</textarea><br>
Content Box
<br>
<textarea rows='3' cols='75' name='contentheader'>" . $sedit['contentheader'] . "</textarea><br>
[Content Header]
<br>
<textarea rows='3' cols='75' name='postcontentheader'>" . $sedit['postcontentheader'] . "</textarea><br>
<textarea rows='3' cols='75' name='contenttext'>" . $sedit['contenttext'] . "</textarea><br>
[Content Body]
<br>
<textarea rows='3' cols='75' name='postcontenttext'>" . $sedit['postcontenttext'] . "</textarea><br>
<textarea rows='6' cols='75' name='copyright'>" . $sedit['copyright'] . "</textarea><br>
[Copyright]
<br>
<textarea rows='6' cols='75' name='footer'>" . $sedit['footer'] . "</textarea><br>
&lt;/html&gt;";

echo "<dl><dt>Is the skin selectable?</dt>";
if ($sedit['selectable'] == 1)
{
echo "<dd>Yes<input type='radio' name='selectable' value='1' checked='checked' />";
echo "No<input type='radio' name='selectable' value='0' /></dd></dl>";
}
else
{
echo "<dd>Yes<input type='radio' name='selectable' value='1' />";
echo "No<input type='radio' name='selectable' value='0' checked='checked' /></dd></dl>";
}
echo"<input type='hidden' name='id' value='" . $_GET['id'] . "' />
<input type='submit' value='Update Skin' />
</form>";

echo $skin['postcontenttext'];
}
}
}
?>