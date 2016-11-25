<?php
include 'global.php';
if ($ipban == 1 OR $banned == 1 OR $tempban == 1)
{
$homecheck = mysql_query("SELECT * FROM `homepage` WHERE `id` = " . $general['banhome'])or die("<br>Error Code 1012: Please contact the Root Administrator immediately.<br>" . mysql_error());
$home = mysql_fetch_array( $homecheck );
if ($contents)
{
echo $content[0];
echo $home['content'];
echo $content[1];
include "functions/login.php";
echo $menu[1];
}
else
{
echo $menu[0];
include "functions/login.php";
echo $content[0];
echo $home['content'];
echo $content[1];
}
}
else
{
if (isset($_POST['sum'])) 
{
$sum = array();
$sum[1] = "submit/login.php";
$sum[2] = "submit/register.php";
$sum[4] = 'submit/profile/profile.php';
$sum[41] = 'submit/profile/date.php';
$sum[42] = 'submit/profile/avatar.php';
$sum[43] = 'submit/profile/password.php';
$sum[44] = 'submit/profile/signature.php';
$sum[52] = 'submit/mail/send.php';
$sum[8] = 'submit/images/upload.php';
$sum[87] = 'submit/images/edit.php';
$sum[88] = 'submit/images/delete.php';
$sum[9] = 'submit/movies/upload.php';
$sum[97] = 'submit/movies/edit.php';
$sum[99] = 'submit/movies/delete.php';
if (is_null($sum[$_POST['sum']]))
{
goto("index.php");
}
else
{
include $sum[$_POST['sum']];
}
}
elseif ($_GET['idx'] == 3)
{
logout();
}
elseif (isset($_GET['idx'])) 
{
$idx = array();
include 'functions/top.php';
$idx[1] = "functions/login2.php";
$idx[2] = 'functions/register.php';
$idx[4] = 'functions/profile/profile.php';
$idx[41] = 'functions/profile/date.php';
$idx[42] = 'functions/profile/avatar.php';
$idx[43] = 'functions/profile/password.php';
$idx[44] = 'functions/profile/signature.php';
$idx[5] = 'functions/mail/inbox.php';
$idx[51] = 'functions/mail/sent.php';
$idx[52] = 'functions/mail/send.php';
$idx[6] = 'functions/member/view.php';
$idx[61] = 'functions/member/member.php';
$idx[8] = 'functions/images/home.php';
$idx[81] = 'functions/images/upload.php';
$idx[82] = 'functions/images/others.php';
$idx[87] = 'functions/images/edit.php';
$idx[9] = 'functions/movies/home.php';
$idx[91] = 'functions/movies/upload.php';
$idx[92] = 'functions/movies/others.php';
$idx[97] = 'functions/movies/edit.php';
$idx[71] = 'functions/article/create.php';
if (is_null($idx[$_GET['idx']]))
{
goto("index.php");
}
else
{
if ($contents)
{
echo $content[0];
include $idx[$_GET['idx']];
echo $content[1];
include "functions/login.php";
echo $menu[1];
}
else
{
echo $menu[0];
include "functions/login.php";
echo $content[0];
include $idx[$_GET['idx']];
echo $content[1];
}
}
}
elseif (isset($_GET['image']))
{
include 'functions/images/view.php';
}
elseif (isset($_GET['movie']))
{
include 'functions/movies/view.php';
}
elseif (isset($_GET['mail']))
{
include 'functions/mail/mail.php';
}
elseif (isset($_GET['mid']))
{
include 'functions/members/profile.php';
}
else
{
if ($contents)
{
echo $content[0];
include 'functions/home.php';
echo $content[1];
include "functions/login.php";
echo $menu[1];
}
else
{
echo $menu[0];
include "functions/login.php";
echo $content[0];
include 'functions/home.php';
echo $content[1];
}
}
echo "</div>
<div id='menu-column'>
<div class='sidebar'>
<!--   side content starts here	--!>";
include "functions/login.php";
echo "<div class='boxone'>
		user can put what they like here (extra links or something)
		, but have it come standard as the pay pal button
	</div>";

if (!$_GET['idx'] AND !$_GET['mid'] AND !$_GET['mail'] AND !$_GET['movie'] AND !$_GET['image'])
{
echo "<!-- x number of latest articles,  can you make it so the user can define X and also toggle between X latest articles / X latest members? --!>";

//big while loop
        echo "<div class='boxtwo'>";
$check1 = mysql_query("SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 0 , 5")or die(mysql_error());
while ($article = mysql_fetch_array( $check1 ))
{
   echo "<ul>
   <h5 class='postdate'>" . gmdate($sdate, $article['date'] + $time) . "</h5>
   <h5 class='postuser'>" . $article['author'] . "</h5>
   <li class='posttitle'>" . $article['name'] .  "</li>
   </ul>";
}
echo "</div>";
}
echo "<!--   side content ends here	--!>

      </div>
    </div>
  </div>

	<div id='footer'>
		<h4>
			<center>
				Copyright &copy; 2007-2008 <a href='http://givemehelp.net/'>GiveMeHelp.net</a>, All rights reserved.
  			</center>
		</h4>
	</div>

</body>
</html>";
}
?>