<?
session_start();
require "lib/lib.conexao.php";
require_once ("lib/lib.funcoes.php");
$i_tempo=gt();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$config[site_nome]?> - Powered by StyloAdService v<?=$config[versao]?></title>
<link rel="stylesheet" type="text/css" href="estilos.css" />
<? if ($_SESSION['user_logado']=="ok") { ?>
<script src="lib.menu.js"></script>
<script type="text/javascript">
<!--
var listMenu = new FSMenu('listMenu', true, 'display', 'block', 'none');
listMenu.showDelay = 200;
//listMenu.hideDelay = 500;
listMenu.cssLitClass = 'highlighted';

var fsmOL = window.onload;
window.onload = function()
{
 if (fsmOL) fsmOL();
 activateMenu("listMenu", "listMenuRoot");
}

function activateMenu(objName, id)
{
 if (!isDOM) return;
 var a, ul, mRoot = getRef(id), nodes, count = 1;
 var items = mRoot.getElementsByTagName('li');
 for (var i = 0; i < items.length; i++)
 {
  nodes = items[i].childNodes;
  if (!nodes) continue;
  a = ul = null;
  if (nodes) for (var n = 0; n < nodes.length; n++)
  {
   if (!nodes[n].nodeName) continue;
   if (nodes[n].nodeName == 'A') a = nodes[n];
   if (nodes[n].nodeName == 'UL') ul = nodes[n];
   if (a && ul)
   {
    var menuID = objName + '-id-' + count++,
     mOver = new Function(objName + '.show("' + menuID + '", this)'),
     mOut = new Function(objName + '.hide("' + menuID + '")');
    // You may wish to do more processing here, for instance dynamically hide the UL tags
    // and leave them visible by default in the CSS, for better accessibility?
    ul.setAttribute('id', menuID);
    if (a.addEventListener)
    {
     a.addEventListener('mouseover', mOver, false);
     a.addEventListener('mouseout', mOut, false);
    }
    else
    {
     a.onmouseover = mOver;
     a.onmouseout = mOut;
    }
   }
  }
 }
}

var divMenu = new FSMenu('divMenu', false, 'visibility', 'visible', 'hidden');
divMenu.cssLitClass = 'highlighted';
menu.showDelay = 0;
menu.hideDelay = 1000;

function redireciona ( pag ) {
     window.location= pag;
     }
//-->
</SCRIPT>
<? } ?>
</head>
<body topmargin="10" leftmargin="0" bgcolor="#FFFFFF">

<table width="730" align="center" border="0" cellspacing="3" cellpadding="0">
<tr>
<td class="cel_topo"><a href="<?=$config[site_url]?>"><img src="images/logo.gif" border="0" alt="<?=$config[nome_site]?> - Powered by StyloAdService" ></a></td>
</tr>
<tr>
<td bgcolor="#FFA800" class="cel_menu">
<? if ($_SESSION['user_logado']=="ok") { ?>
<table align="center" border="0" cellspacing="0" width="700" cellpadding="0">
<td width="225">
Olá <b><?=$_SESSION[user_login]?></b> (<a href="?acao=logout" class="menu">Sair</a>)
<? if ($_SESSION[user_nivel]=="1") { ?>
· (<b><a href="admin/index.php" class="menu">Administração</a></b>)
<? } ?>
</td>
<td width="10"></td>
<td align="right">
<a href="?" class="menu">Home</a> ·
<a href="?acao=anunciantes" class="menu">Anunciantes</a> ·
<a href="?acao=banner&subacao=adicionar" class="menu">Novo Banner</a> ·
<a href="?acao=zonas&subacao=adicionar" class="menu">Nova Zona</a> ·
<a href="#" onmouseover="divMenu.show('Seus_dados', this, -40, 20)"
 onmouseout="divMenu.hide('Seus_dados')" class="menu">Sua Conta</a>
 </td></tr>
<div class="menudiv_h" id="Seus_dados" style="width:116px;padding:1px;z-index:10;">
  <div class="menudiv"><a href="?acao=gerar_codigo">Gerar código</a></div>
<? if ($config[user_alterar_dados]=="S") { ?>
  <div class="menudiv"><a href="?acao=dados&subacao=editar">Editar seus dados</a></div>
<? } ?>
  <div class="menudiv"><a href="?acao=dados&subacao=deletar">Deletar sua conta</a></div>
</div>
</table>
</td></tr>
<? } else { ?>
<table align="center" border="0" cellspacing="0" width="688" cellpadding="0">
<td width="250"></td>
<td align="right">
<a href="?" class="menu">Home</a>
<? if ($config[aceitar_cadastro]=="S") { ?> ·
<a href="?acao=cadastro" class="menu">Cadastre-se</a> ·
<a href="?acao=termos_de_uso" class="menu">Termos de Uso</a>
<? } ?>
· <a href="?acao=login" class="menu">Login</a>
<? if ($config[contato_email]=="S") { ?> ·
<a href="?acao=fale_conosco" class="menu">Fale Conosco</a>
<? } ?>
</td></tr>
</table>
<? } ?>
</td>
</tr>
<tr><td>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td class="cel_tit_banner"><small>Publicidade</small></td>
<td width="400"></td>
<td></td>
<td width="122" class="cel_tit_banner">Hospedado por:</td>
</tr>
<tr>
<td colspan="2"  width="470" height="62">
<!--Inicio do código gerado em Styloweb.org -->
<!--Fim do código gerado em Styloweb.org -->
</td>
<td width="5"></td>
<td width="122" class="cel_publicidade" height="62" style="padding:0;">

