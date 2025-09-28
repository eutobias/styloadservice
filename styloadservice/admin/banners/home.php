<?
require "lib/lib.secure.php";

if ($_GET[subacao2]=="ver_banner") { include "banners/ver_banner.php"; }
elseif ($_GET[subacao2]=="editar_banner") { include "banners/edit_banner.php"; }
elseif ($_GET[subacao2]=="deletar_banner") { include "banners/del_banner.php"; }
elseif ($_GET[subacao2]=="at_des_banner") { include "banners/at_des_banner.php"; }
elseif ($_GET[subacao2]=="ver_zona") { include "banners/ver_zona.php"; }
elseif ($_GET[subacao2]=="editar_zona") { include "banners/edit_zona.php"; }
elseif ($_GET[subacao2]=="deletar_zona") { include "banners/del_zona.php"; }
elseif ($_GET[subacao2]=="ver_anunciante") { include "banners/ver_anun.php"; }
elseif ($_GET[subacao2]=="editar_anunciante") { include "banners/edit_anun.php"; }
elseif ($_GET[subacao2]=="deletar_anunciante") { include "banners/del_anun.php"; }
else {
include "banners/menu.php";
include "banners/stats_geral.php";
} ?>