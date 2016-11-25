<?php

if ($cookie == 1)
{
echo $skin['login'];
echo $skin['prelogin'];
echo "Now Logged in as " . $mgroup['name'] . ":";
echo $skin['prename'];
echo $member['user'];
echo $skin['prelogout'];
echo "[<a href='" . $logout . "'>Logout</a>]";
echo $skin['postlogin'];
echo $skin['menu'];
echo $skin['menutitles'];
echo "General";
echo $skin['postmenu'];
echo $skin['menulinks'];
echo "<a href='" . $index . "'>Administrator Index</a>";
echo $skin['betlinks'];
echo "<a href='" . $mdex . "'>Member Index</a>";
if ($mgroup['caneditgeneral'] == 1 OR $member['gid'] == $ra)
{
echo $skin['betlinks'];
echo "<a href='" . $setindex . "'>General Settings</a>";
echo $skin['betlinks'];
echo "<a href='" . $menuindex . "'>Menu Links</a>";
}
echo $skin['postmenulinks'];
if ($mgroup['addadmin'] == 1 OR $member['gid'] == $ra)
{
echo $skin['menutitles'];
echo "Administration";
echo $skin['postmenu'];
echo $skin['menulinks'];
echo "<a href='" . $adminsindex . "'>Add an Administrator</a>";
echo $skin['betlinks'];
echo "<a href='" . $adminsindex . "'>Edit an Administrator</a>";
echo $skin['postmenulinks'];
}
if ($mgroup['editarticles'] == 1 OR $member['gid'] == $ra)
{
echo $skin['menutitles'];
echo "Articles";
echo $skin['postmenu'];
echo $skin['menulinks'];
echo "<a href='" . $addarticleindex . "'>Add an Article</a>";
echo $skin['betlinks'];
echo "<a href='" . $articleindex . "'>Edit an Article</a>";
echo $skin['betlinks'];
echo "<a href='" . $catarticleindex . "'>Categories</a>";
echo $skin['betlinks'];
echo "<a href='" . $memarticleindex . "'>View Member Articles</a>";
echo $skin['betlinks'];
echo "<a href='" . $commentindex . "'>Edit Comments</a>";
echo $skin['postmenulinks'];
}
if ($mgroup['editgroups'] == 1 OR $member['gid'] == $ra)
{
echo $skin['menutitles'];
echo "Groups";
echo $skin['postmenu'];
echo $skin['menulinks'];
echo "<a href='" . $groupsindex . "'>Add a Member Group</a>";
echo $skin['betlinks'];
echo "<a href='" . $groupsindex . "'>Edit a Member Group</a>";
echo $skin['betlinks'];
echo "<a href='" . $groupsindex . "'>Delete a Member Group</a>";
echo $skin['postmenulinks'];
}
if ($mgroup['edithome'] == 1 OR $member['gid'] == $ra)
{
echo $skin['menutitles'];
echo "Homepage";
echo $skin['postmenu'];
echo $skin['menulinks'];
echo "<a href='" . $homeindex . "'>Add a Homepage</a>";
echo $skin['betlinks'];
echo "<a href='" . $homeindex . "'>Edit a Homepage</a>";
echo $skin['betlinks'];
echo "<a href='" . $homeindex . "'>Delete a Homepage</a>";
echo $skin['postmenulinks'];
}
if ($mgroup['caneditmembers'] == 1 OR $member['gid'] == $ra)
{
echo $skin['menutitles'];
echo "Members";
echo $skin['postmenu'];
echo $skin['menulinks'];
echo "<a href='" . $addmembersindex . "'>Add a Member</a>";
echo $skin['betlinks'];
echo "<a href='" . $membersindex . "'>Edit a Member</a>";
echo $skin['betlinks'];
echo "<a href='" . $listmembersindex . "'>List all Members</a>";
echo $skin['betlinks'];
echo "<a href='" . $delmembersindex . "'>Delete a Member</a>";
echo $skin['betlinks'];
echo "<a href='" . $ipbanindex . "'>IP Ban</a>";
echo $skin['postmenulinks'];
}
if ($mgroup['editarticles'] == 1 OR $member['gid'] == $ra)
{
echo $skin['menutitles'];
echo "Skins";
echo $skin['postmenu'];
echo $skin['menulinks'];
echo "<a href='" . $skinindex . "'>Add a Skin</a>";
echo $skin['betlinks'];
echo "<a href='" . $skinindex . "'>Edit a Skin</a>";
echo $skin['betlinks'];
echo "<a href='" . $delskinindex . "'>Delete a Skin</a>";
echo $skin['postmenulinks'];
}
if ($member['gid'] == $ra)
{
echo $skin['loginas'];
echo "You are a Root Administrator.";
echo $skin['postloginas'];
}
else
{
echo $skin['loginas'];
echo "You are an Administrator.";
echo $skin['postloginas'];
}
}
?>