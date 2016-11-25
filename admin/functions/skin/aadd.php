<?php
if ($cookie == 1)
{
if ($mgroup['editskin'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `adminskin` WHERE `skin` = '" . $_GET['add'] . "'")or die("<br>Error Code 517: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 != 0)
{
echo "<br>Error Code 132: A skin with that name already exists.<br>
<a href='index.php?idx=9'>Back</a>";
}
else
{
//-------------------------------
//Root Admin Edit
//-------------------------------

echo $skin['contentheader'];
echo "Now adding skin " . $_GET['add'] . ".";
echo $skin['postcontentheader'];
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='91' />";
echo $skin['contenttext'];
echo "<table><tr><td>Skin Name</td><td><input type='text' name='skin' value='" . $_GET['add'] . "' /></td></tr>
<tr><td>Author</td><td><input type='text' name='author'  value='" . $member['user'] . "' /></td></tr></table>";
echo "&lt;html&gt;<br>
&lt;title&gt;<br>
" . $general['name'] . "<br>
&lt;/title&gt;<br>
&lt;head&gt;";
echo "
<textarea rows='6' cols='75' name='header'></textarea>
<br>
&lt;/head&gt;<br>
<textarea rows='6' cols='75' name='banner'></textarea><br>
------Below is excluded in the log in------
<br>
<textarea rows='6' cols='75' name='login'></textarea><br>
Log in Box
<br>
<textarea rows='3' cols='75' name='prelogin'></textarea><br>
Now Logged in as " . $mgroup['name'] . ":
<br>
<textarea rows='3' cols='75' name='prename'></textarea><br>
" . $member['user'] . "
<br>
<textarea rows='3' cols='75' name='prelogout'></textarea><br>
[Logout]
<br>
<textarea rows='3' cols='75' name='postlogin'></textarea><br>
<textarea rows='3' cols='75' name='menu'></textarea><br>
Menu Box
<br>
<textarea rows='3' cols='75' name='menutitles'></textarea><br>
[Menu Title]
<br>
<textarea rows='3' cols='75' name='postmenu'></textarea><br>
<textarea rows='3' cols='75' name='menulinks'></textarea><br>
[Menu Links]
<br>
<textarea rows='3' cols='75' name='betlinks'></textarea><br>
[Menu Links]
<br>
<textarea rows='3' cols='75' name='postmenulinks'></textarea><br>
<textarea rows='3' cols='75' name='loginas'></textarea><br>";
if ($member['gid'] == $ra)
{
echo "You are a Root Administrator.";
}
else
{
echo "You are an Administrator.";
}
echo "<br>
<textarea rows='3' cols='75' name='postloginas'></textarea><br>
------Above is excluded in the log in------
<br>
<textarea rows='6' cols='75' name='content'></textarea><br>
Content Box
<br>
<textarea rows='3' cols='75' name='contentheader'></textarea><br>
[Content Header]
<br>
<textarea rows='3' cols='75' name='postcontentheader'></textarea><br>
<textarea rows='3' cols='75' name='contenttext'></textarea><br>
[Content Body]
<br>
<textarea rows='3' cols='75' name='postcontenttext'></textarea><br>
<textarea rows='6' cols='75' name='copyright'></textarea><br>
[Copyright]
<br>
<textarea rows='6' cols='75' name='footer'></textarea><br>
&lt;/html&gt;";

echo "<dl><dt>Is the skin selectable?</dt>";
echo "<dd>Yes<input type='radio' name='selectable' value='1' checked='checked' />";
echo "No<input type='radio' name='selectable' value='0' /></dd></dl>";
echo"<input type='submit' value='Add Skin' />
</form>";
echo $skin['postcontenttext'];
}
}
}
?>