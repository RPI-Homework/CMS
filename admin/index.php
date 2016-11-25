<?php
$page = 1;
include "global.php";
include "cookie.php";
if ($cookie != 1)
{
include "login.php";
}
else
{
//----SQL
if ($_POST['sum'] == 1)
{
include "submit/general.php";
}
elseif ($_POST['sum'] == 2)
{
include "submit/notes.php";
}
elseif ($_POST['sum'] == 20)
{
include "submit/skin.php";
}
elseif ($_POST['sum'] == 21)
{
include "submit/links/deletec.php";
}
elseif ($_POST['sum'] == 22)
{
include "submit/links/deletel.php";
}
elseif ($_POST['sum'] == 23)
{
include "submit/links/orderc.php";
}
elseif ($_POST['sum'] == 24)
{
include "submit/links/orderl.php";
}
elseif ($_POST['sum'] == 25)
{
include "submit/links/editc.php";
}
elseif ($_POST['sum'] == 26)
{
include "submit/links/editl.php";
}
elseif ($_POST['sum'] == 27)
{
include "submit/links/addc.php";
}
elseif ($_POST['sum'] == 28)
{
include "submit/links/addl.php";
}
elseif ($_POST['sum'] == 32)
{
include "submit/administrators/edit.php";
}
elseif ($_POST['sum'] == 43)
{
include "submit/articles/edit.php";
}
elseif ($_POST['sum'] == 45)
{
include "submit/articles/add.php";
}
elseif ($_POST['sum'] == 46)
{
include "submit/articles/delete.php";
}
elseif ($_POST['sum'] == 51)
{
include "submit/articles/cata.php";
}
elseif ($_POST['sum'] == 52)
{
include "submit/articles/cate.php";
}
elseif ($_POST['sum'] == 53)
{
include "submit/articles/cato.php";
}
elseif ($_POST['sum'] == 54)
{
include "submit/articles/catd.php";
}
elseif ($_POST['sum'] == 61)
{
include "submit/groups/edit.php";
}
elseif ($_POST['sum'] == 62)
{
include "submit/groups/add.php";
}
elseif ($_POST['sum'] == 63)
{
include "submit/groups/delete.php";
}
elseif ($_POST['sum'] == 71)
{
include "submit/homepages/add.php";
}
elseif ($_POST['sum'] == 72)
{
include "submit/homepages/edit.php";
}
elseif ($_POST['sum'] == 73)
{
include "submit/homepages/delete.php";
}
elseif ($_POST['sum'] == 82)
{
include "submit/members/edit.php";
}
elseif ($_POST['sum'] == 83)
{
include "submit/members/delete.php";
}
elseif ($_POST['sum'] == 84)
{
include "submit/members/add.php";
}
elseif ($_POST['sum'] == 85)
{
include "submit/members/bana.php";
}
elseif ($_POST['sum'] == 86)
{
include "submit/members/band.php";
}
elseif ($_POST['sum'] == 91)
{
include "submit/skin/aadd.php";
}
elseif ($_POST['sum'] == 92)
{
include "submit/skin/madd.php";
}
elseif ($_POST['sum'] == 93)
{
include "submit/skin/aedit.php";
}
elseif ($_POST['sum'] == 94)
{
include "submit/skin/medit.php";
}
elseif ($_POST['sum'] == 95)
{
include "submit/skin/adel.php";
}
elseif ($_POST['sum'] == 96)
{
include "submit/skin/mdel.php";
}
//---------------------------------------------------------------------------
else
{
include $skinheader;
include "menu.php";
include $skincontent;
//----- Content
if ($_GET['idx'] == 1)
{
include "functions/general.php";
}
elseif ($_GET['idx'] == 2)
{
include "functions/links.php";
}
elseif ($_GET['idx'] == 21)
{
include "functions/links/deletec.php";
}
elseif ($_GET['idx'] == 22)
{
include "functions/links/deletel.php";
}
elseif ($_GET['idx'] == 23)
{
include "functions/links/orderc.php";
}
elseif ($_GET['idx'] == 24)
{
include "functions/links/orderl.php";
}
elseif ($_GET['idx'] == 25)
{
include "functions/links/editc.php";
}
elseif ($_GET['idx'] == 26)
{
include "functions/links/editl.php";
}
elseif ($_GET['idx'] == 27)
{
include "functions/links/addc.php";
}
elseif ($_GET['idx'] == 28)
{
include "functions/links/addl.php";
}
elseif ($_GET['idx'] == 3)
{
include "functions/administrators/home.php";
}
elseif ($_GET['idx'] == 31)
{
include "functions/administrators/search.php";
}
elseif ($_GET['idx'] == 32)
{
include "functions/administrators/edit.php";
}
elseif ($_GET['idx'] == 4)
{
include "functions/articles/edith.php";
}
elseif ($_GET['idx'] == 41)
{
include "functions/articles/search.php";
}
elseif ($_GET['idx'] == 42)
{
include "functions/articles/listall.php";
}
elseif ($_GET['idx'] == 43)
{
include "functions/articles/edit.php";
}
elseif ($_GET['idx'] == 44)
{
include "functions/articles/member.php";
}
elseif ($_GET['idx'] == 45)
{
include "functions/articles/add.php";
}
elseif ($_GET['idx'] == 46)
{
include "functions/articles/delete.php";
}
elseif ($_GET['idx'] == 5)
{
include "functions/articles/cat.php";
}
elseif ($_GET['idx'] == 51)
{
include "functions/articles/cata.php";
}
elseif ($_GET['idx'] == 52)
{
include "functions/articles/cate.php";
}
elseif ($_GET['idx'] == 53)
{
include "functions/articles/cato.php";
}
elseif ($_GET['idx'] == 54)
{
include "functions/articles/catd.php";
}
elseif ($_GET['idx'] == 6)
{
include "functions/groups/home.php";
}
elseif ($_GET['idx'] == 61)
{
include "functions/groups/edit.php";
}
elseif ($_GET['idx'] == 62)
{
include "functions/groups/add.php";
}
elseif ($_GET['idx'] == 63)
{
include "functions/groups/delete.php";
}
elseif ($_GET['idx'] == 7)
{
include "functions/homepages/home.php";
}
elseif ($_GET['idx'] == 71)
{
include "functions/homepages/add.php";
}
elseif ($_GET['idx'] == 72)
{
include "functions/homepages/edit.php";
}
elseif ($_GET['idx'] == 73)
{
include "functions/homepages/delete.php";
}
elseif ($_GET['idx'] == 8)
{
include "functions/members/home.php";
}
elseif ($_GET['idx'] == 81)
{
include "functions/members/search.php";
}
elseif ($_GET['idx'] == 82)
{
include "functions/members/edit.php";
}
elseif ($_GET['idx'] == 83)
{
include "functions/members/delete.php";
}
elseif ($_GET['idx'] == 84)
{
include "functions/members/add.php";
}
elseif ($_GET['idx'] == 85)
{
include "functions/members/ban.php";
}
elseif ($_GET['idx'] == 9)
{
include "functions/skin/home.php";
}
elseif ($_GET['idx'] == 91)
{
include "functions/skin/aadd.php";
}
elseif ($_GET['idx'] == 92)
{
include "functions/skin/madd.php";
}
elseif ($_GET['idx'] == 93)
{
include "functions/skin/aedit.php";
}
elseif ($_GET['idx'] == 94)
{
include "functions/skin/medit.php";
}
elseif ($_GET['idx'] == 95)
{
include "functions/skin/adel.php";
}
elseif ($_GET['idx'] == 96)
{
include "functions/skin/mdel.php";
}
else 
{
include "functions/home.php";
}
include $skinfooter;
}
}
?>