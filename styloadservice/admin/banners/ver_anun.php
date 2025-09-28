<?
require "lib/lib.secure.php";
include "banners/menu.php";

$pag_query=mysql_query("SELECT id from anunciantes where user_id='$_GET[u_id]'",$link_db);
$n_reg=mysql_num_rows($pag_query);
if (($n_reg%$config['num_pag_anun_admin']) == 0) {
$n_pag=$n_reg/$config['num_pag_anun_admin']; }
else { $n_pag=ceil($n_reg/$config['num_pag_anun_admin']); }

if (empty($_GET[pagina]) or $_GET[pagina]=="1") { $inicio=0; $pag=1; }
else { $inicio=$config['num_pag_anun_admin']*($_GET[pagina]-1); $pag=$_GET[pagina]; }

$r_anun=mysql_query("SELECT * from anunciantes where user_id='$_GET[u_id]' order by id limit $inicio,$config[num_pag_anun_admin]",$link_db);
?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<? if ($n_reg=="0") { ?>
<tr>
<td class="cel_tit" align="center">Este usuario não tem nenhum Anunciante cadastrado.</td>
</tr>
<? } else { while ($a=mysql_fetch_array($r_anun)) { ?>
<tr>
<td class="cel_tit_banner" align="right">
<table border="0" cellspacing="5" cellpadding="0">
<tr>
<td width="500" align="left"><b><?=$a[nome]?></b><br>
<small>Último acesso em: <?=str_replace(" - "," às ",$a[u_acesso])?></small></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=<?=$a[id]?>&u_id=<?=$_GET[u_id]?>"><img src="../images/editar.gif" alt="Editar este anunciante" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=deletar_anunciante&a_id=<?=$a[id]?>&u_id=<?=$_GET[u_id]?>"><img src="../images/deletar.gif" alt="Deletar este anunciante" border="0"></a></td>
</tr>
</table>
</td></tr>
<? } ?>
<tr><td align="center">
<?
if ($n_reg > $config['num_pag_anun_admin']) {
print "<center>";
print "<a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&u_id=$_GET[u_id]&pagina=1\" class=\"menu\" title=\"Primeira\"><b><small>&laquo;-</small></b></a>";

for ($i=1;$i<=$n_pag;$i++) {
if ($i==$pag) { print " <small><b>[$i]</b></small> "; }
else print " <a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&u_id=$_GET[u_id]&pagina=$i\" class=\"menu\"><small>[$i]</small></a> ";
}

print "<a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&u_id=$_GET[u_id]pagina=$n_pag\" class=\"menu\" title=\"Última\"><small><b>-&raquo;</b></small></a>";
print "</center>";
} } ?>
</table>