<?
if ($_SESSION['user_logado']=="ok") {
require "lib/lib.secure.php";

if ($_GET[action]=="ver_banners") {
if (!empty($_GET[z_id])) {
v_form($_GET[z_id],"Campo Oculto","?acao=anunciantes");
$r_banner=mysql_query("SELECT * from banners where user_id='$_SESSION[user_id]' and zona_id='$_GET[z_id]' order by id desc",$link_db);
$n_banner=mysql_num_rows($r_banner);
$msg="Nenhum banner cadastrado nesta zona.<br>
Cadastre um banner clicando em Novo Banner no menu acima.";
}
if (!empty($_GET[a_id])) {
v_form($_GET[a_id],"Campo Oculto","?acao=anunciantes");
$r_banner=mysql_query("SELECT * from banners where user_id='$_SESSION[user_id]' and anunciante='$_GET[a_id]' order by id desc",$link_db);
$n_banner=mysql_num_rows($r_banner);
$msg="Nenhum banner cadastrado para este anunciante.<br>
Cadastre um banner clicando em Novo Banner no menu acima.";
}

if ($n_banner=="0") { ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td class="cel_tit_banner" align="center" width="300">
<?=$msg?>
</td>
</tr>
</table>
<? } else {
while($banner=mysql_fetch_array($r_banner)) {
?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td class="cel_tit_banner" align="right">
<table border="0" cellspacing="2" cellpadding="0">
<tr>
<td><a href="?acao=banner&subacao=editar&b_id=<?=$banner[id]?>"><img alt="Editar Banner" src="images/editar.gif" border="0"></a></td>
<td><a href="?acao=banner&subacao=editar&b_id=<?=$banner[id]?>">Editar</a></td>
<td width="20">&nbsp;</td>
<td><a href="?acao=banner&subacao=deletar&b_id=<?=$banner[id]?>"><img alt="Deletar Banner" src="images/deletar.gif" border="0"></a></td>
<td><a href="?acao=banner&subacao=deletar&b_id=<?=$banner[id]?>">Deletar</a></td>
<? if ($banner[ativo]=="S") { ?>
<td width="20">&nbsp;</td>
<td><a href="?acao=banner&subacao=desativar&b_id=<?=$banner[id]?>"><img alt="Desativar Banner" src="images/desativar.gif" border="0"></a></td>
<td><a href="?acao=banner&subacao=desativar&b_id=<?=$banner[id]?>">Desativar</a></td>
<? }  else { ?>
<td width="20">&nbsp;</td>
<td><a href="?acao=banner&subacao=ativar&b_id=<?=$banner[id]?>"><img alt="Ativar Banner" src="images/ativar.gif" border="0"></a></td>
<td><a href="?acao=banner&subacao=ativar&b_id=<?=$banner[id]?>">Ativar</a></td>
<? } ?>

</tr>
</table>
</td>
<td class="cel_tit_banner">Views</td>
<td class="cel_tit_banner">Clicks</td>
</tr>
<tr>
<td class="cel_banner" align="center" width="<?=$banner[largura]+2?>" height="<?=$banner[altura]+2?>">
<?
if ($banner[tipo]=="flash") {
print "
<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"$banner[largura]\" height=\"$banner[altura]\">
  <param name=\"movie\" value=\"$banner[url]\">
  <param name=\"quality\" value=\"high\">
  <param name=\"scale\" value=\"exactfit\">
  <embed src=\"$banner[url]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" scale=\"exactfit\" width=\"$banner[largura]\" height=\"$banner[altura]\" ></embed>
</object>";
} else {
print "<img border=\"0\" src=\"$banner[url]\" width=\"$banner[largura]\" height=\"$banner[altura]\" />";
} ?>
</td>
<td class="cel_banner" align="center"><?=$banner[views]?></td>
<td class="cel_banner" align="center"><?=$banner[click]?></td>
</tr>
</table>
<? } } }
else {
$r_zonas=mysql_query("SELECT * from zonas where user_id='$_SESSION[user_id]' order by id desc",$link_db);
$n_zonas=mysql_num_rows($r_zonas); ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td class="cel_menu" align="center"><b>Zonas de publicidade do site</b></td>
</tr>
<? if ($n_zonas=="0") { ?>
<tr>
<td class="cel_tit" align="center">Você não tem nenhuma zona cadastrada.<br>Crie uma zona clicando em Nova Zona no menu acima.</td>
</tr>
<? } else { while ($zonas=mysql_fetch_array($r_zonas)) { ?>
<tr>
<td class="cel_tit_banner" align="right">
<table border="0" cellspacing="5" cellpadding="0">
<tr>
<td width="300" align="left"><b><a href="?action=ver_banners&z_id=<?=$zonas[id]?>" title="Ver Banners desta zona"><?=$zonas[nome]?></a></b></td>
<td><a href="?action=ver_banners&z_id=<?=$zonas[id]?>"><img src="images/expand.gif" alt="Ver Banners desta zona" border="0"></a></td>
<td><a href="?acao=zonas&subacao=editar&z_id=<?=$zonas[id]?>"><img src="images/editar.gif" alt="Editar esta zona" border="0"></a></td>
<td><a href="?acao=zonas&subacao=deletar&z_id=<?=$zonas[id]?>"><img src="images/deletar.gif" alt="Deletar esta zona" border="0"></a></td>
</tr>
</table>
</td></tr>
<? } } ?>
</table>
<? } }
else { ?>
<table border="0" cellspacing="5" cellpadding="0" width="100%">
<tr>
<td width="70%" class="cel_menu" align="center"><b>StyloADService</b></td>
<td width="30%" class="cel_menu" align="center"><b>Últimos 15 Cadastros</b></td>
</tr>
<tr>
<td valign="top">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td class="cel_tit">
Olá usuario seja bem vindo ao nosso sistema.<br>
Se você já é cadastrado <a href=?acao=login>clique aqui</a> para logar-se.<br>
Se não for <a href=?acao=cadastro>clique aqui</a> para cadastrar-se.<br><br>

Gostou desse sistema? Quer este script? <a href="?acao=fale_conosco">Fale conosco</a>.<br>
Quer anunciar no site? <a href="?acao=fale_conosco">Fale conosco</a>.
</td></tr>
</table>
</td>
<td valign="top">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="cel_tit">
<?
$login_r=mysql_query("SELECT id,nome FROM login ORDER BY 'id' DESC LIMIT 15",$link_db);
$i=1;
while($login=mysql_fetch_row($login_r)) {
echo $i." - <b>".$login[1]."</b><br />";
$i++;
}
?>
</td></tr>
</table>
</td>
</tr>
<tR><td colspan="3" height="10"></td></tr>
</table>


<? } ?>