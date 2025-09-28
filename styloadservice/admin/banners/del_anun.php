<?
require "lib/lib.secure.php";
include "banners/menu.php";

if ($_POST[db_deletar]=="ok") {

v_form($_POST[db_deletar],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");v_form($_POST[a_id],"Campo Oculto","?acao=anunciantes");
v_form($_POST[nome],"Nome da Zona","?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");

if (!empty($_POST[del_banners])) {
v_form($_POST[del_banners],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
$del_banner=mysql_query("DELETE FROM banners WHERE anunciante='$_POST[nome]'",$link_db);
}
$del_zona=mysql_query("DELETE FROM anunciantes WHERE id='$_POST[a_id]'",$link_db);

if ($del_zona) {
$msg_erro="O Anunciante <b>".$_POST[nome]."</b> foi deletado com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]\">";
    include "msg_erro.php";
    exit; }
} else {
if (!$_GET[a_id]) {
$msg_erro="Nenhum Anunciante selecionado.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]\">";
    include "msg_erro.php";
    exit; }
v_form($_GET[a_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
$sel_a=mysql_query("SELECT id,nome FROM anunciantes WHERE id='$_GET[a_id]'",$link_db);
$a=mysql_fetch_array($sel_a);
?>
<form method="post" action="?acao=usuarios&subacao=dados_gerais&subacao2=deletar_anunciante&a_id=<?=$_GET[a_id]?>&u_id=<?=$_GET[u_id]?>">
<input type="hidden" value="ok" name="db_deletar" />
<input type="hidden" value="<?=$a[id]?>" name="a_id" />
<input type="hidden" value="<?=$a[nome]?>" name="nome" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="400" colspan="2" class="cel_menu" align="center"><b>Deletar Anunciantes</b></td>
</tr>
<tr>
<td>Tem certeza que você quer deletar o anunciante <b><?=$a[nome]?></b>?<br><br>
<b>Atenção: Se você marcar a caixa deletar banners deste anunciante todos os banners cadastrados para este anunciante serão deletados.</b><br>
<br>Deseja prosseguir?</td>
</tr>
<tr><td height="10"></td></tr>
<tr><td><input type="checkbox" checked name="del_banners" value="sim" /> Deletar banners deste anunciante?</td></tr>
<tr><td height="10"></td></tr><tr>
<td align="center">
<input type="submit" value="Sim" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/>
&nbsp;&nbsp;&nbsp;
<input type="button" value="Não" Onclick="location.href='?';" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/>
</td>
</tr>
</table>
<? } ?>