</td>
</tr>
</table>
</td></tr>
<? if ($_SESSION['user_logado']=="ok") { ?>
<tr>
<td class="cel_tit"><b><small>
<? if (empty($_SESSION[p_acesso])) { ?>
É a sua primeira visita ao sistema.<br>
<? } else { ?>
Sua última visita foi <?=str_replace(" - "," às ",$_SESSION[p_acesso])?>.<br>
<? } ?>
Hoje são <? include "lib/lib.data.php"; echo $data_c; ?>
</small></b></i>
</td></tr>
<? } ?>
<tr>
<td class="cel_tit">
<?
if (file_exists("instalar.php")) {
?>
<center>
<div style="width:400px;padding:20px;text-align:justify;border-style:dashed;border-width:1px;border-color:#CC3300;background-color:#FFD7D7;">
<font color="#CC3300">
<center><b>Cuidado !!!<B></center><br>
Delete o arquivo instalar.php, enquanto esse arquivo existir o sistema não funcionará.
</font>
</div>
</center>
<? } else {
include "lib/lib.querystring.php";
}
?>
</td>
</tr>
<tr>
<td colspan="3" class="cel_menu"><b>Estatíticas do Site.</b></td>
</tr>
<?
$c_r=mysql_query("SELECT id FROM login",$link_db);
$c=mysql_num_rows($c_r);
$b_r=mysql_query("SELECT id FROM banners",$link_db);
$b=mysql_num_rows($b_r);
$z_r=mysql_query("SELECT id FROM zonas");
$z=mysql_num_rows($z_r);
$a_r=mysql_query("SELECT id FROM anunciantes");
$a=mysql_num_rows($a_r);
?>
<tr>
<td colspan="3" class="cel_tit">
Total de Usuarios online no momento: <? include "online.php"; ?><br>
Total de Usuarios Cadastrados: <?=$c?><br>
Total de Banners Cadastrados: <?=$b?><br>
Total de Zonas de publicidade cadastradas: <?=$z?><br>
Total de Anunciantes cadastrados: <?=$a?><br>
Média de Banners por usuario: <?=round($b/$c,2)?><br>
Média de Zonas de publicidade por usuario: <?=round($z/$c,2)?><br>
Média de Anunciantes por usuario: <?=round($a/$c,2)?><br>
</td>
</tr>
<tr><td>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td class="cel_tit_banner"><small>Publicidade</small></td>
<td width="400"></td>
<td></td>
<td width="122"></td>
</tr>
<tr>
<td colspan="2" class="cel_publicidade" width="470" height="62" style="padding:0;">
<!--Inicio do código gerado em Styloweb.org -->

<!--Fim do código gerado em Styloweb.org -->
</td>
<td width="5"></td>
<td class="cel_publicidade" width="122" height="62" style="padding:0;">
<!--Inicio do código gerado em Styloweb.org -->

<!--Fim do código gerado em Styloweb.org -->
</td>
</tr>
</table>
</td></tr>
<tr>
<td align="center" colspan="2">
<?
$f_tempo=gt();
$t_tempo=$f_tempo-$i_tempo;
?>
Página gerada em <?=round($t_tempo,4)?> segundos.<br>
Powered by StyloAdService <?=$config['versao']?> - Copyright 2004<br>
Desenvolvido por <a href="http://styloweb.org" target="_blank">Styloweb.org</b>
</td>
</tr>
</table>

</body>
</html>