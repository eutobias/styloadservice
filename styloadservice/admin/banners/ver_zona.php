<?
require "lib/lib.secure.php";
include "banners/menu.php";

$pag_query=mysql_query("SELECT id from zonas where user_id='$_GET[u_id]'",$link_db);
$n_reg=mysql_num_rows($pag_query);
if (($n_reg%$config['num_pag_zona_admin']) == 0) {
$n_pag=$n_reg/$config['num_pag_zona_admin']; }
else { $n_pag=ceil($n_reg/$config['num_pag_zona_admin']); }

if (empty($_GET[pagina]) or $_GET[pagina]=="1") { $inicio=0; $pag=1; }
else { $inicio=$config['num_pag_zona_admin']*($_GET[pagina]-1); $pag=$_GET[pagina]; }

$r_zonas=mysql_query("SELECT * from zonas where user_id='$_GET[u_id]' order by id limit $inicio,$config[num_pag_zona_admin]",$link_db);
?>
<table border="0" cellspacing="2" cellpadding="0" align="center" width="350">
<? if ($n_reg=="0") { ?>
<tr>
<td class="cel_tit" align="center">Este usuario não tem nenhuma zona cadastrada.<br>Crie uma zona clicando em Nova Zona no menu acima.</td>
</tr>
</table>
<? } else { while ($zonas=mysql_fetch_array($r_zonas)) { ?>
<tr>
<td class="cel_tit_banner">
<table border="0" cellspacing="5" cellpadding="0" width="100%">
<tr>
<td width="100%"><?=$zonas[nome]?></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=<?=$_GET[u_id]?>&z_id=<?=$zonas[id]?>"><img src="../images/editar.gif" alt="Editar esta zona" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&subacao2=deletar_zona&u_id=<?=$_GET[u_id]?>&z_id=<?=$zonas[id]?>"><img src="../images/deletar.gif" alt="Deletar esta zona" border="0"></a></td>
</tr>
</table>
</td></tr>
<? } ?>
<tr><td align="center">
<?
if ($n_reg > $config['num_pag_zona_admin']) {
print "<center>";
print "<a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_zona&u_id=$_GET[u_id]&pagina=1\" class=\"menu\" title=\"Primeira\"><b><small>&laquo;-</small></b></a>";

for ($i=1;$i<=$n_pag;$i++) {
if ($i==$pag) { print " <small><b>[$i]</b></small> "; }
else print " <a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_zona&u_id=$_GET[u_id]&pagina=$i\" class=\"menu\"><small>[$i]</small></a> ";
}

print "<a href=\"?acao=usuarios&subacao=dados_gerais&subacao2=ver_zona&u_id=$_GET[u_id]pagina=$n_pag\" class=\"menu\" title=\"Última\"><small><b>-&raquo;</b></small></a>";
print "</center>";
} ?>
</table>
<? } ?>