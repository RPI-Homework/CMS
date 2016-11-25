<?php
if ($cookie == 1)
{
$update = mysql_query("UPDATE `" . $database . "`.`general` SET `adminnote` = '" . $_POST['adminnotes'] . "' WHERE `general`.`id` = 1 LIMIT 1")or die("<br>Error Code 220: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php");
}
?>