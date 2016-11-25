<?php
if ($cookie == 1)
{
$check = mysql_query("SELECT * FROM `skin` WHERE `id` = " . $user['skin'])or die(sql(3) . mysql_error());
$skin = mysql_fetch_array( $check );
}
else
{
$check = mysql_query("SELECT * FROM `skin` WHERE `id` = " . $general['skin'])or die(sql(3) . mysql_error());
$skin = mysql_fetch_array( $check );
}
$skin['content'] = str_replace("<%NAME%>", $general['name'], $skin['content']);
$skin['content'] = str_replace("<%CSS%>", $skin['css'], $skin['content']);
$menu = explode("<%MENU%>", $skin['content']);
if (preg_match("/\<%CONTENT%\>/", $menu[0]))
{
$contents = TRUE;
$content = explode("<%CONTENT%>", $menu[0]);
}
else
{
$contents = FALSE;
$content = explode("<%CONTENT%>", $menu[1]);
}
?>