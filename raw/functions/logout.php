<?php
$past = time() - 100;
setcookie(member_id   , $member['id']       , $past);
setcookie(pass_hash   , $member['password'] , $past);
header("Location: index.php");
?>