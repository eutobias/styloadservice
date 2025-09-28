<?
session_start();
require "lib/lib.conexao.php";
require_once ("../lib/lib.funcoes.php");
$i_tempo=gt();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$config[site_nome]?> - Powered by StyloAdService v<?=$config[versao]?></title>
<link rel="stylesheet" type="text/css" href="../estilos.css" />
<? if ($_SESSION['anun_logado']=="ok") { ?>
<script src="../lib.menu.js"></script>
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
<td class="cel_topo"><a href="<?=$config[site_url]?>"><img src="../images/logo.gif" border="0" alt="<?=$config[nome_site]?> - Powered by StyloAdService" ></a></td>
</tr>
<tr>
<td class="cel_menu">
<? if ($_SESSION['anun_logado']=="ok") { ?>
<table align="center" border="0" cellspacing="0" width="700" cellpadding="0">
<td width="225">
Olá <b><?=$_SESSION[anun_login]?></b> (<a href="?acao=logout" class="menu">Sair</a>)
</td>
<td width="10"></td>
<td align="right">
<a href="?" class="menu">Home</a> ·
<? if ($config[anun_alterar_dados]=="S") { ?><a href="?acao=edit" class="menu">Editar seus dados</a> · <? } ?>
<a href="?acao=stats" class="menu">Estatísticas</a>
</table>
</td></tr>
<? } ?>
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
<td colspan="2" class="cel_publicidade" width="470" height="62">
<!--Inicio do código gerado em Styloweb.org -->
<script language="javascript" src="http://www.styloweb.org/ads/ads_js.php?u_id=1&z_id=1"></script>
<!--Fim do código gerado em Styloweb.org -->
</td>
<td width="5"></td>
<td width="122" height="62">
</td>
</tr>
</table>
</td></tr>
<? if ($_SESSION[anun_logado]=="ok") { ?>
<tr>
<td class="cel_tit"><b><small>
<? if (empty($_SESSION[p_acesso])) { ?>
É a sua primeira visita ao sistema.<br>
<? } else { ?>
Sua última visita foi <?=str_replace(" - "," às ",$_SESSION[p_acesso])?>.<br>
<? } ?>
Hoje são <? include "../lib/lib.data.php"; echo $data_c; ?>
</small></b></i>
</td></tr>
<? } ?>
<tr>
<td class="cel_tit">
<?
include "lib/lib.querystring.php";
?>
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
<td colspan="2" class="cel_publicidade" width="470" height="62">
<!--Inicio do código gerado em Styloweb.org -->
<script language="javascript" src="http://www.styloweb.org/ads/ads_js.php?u_id=1&z_id=1"></script>
<!--Fim do código gerado em Styloweb.org -->
</td>
<td width="5"></td>
<td class="cel_publicidade" width="122" height="62">
<!--Inicio do código gerado em Styloweb.org -->
<script language="javascript" src="http://www.styloweb.org/ads/ads_js.php?u_id=1&z_id=2"></script>
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
Powered by StyloAdService 1.0beta - Copyright 2004<br>
Desenvolvido por <a href="http://styloweb.org" target="_blank">Styloweb.org</b>
</td>
</tr>
</table>

</body>
</html>