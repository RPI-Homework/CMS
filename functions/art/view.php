<?php
if ($function == 1)
{
if (!$_GET['id'])
{
echo "<br>No article ID.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
//-------------------------------
//Rest of Page
//-------------------------------
$check3 = mysql_query("SELECT * FROM `articles` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 1041: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
$check4 = mysql_query("SELECT * FROM `comments` WHERE `article` = " . $_GET['id'])or die("<br>Error Code 1041: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num4 = mysql_num_rows($check4);
if ($num2 == 0)
{
echo "<br>Article ID does not exist.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
}
else
{
$art = mysql_fetch_array( $check3 );
//-------------------------------
//article edits
//-------------------------------
if ($art['public'] != 1)
{
echo $skin['contentheader'];
echo $art['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "This article is not yet available.<br>
<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
echo $skin['postcontenttext'];
}
//-------------------------------
//cannot view article
//-------------------------------
else if ($mgroup['viewarticles'] != 1 AND $member['gid'] != $ra)
{
if ($art['guestredirect'] == 1)
{
echo "<SCRIPT language='JavaScript'>
<!--
window.location=" . $art['redirectto'] . ";
//-->
</SCRIPT>";
}
else
{
echo $skin['contentheader'];
echo $art['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Created By: " . $art['author'] . "<br>";
if (!$art['edit'])
{}
else
{
echo "Edited By: " . $art['edit'] . "<br>";
}
echo $art['guestview'];
echo $skin['postcontenttext'];
}
}
//-------------------------------
//member only article
//-------------------------------
else if ($art['memberonly'] == 1)
{
if ($cookie != 1)
{
if ($art['guestredirect'] == 1)
{
echo "<SCRIPT language='JavaScript'>
<!--
window.location=" . $art['redirectto'] . ";
//-->
</SCRIPT>";
}
else
{
echo $skin['contentheader'];
echo $art['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Created By: " . $art['author'] . "<br>";
if (!$art['edit'])
{}
else
{
echo "Edited By: " . $art['edit'] . "<br>";
}
echo $art['article'];
if ($num4 != 0)
{
echo "<hr>
<table>";
while ($com = mysql_fetch_array( $check4 ))
{
$check5 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $com['member'])or die("<br>Error Code 1041: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num5 = mysql_num_rows($check5);
if ($num5 == 0)
{
$cmem['user'] = "Unknown User";
}
else
{
$cmem = mysql_fetch_array( $check5 );
}
echo "<tr><td>";
echo $com['comment'];
echo "</td></tr>
<tr><td align='right'>
Comment By: <a href='members.php?id=" . $com['member'] . "'>";
echo $cmem['user'];
echo "</a></td></tr>";
}
echo "<tr><td align='center'>
<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table><tr><td>
<input type='hidden' name='article' value='" . $_GET['id'] . "'>
<textarea rows='3' cols='50' name='comment'></textarea>
</td><tr><tr><td align='right'>
<input type='submit' value='Add Comment' />
</td></tr>
</table>
</form>
</td></tr>
</table>";
}
else
{
echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table><tr><td>
<input type='hidden' name='article' value='" . $_GET['id'] . "'>
<textarea rows='3' cols='50' name='comment'></textarea>
</td><tr><tr><td align='right'>
<input type='submit' value='Add Comment' />
</td></tr>
</table>
</form>";
}
echo $skin['postcontenttext'];
}
}
else
{
echo $skin['contentheader'];
echo $art['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Created By: " . $art['author'] . "<br>";
if (!$art['edit'])
{}
else
{
echo "Edited By: " . $art['edit'] . "<br>";
}
echo $art['article'];
if ($num4 != 0)
{
echo "<hr>
<table>";
while ($com = mysql_fetch_array( $check4 ))
{
$check5 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $com['member'])or die("<br>Error Code 1041: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num5 = mysql_num_rows($check5);
if ($num5 == 0)
{
$cmem['user'] = "Unknown User";
}
else
{
$cmem = mysql_fetch_array( $check5 );
}
echo "<tr><td>";
echo $com['comment'];
echo "</td></tr>
<tr><td align='right'>
Comment By: <a href='members.php?id=" . $com['member'] . "'>";
echo $cmem['user'];
echo "</a></td></tr>";
}
echo "<tr><td align='center'>
<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table><tr><td>
<input type='hidden' name='article' value='" . $_GET['id'] . "'>
<textarea rows='3' cols='50' name='comment'></textarea>
</td><tr><tr><td align='right'>
<input type='submit' value='Add Comment' />
</td></tr>
</table>
</form>
</td></tr>
</table>";
}
else
{
echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table><tr><td>
<input type='hidden' name='article' value='" . $_GET['id'] . "'>
<textarea rows='3' cols='50' name='comment'></textarea>
</td><tr><tr><td align='right'>
<input type='submit' value='Add Comment' />
</td></tr>
</table>
</form>";
}
echo $skin['postcontenttext'];
}
}
//-------------------------------
//else
//-------------------------------
else
{
echo $skin['contentheader'];
echo $art['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "Created By: " . $art['author'] . "<br>";
if (!$art['edit'])
{}
else
{
echo "Edited By: " . $art['edit'] . "<br>";
}
echo $art['article'];
if ($num4 != 0)
{
echo "<hr>
<table>";
while ($com = mysql_fetch_array( $check4 ))
{
$check5 = mysql_query("SELECT * FROM `users` WHERE `id` = " . $com['member'])or die("<br>Error Code 1041: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num5 = mysql_num_rows($check5);
if ($num5 == 0)
{
$cmem['user'] = "Unknown User";
}
else
{
$cmem = mysql_fetch_array( $check5 );
}
echo "<tr><td>";
echo $com['comment'];
echo "</td></tr>
<tr><td align='right'>
Comment By: <a href='members.php?id=" . $com['member'] . "'>";
echo $cmem['user'];
echo "</a></td></tr>";
}
echo "<tr><td align='center'>
<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table><tr><td>
<input type='hidden' name='article' value='" . $_GET['id'] . "'>
<textarea rows='3' cols='50' name='comment'></textarea>
</td><tr><tr><td align='right'>
<input type='submit' value='Add Comment' />
</td></tr>
</table>
</form>
</td></tr>
</table>";
}
else
{
echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>
<table><tr><td>
<input type='hidden' name='article' value='" . $_GET['id'] . "'>
<textarea rows='3' cols='50' name='comment'></textarea>
</td><tr><tr><td align='right'>
<input type='submit' value='Add Comment' />
</td></tr>
</table>
</form>";
}
echo $skin['postcontenttext'];
}
}
}
}
?>