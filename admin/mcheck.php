<?php
if ($cookie == 1)
{
if ($mgroup['caneditmembers'] == 1 OR $member['gid'] == $ra)
{
$maccess = 1;
}
if ($mgroup['editarticles'] == 1 OR $member['gid'] == $ra)
{
$aaccess = 1;
}
if ($mgroup['edithome'] == 1 OR $member['gid'] == $ra)
{
$haccess = 1;
}
if ($mgroup['addadmin'] == 1 OR $member['gid'] == $ra)
{
$adaccess = 1;
}
if ($mgroup['editgroups'] == 1 OR $member['gid'] == $ra)
{
$graccess = 1;
}
if ($mgroup['editskin'] == 1 OR $member['gid'] == $ra)
{
$saccess = 1;
}
}
?>