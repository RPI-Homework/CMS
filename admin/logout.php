<?php
$past = time() - 100;
setcookie(admin_id    , $member['id']       , $past , "/");
setcookie(pass_hash   , $member['password'] , $past , "/");
header("Location: index.php");
?>