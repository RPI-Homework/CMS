<?php
if ($function == 1)
{
if (!$member['id'])
{
header("Location: " . $_SERVER['PHP_SELF']);
}
else
{
$upmem = mysql_query("INSERT INTO `" . $database . "`.`comments` (`id` , `article` , `member` , `comment`)
VALUES (NULL , '" . $_POST['article'] . "', '" . $member['id'] . "', '" . $_POST['comment'] . "')")or die("<br>Error Code 1067: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: " . $_SERVER['PHP_SELF']);
}
}
?>