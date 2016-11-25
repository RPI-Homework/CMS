<?php
echo $_P0ST['auto'];
if ($function == 1)
{
if ($cookie == 1)
{
$resize = $_POST['aresize'];
$type = array_pop(explode(".", $_FILES['image']['name']));
if ($type == 'gif' OR $type == 'jpeg' OR $type == 'pjpeg' OR $type == 'png' OR $type == 'gif' OR $type == 'jpg' OR $type == 'bmp')
{
$_POST['avatar'] = "images/avatar/" . $member['id'] . "." . $type;
$size = $_FILES['image']['size'];
if ($size > $mgroup['alimit'] * 1024)
{
echo "Your file is too large.<br>";
}
else
{
move_uploaded_file($_FILES['image']['tmp_name'], $_POST['avatar']);
}
}
else
{
$type = array_pop(explode(".", $_POST['avatar']));
}
if ($type == 'gif' OR $type == 'jpeg' OR $type == 'pjpeg' OR $type == 'png' OR $type == 'gif' OR $type == 'jpg' OR $type == 'bmp')
{
//-----Auto Resize
list($width, $height) = getimagesize($_POST['avatar']);
if ($width > $general['mawidth'] AND $height > $general['maheight'])
{
if ($width > $height)
{
$twidth = $general['mawidth'];
$theight = $height * ( $general['maheight'] / $width );
}
if ($width < $height)
{
$twidth = $width * ( $general['mawidth'] / $height );
$theight = $general['maheight'];
}
if ($width == $height)
{
$twidth = $general['mawidth'];
$theight = $general['maheight'];
}
}
else
{
$twidth = $width;
$theight = $height;
}
//--Make sure not over general settings
if ($resize == 1)
{
$_POST['height'] = $theight;
$_POST['width'] = $twidth;
}
else
{
if (!$_POST['height']) { $_POST['height'] = $theight; }
if (!$_POST['width']) { $_POST['width'] = $twidth; }
}
if ($_POST['height'] > $general['maheight']) { $_POST['height'] = $general['maheight']; }
if ($_POST['width'] > $general['mawidth']) { $_POST['width'] = $general['mawidth']; }
//--Datebase update
$upmem = mysql_query("UPDATE `" . $database . "`.`users` SET
`avatar` = '" . $_POST['avatar'] . "',
`aheight` = '" . $_POST['height'] . "',
`awidth` = '" . $_POST['width'] . "'
WHERE `users`.`id` = " . $member['id'] . " LIMIT 1")or die("<br>Error Code 1067: Please contact the Root Administrator immediately.<br>" . mysql_error());
$logs = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Changed Avatar', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
}
header("Location: index.php?idx=42");
}
}
?>