<?php
if ($cookie == 1)
{
if ($mgroup['caneditgeneral'] != 1 AND $member['gid'] != $ra)
{
header("Location: index.php");
}
else
{
$linkcheck = mysql_query("SELECT * FROM `menu` WHERE `id` = " . $_GET['dlink'])or die("<br>Error Code 252: Please contact the Root Administrator immediately.<br>" . mysql_error());
$num2 = mysql_num_rows($linkcheck);
if ($num2 == 0)
{
echo "<br>Error Code 22: Link ID does not exist.<br>
<a href='index.php?idx=2'>Back</a>";
}
else
{
$link = mysql_fetch_array( $linkcheck );
echo $skin['contentheader'];
echo "Deleting Link " . $link['name'];
echo $skin['postcontentheader'];
echo $skin['contenttext'];
echo "
<table><tr><td valign='top'>
Are you sure?</td><td>
<form action='index.php' method='post'>
<input type='hidden' name='dlid' value='" . $_GET['dlink'] ."'/>
<input type='hidden' name='sum' value='22'/>
<input type='submit' name='dldel' value='Yes'/>
</form>
</td><td>
<form action='index.php?idx=2' method='post'>
<input type='submit' name='none' value='No'/>
</form>
</td></tr></table>
";
echo $skin['postcontenttext'];
}
}
}
?>