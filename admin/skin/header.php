<?php
if ($cookie == 1)
{
echo "<html>
<title>
" . $general['name'] . "
</title>
<head>
" . $skin['header'] . "
</head>
" . $skin['banner'] . "
";
}
else
{
$skincheck = mysql_query("SELECT * FROM `adminskin` WHERE `id` = " . $general['adminskin'])or die("<br>Error Code 628: Please contact the Root Administrator immediately.<br>");
$skin = mysql_fetch_array( $skincheck );
echo "<html>
<title>
" . $general['name'] . "
</title>
<head>
" . $skin['header'] . "
</head>
" . $skin['banner'] . "
";
}
?>