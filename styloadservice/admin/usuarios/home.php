<?
require "lib/lib.secure.php";
?>

<table border="0" cellspacing="2" cellpadding="0" align="center" width="100%">
<tr><td class="cel_menu" align="center" colspan="2"><b>Editando os usuarios do sistema</b></td></tr>
<tr><td colspan="2" height="10"></td></tr>

<tr>
<td colspan="2" align="right">
<table border="0" cellspacing="0" cellpaddin="0">
<tr><td class="cel_menu"><b><a href="?acao=usuarios&subacao=nova_conta">Adicionar novo usuario</a></b></td></tr>
</table>
</td>
</tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Usuarios Cadastrados</b></td>
</tr>
<?
$pag_query=mysql_query("SELECT id FROM login",$link_db);
$n_reg=mysql_num_rows($pag_query);
if (($n_reg%$config['num_pag_user_admin']) == 0) { $n_pag=$n_reg/$config['num_pag_user_admin']; }
else { $n_pag=ceil($n_reg/$config['num_pag_user_admin']); }

if (empty($_GET[pagina]) or $_GET[pagina]=="1") { $inicio=0; $pag=1; }
else { $inicio=$config['num_pag_user_admin']*($_GET[pagina]-1); $pag=$_GET[pagina]; }

$user_q=mysql_query("SELECT id,nome,u_acesso,u_a_time,nivel,ativo FROM login order by nome limit $inicio,$config[num_pag_user_admin]",$link_db);
while ($user=mysql_fetch_array($user_q)) {
?>
<tr>
<td class="cel_banner" width="100%"><small><b> &raquo; </b></small><?=$user[nome]?>
<br><small><?=$user[u_acesso] ?><? if ($user[nivel] > 0) { ?> - <b>Administrador</b><? } ?><b></small></td>
<td class="cel_tit_banner">

<table border="0" cellspacing="2" cellpadding="0">
<tr>
<td><a href="?acao=usuarios&subacao=detalhes&u_id=<?=$user[id]?>"><img alt="Detalhes do Usuario" src="../images/detalhes.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=dados_gerais&u_id=<?=$user[id]?>"><img alt="Ver os banners,zonas e anunciantes deste usuario." src="../images/busca.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=editar&u_id=<?=$user[id]?>"><img alt="Editar Usuario" src="../images/editar.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=deletar&u_id=<?=$user[id]?>"><img alt="Deletar Usuario" src="../images/deletar.gif" border="0"></a></td>
<? if ($user[ativo]=="1") { ?>
<td><a href="?acao=usuarios&subacao=ap_des&u_id=<?=$user[id]?>&act=d"><img alt="Desaprovar Usuario" src="../images/desativar.gif" border="0"></a></td>
<? }  else { ?>
<td><a href="?acao=usuarios&subacao=ap_des&u_id=<?=$user[id]?>&act=a"><img alt="Aprovar Usuario" src="../images/ativar.gif" border="0"></a></td>
<? } ?>
</tr>
</table>
</td>
</tr>
<? } ?>
<tr>
<td colspan="2" align="center">
<?
if ($n_reg > $config['num_pag_user_admin']) {
print "<a href=\"?acao=usuarios&pagina=1\" class=\"menu\" title=\"Primeira\"><b><small>&laquo;-</small></b></a>";

for ($i=1;$i<=$n_pag;$i++) {
if ($i==$pag) { print " <small><b>[$i]</b></small> "; }
else print " <a href=\"?acao=usuarios&pagina=$i\" class=\"menu\"><small>[$i]</small></a> ";
}

print "<a href=\"?acao=usuarios&pagina=$n_pag\" class=\"menu\" title=\"Última\"><small><b>-&raquo;</b></small></a>";
}
?>
</td>
</tr>
</table>