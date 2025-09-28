<? require "lib/lib.secure.php";
if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }
$dados_r=mysql_query("SELECT * FROM login WHERE id='$_GET[u_id]'",$link_db);
$dados=mysql_fetch_array($dados_r);
?>
<table border="0" cellspacing="4" width="500" cellpadding="0" align="center">
<tr>
<td colspan="2" class="cel_menu" align="center"><b>Dados do usuario <?$nome=explode(" ",$dados[nome]); print $nome[0];?></b></td>
</tr>

<tr>
<td colspan="2" align="right">

<table border="0" cellspacing="0" cellpadding="0" class="cel_tit">
<tr><td><b><small>&raquo;</small> Atalhos</b></td>
<td>
<table border="0" cellspacing="2" cellpadding="0">
<tr>
<td><a href="?acao=usuarios&subacao=detalhes&u_id=<?=$dados[id]?>"><img alt="Detalhes do Usuario" src="../images/detalhes.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=editar&u_id=<?=$dados[id]?>"><img alt="Editar Usuario" src="../images/editar.gif" border="0"></a></td>
<td><a href="?acao=usuarios&subacao=deletar&u_id=<?=$dados[id]?>"><img alt="Deletar Usuario" src="../images/deletar.gif" border="0"></a></td>
<? if ($dados[ativo]=="1") { ?>
<td><a href="?acao=usuarios&subacao=ap_des&u_id=<?=$dados[id]?>&act=d"><img alt="Desaprovar Usuario" src="../images/desativar.gif" border="0"></a></td>
<? }  else { ?>
<td><a href="?acao=usuarios&subacao=ap_des&u_id=<?=$dados[id]?>&act=a"><img alt="Aprovar Usuario" src="../images/ativar.gif" border="0"></a></td>
<? } ?>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="2" class="cel_tit" align="center"><b>Seus Dados</b></td>
</tr>
<tr>
<td>Nome completo:</td>
<td><?=$dados[nome]?></td>
</tr>
<tr>
<td>E-mail:</td>
<td><?=$dados[email]?></td>
</tr>
<tr>
<td>Nome do site:</td>
<td><?=$dados[nome_site]?></td>
</tr>
<tr>
<td>URL do site:</td>
<td><?=$dados[url_site]?></td>
</tr>
<tr>
<td>Seus conhecimentos:</td>
<td><?=$dados[conhecimentos]?></td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Dados de login</b></td>
</tr>
<tr>
<td>Login:</td>
<td><?=$dados[login]?></td>
</tr>
<tr>
<td>Senha: (encryptada com md5)</td>
<td><?=$dados[senha]?></td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Dados complementares</b></td>
</tr>
<tr>
<td>Localidade:</td>
<td><?=$dados[local]?></td>
</tr>
<tr>
<td>Cep:</td>
<td><?=$dados[cep]?></td>
</tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Outras formas de contatos</b></td>
</tr>
<tr>
<td>Msn Messeger:</td>
<td><? if (empty($dados[msn])) { echo "Não informado"; } else { print $dados[msn]; }?></td>
</tr>
<tr>
<td>ICQ:</td>
<td><? if (empty($dados[icq])) { echo "Não informado"; } else { print $dados[icq]; }?></td>
</tr>
<tr>
<td>AIM:</td>
<td><? if (empty($dados[aim])) { echo "Não informado"; } else { print $dados[aim]; }?></td>
</tr>
<tr>
<td>Yahoo Messeger:</td>
<td><? if (empty($dados[yahoo])) { echo "Não informado"; } else { print $dados[yahoo]; }?></td>
</tr>
</table>