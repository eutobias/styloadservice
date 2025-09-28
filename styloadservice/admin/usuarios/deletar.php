<?
require "lib/lib.secure.php"; 
if ($_GET[subacao]=="deletar") {
if ($_POST[db_deletar]=="ok") {
v_form($_POST[db_deletar],"Campo Oculto","?acao=dados&subacao=editar");
if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios\">";
    include "msg_erro.php";
    exit; }

$del_anunciantes=mysql_query("DELETE FROM anunciantes WHERE user_id='$_GET[u_id]'",$link_db);
$del_zona=mysql_query("DELETE FROM zonas WHERE user_id='$_GET[u_id]'",$link_db);
$del_banners=mysql_query("DELETE FROM banners WHERE user_id='$_GET[u_id]'",$link_db);
$del_login=mysql_query("DELETE FROM login WHERE id='$_GET[u_id]'",$link_db);

if ($del_zona) {
$msg_erro="
Conta deletada com sucesso.<br>
Redirecionando se não quiser esperar <a href=?acao=usuarios>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios\">";
    include "msg_erro.php";
    exit; }
} else {
?>
<form method="post" action="?acao=usuarios&subacao=deletar&u_id=<?=$_GET[u_id]?>">
<input type="hidden" value="ok" name="db_deletar" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Deletar conta de usuario</b></td>
</tr>
<tr>
<td>Tem certeza que você quer deletar a conta e descadastra-lo do sistema?<br>
<b>Todos os banners os banners, zonas e anunciantes desse usuario serão deletados e não poderão ser recuperados.</b><br>
Deseja prosseguir?</td>
</tr>
<tr>
<td align="center">
<input type="submit" value="Sim" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/>
&nbsp;&nbsp;&nbsp;
<input type="button" value="Não" Onclick="location.href='?';" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/>
</td>
</tr>
</table>
<? } } ?>