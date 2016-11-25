<?php
if ($cookie == 1)
{
if ($mgroup['editarticles'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$check3 = mysql_query("SELECT * FROM `articles` WHERE `id` = " . $_GET['id'])or die("<br>Error Code 335: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($check3);
if ($num2 == 0)
{
echo "<br>Error Code 58: Article ID does not exist.<br>
<a href='index.php?idx=4'>Back</a>";
}
else
{
$adel = mysql_fetch_array( $check3 );
echo $skin['contentheader'];
echo "Deleteing " . $adel['name'] . ".";
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "<table><tr><td valign='top'>Are you sure?</td><td><form action='index.php' method='post'>
<input type='hidden' name='sum' value='46'>
<input type='hidden' name='adel' value='" . $adel['id'] . "' />
<input type='submit' name='del' value='Yes' /></form></td><td>
<form action='index.php?idx=4' method='post'>
<input type='submit' name='none' value='No' /></form></td></tr></table>";
echo $skin['postcontenttext'];
}
}
}
?>