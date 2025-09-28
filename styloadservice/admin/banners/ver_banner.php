<?
require "lib/lib.secure.php";
include "banners/menu.php";

if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }

$pag_query=mysql_query("SELECT id FROM banners where user_id='$_GET[u_id]'",$link_db);
$n_reg=mysql_num_rows($pag_query);
if (($n_reg%$config['num_pag_banner_admin']) == 0) {
$n_pag=$n_reg/$config['num_pag_banner_admin']; }
else { $n_pag=ceil($n_reg/$config['num_pag_banner_admin']); }

if (empty($_GET[pagina]) or $_GET[pagina]=="1") { $inicio=0; $pag=1; }
else { $inicio=$config['num_pag_banner_admin']*($_GET[pagina]-1); $pag=$_GET[pagina]; }

$r_banner=mysql_query("SELECT * from banners where user_id='$_GET[u_id]' order by id limit $inicio,$config[num_pag_banner_admin]",$link_db);

if ($n_reg=="0") { ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td class="cel_tit_banner" align="center" width="300">
Nenhum banner cadastrado para este usuario.
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
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>"><img alt="Editar Banner" src="../images/editar.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>">Editar</a></td>
<td width="20">&nbsp;</td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=deletar_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>"><img alt="Deletar Banner" src="../images/deletar.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=deletar_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>">Deletar</a></td>
<? if ($banner[ativo]=="S") { ?>
<td width="20">&nbsp;</td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=at_des_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>&act="><img alt="Desativar Banner" src="../images/desativar.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=at_des_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>&act=">Desativar</a></td>
<? }  else { ?>
<td width="20">&nbsp;</td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=at_des_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>&act=a"><img alt="Ativar Banner" src="../images/ativar.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=at_des_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>&act=a">Ativar</a></td>
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
<tr><td colspan="7" align="right">
<table border="0" cellspacing="2" cellpadding="0">
<tr>
<td class="cel_tit_banner">
Pertence ao anunciante <b><?=$banner[anunciante]?></b>
</td></tr>
</table>
</td></tr>
<tr><td colspan="7" height="15"></td></tr>
</table>
<? } }
if ($n_reg > $config['num_pag_banner_admin']) {
print "<center>";
print "<a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&pagina=1\" class=\"menu\" title=\"Primeira\"><b><small>&laquo;-</small></b></a>";

for ($i=1;$i<=$n_pag;$i++) {
if ($i==$pag) { print " <small><b>[$i]</b></small> "; }
else print " <a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&pagina=$i\" class=\"menu\"><small>[$i]</small></a> ";
}

print "<a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]pagina=$n_pag\" class=\"menu\" title=\"Última\"><small><b>-&raquo;</b></small></a>";
print "</center>";
}
?>