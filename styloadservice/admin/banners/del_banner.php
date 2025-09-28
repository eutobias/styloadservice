<?
require "lib/lib.secure.php";
include "banners/menu.php";

if ($_POST[db_deletar]=="ok") {
v_form($_POST[db_deletar],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[b_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");

$del_zona=mysql_query("DELETE FROM banners WHERE id='$_POST[b_id]'",$link_db);

if ($del_zona) {
$msg_erro="Banner deletado com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]\">";
    include "msg_erro.php";
    exit; }
} else {
if (!$_GET[b_id] && $_GET[u_id]) {
$msg_erro="Nenhum banner selecionada.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]\">";
    include "msg_erro.php";
    exit; }
v_form($_GET[b_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$_GET[b_id]?>");
v_form($_GET[u_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$_GET[b_id]?>");
?>
<form method="post" action="?acao=usuarios&subacao=dados_gerais&subacao2=deletar_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$_GET[b_id]?>">
<input type="hidden" value="ok" name="db_deletar" />
<input type="hidden" value="<?=$_GET[b_id]?>" name="b_id" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Deletar Banners</b></td>
</tr>
<tr>
<td>Tem certeza que você quer deletar esse banner</b>?<br>
<b>Após ser deletado ele não poderá ser recuperado.</b><br>
Deseja prosseguir?</td>
</tr>
<tr>
<td align="center">
<input type="submit" value="Sim" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/>
&nbsp;&nbsp;&nbsp;
<input type="button" value="Não" Onclick="location.href='?acao=usuarios&subacao=dados_gerais&subacao2=deletar_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$banner[id]?>';" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/>
</td>
</tr>
</table>
<? } ?>