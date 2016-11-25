<?php
if ($cookie == 1)
{
$update = mysql_query("UPDATE `" . $database . "`.`users` SET `adminskin` = '" . $_POST['adminskin'] . "' WHERE `users`.`id` = " . $admin_id . " LIMIT 1")or die("<br>Error Code 219: Please contact the Root Administrator immediately.<br>" . mysql_error());
header("Location: index.php");
}
?>