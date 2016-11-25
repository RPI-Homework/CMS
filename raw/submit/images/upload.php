<?php
if ($function == 1)
{
if ($mgroup['images'] == 1)
{
$number = mysql_query("SELECT `id` FROM `images` ORDER BY `id` DESC LIMIT 0 , 1")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
$pages = mysql_num_rows($number);
if ($pages == 0)
{
$id = 1;
}
else
{
$num = mysql_fetch_array($number);
$id = $num['id'] + 1;
}
$type = array_pop(explode(".", $_FILES['image']['name']));
$name = $member['user'] . "_" . $id . "." . $type;
$target = "images/" . $name;
$ttarget = "images/tb_" . $name;
$size = $_FILES['image']['size'];
//This is our size condition
if ($size < $mgroup['ilimit'] * 1024)
{
//This is our limit file type condition
if ($type == 'gif' OR $type == 'jpeg' OR $type == 'pjpeg' OR $type == 'png' OR $type == 'gif' OR $type == 'jpg' OR $type == 'bmp')
{
if(copy($_FILES['image']['tmp_name'], $target))
{
list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
if ($width > $general['mawidth'] AND $height > $general['maheight'])
{
if ($width > $height)
{
$twidth = $general['thumbw'];
$theight = $height * ( $general['thumbh'] / $width );
}
if ($width < $height)
{
$twidth = $width * ( $general['thumbw'] / $height );
$theight = $general['thumbh'];
}
if ($width == $height)
{
$twidth = $general['thumbw'];
$theight = $general['thumbh'];
}
}
else
{
$twidth = $width;
$theight = $height;
}
if ($type == 'jpeg' OR $type == 'pjpeg' OR $type == 'jpg')
{
$src_img = imagecreatefromjpeg($target);
$resize = 1;
}
if ($type == 'png')
{
$src_img = imagecreatefrompng($target);
$resize = 1;
}
if ($type == 'gif')
{
$src_img = imagecreatefromgif($target);
$resize = 1;
}
if ($resize = 1)
{
$thumb = imagecreatetruecolor($twidth, $theight);
imagecopyresized($thumb, $src_img, 0, 0, 0, 0, $twidth, $theight, $width, $height);
if ($type == 'jpeg' OR $type == 'pjpeg' OR $type == 'jpg')
{
imagejpeg($thumb, $ttarget, 100);
}
if ($type == 'png')
{
imagepng($thumb, $ttarget, 0);
}
if ($type == 'gif')
{
imagegif($thumb, $ttarget);
}
}
else
{
$ttarget = 0;
}
$logs = mysql_query("INSERT INTO `" . $database . "`.`images` (`id` , `member` , `title` , `url` , `thumbnail` , `date`, `uploadnotes`)
VALUES (NULL , '" . $member['id'] . "', '" . $_POST['title'] . "', '" . $target . "', '" . $ttarget . "', '" . gmmktime() . "', '" . $_POST['uploadcomment'] . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
$logs2 = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Uploaded Image: " . $_POST['title'] . "', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=8");
}
}
}
}
}
?>