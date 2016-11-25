<?php
if ($function == 1)
{
if ($mgroup['movies'] == 1)
{
$number = mysql_query("SELECT `id` FROM `movies` ORDER BY `id` DESC LIMIT 0 , 1")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
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
$type = array_pop(explode(".", $_FILES['movie']['name']));
$name = $member['user'] . "_" . $id . "." . $type;
$target = "movies/" . $name;
$size = $_FILES['movie']['size'];
//This is our size condition
if ($size < $mgroup['mlimit'] * 1024)
{
//This is our limit file type condition
if ($type == 'mov' OR $type == 'wmv' OR $type == 'avi' OR $type == 'mp4' OR $type == 'mpeg' OR $type == 'mpg')
{
if(copy($_FILES['movie']['tmp_name'], $target))
{
$logs = mysql_query("INSERT INTO `" . $database . "`.`movies` (`id` , `member` , `title` , `url` , `thumbnail` , `date`, `uploadnotes`)
VALUES (NULL , '" . $member['id'] . "', '" . $_POST['title'] . "', '" . $target . "', '0', '" . gmmktime() . "', '" . $_POST['uploadcomment'] . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
$logs2 = mysql_query("INSERT INTO `" . $database . "`.`memberlogs` (`id` , `member` , `action` , `error` , `ip` , `date`)
VALUES (NULL , '" . $member['id'] . "', 'Uploaded Movie: " . $_POST['title'] . "', 'None', '" . $remoteip . "', '" . gmmktime() . "');")or die("<br>Error Code 1023: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php?idx=9");
}
}
}
}
}
?>