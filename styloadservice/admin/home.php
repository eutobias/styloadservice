<?
require "lib/lib.secure.php";

$temp_exp=time()-2592000;
$r_exp=mysql_query("SELECT id,nome FROM login WHERE u_a_time <= '$temp_exp'",$link_db);
$n_exp=mysql_num_rows($r_exp);
if ($n_exp != "0") {
if ($n_exp == "1") { $msg="O seguinte usuario não acessa sua conta a mais de 30 dias:"; }
else { $msg="Os seguintes usuarios não acessam suas contas a mais de 30 dias:"; }
?>
<table border="0" cellspacing="0" cellpadding="3" width="100%">
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<tr><td align="right">
<table border="0" cellspacing="0" cellpadding="0" width="250">
<td class="cel_menu" align="left"><small><b>&raquo;</b></small> <a class="menu" href="?acao=usuarios&subacao=deletar_todos"><b>Deletar todos</b></a></td></tr>
</table>
</td></tr>
<tr><td class="cel_erro"><b><?=$msg?></b><br>
<? while ($u_exp=mysql_fetch_array($r_exp)) { print "<small><b>&raquo;</b></small> <a href=\"?acao=usuarios&subacao=detalhes&u_id=".$u_exp[id]."\" class=\"erro\">".$u_exp[nome]."</a></b><br>"; } ?>
</td></tr>
</table>
<br>
<? }
$r_exp=mysql_query("SELECT id,nome FROM login WHERE  ativo != '1'",$link_db);
$n_exp=mysql_num_rows($r_exp);
if ($n_exp != "0") {
if ($n_exp == "1") { $msg="O usuario abaixo cadastrou-se recentemente:"; }
else { $msg="Os usuarios abaixo cadastraram-se recentemente:"; }
?>
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<tr><td align="right">
<table border="0" cellspacing="0" cellpadding="0" width="250">
<td class="cel_menu" align="left"><small><b>&raquo;</b></small> <a class="menu" href="?acao=usuarios&subacao=aprovar_todos"><b>Marcar todos como aprovados</b></a></td></tr>
</table>
</td></tr>
<tr><td class="cel_erro"><b><?=$msg?></b><br>
<? while ($u_exp=mysql_fetch_array($r_exp)) { print "<small><b>&raquo;</b></small> <a href=\"?acao=usuarios&subacao=detalhes&u_id=".$u_exp[id]."\" class=\"erro\">".$u_exp[nome]."</a></b><br>"; } ?>
</td></tr>
</table>
<? } ?>