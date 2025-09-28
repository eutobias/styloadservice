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
</head>
<body topmargin="10" leftmargin="0" bgcolor="#FFFFFF">

<table width="730" align="center" border="0" cellspacing="3" cellpadding="0">
<tr>
<td class="cel_topo"><a href="<?=$config[site_url]?>"><img src="../images/logo.gif" border="0" alt="<?=$config[nome_site]?> - Powered by StyloAdService" ></a></td>
</tr>
<tr>
<td class="cel_menu">
<? if ($_SESSION['admin_logado']=="ok") { ?>
<table align="center" border="0" cellspacing="0" width="700" cellpadding="0">
<td width="225">
Olá <b><?=$_SESSION[admin_login]?></b> (<a href="?acao=logout" class="menu">Sair</a>)
</td>
<td width="10"></td>
<td align="right">
<a href="?" class="menu">Home</a> ·
<a href="?acao=edit_conf" class="menu">Configurações</a> ·
<a href="?acao=usuarios" class="menu">Usuarios</a> ·
<a href="?acao=stats" class="menu">Estatíticas</a>
 </td></tr>
</table>
</td></tr>
<? } ?>
</td>
</tr>
<tr><td>
</td></tr>
<? if ($_SESSION[admin_logado]=="ok") { ?>
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
<tr><td>
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