<?
require "lib/lib.secure.php";
include "banners/menu.php";

if ($_POST[db_deletar]=="ok") {

v_form($_POST[db_deletar],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]");
v_form($_POST[z_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]");
v_form($_POST[z_nome],"Nome da Zona","?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]");

$del_zona=mysql_query("DELETE FROM zonas WHERE id='$_POST[z_id]'",$link_db);
$del_banners=mysql_query("DELETE FROM banners WHERE zona_id='$_POST[z_id]'",$link_db);

if ($del_zona) {
$msg_erro="A zona <b>".$_POST[z_nome]."</b> foi deletada com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }
} else {
if (!$_GET[z_id]) {
$msg_erro="Nenhuma zona selecionada.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]\">";
    include "msg_erro.php";
    exit; }
v_form($_GET[z_id],"Campo Oculto","?");
$sel_zona=mysql_query("SELECT id,nome FROM zonas WHERE id='$_GET[z_id]'",$link_db);
$zona=mysql_fetch_array($sel_zona);
?>
<form method="post" action="?acao=usuarios&subacao=dados_gerais&subacao2=deletar_zona&u_id=<?=$_GET[u_id]?>&z_id=<?=$_GET[z_id]?>">
<input type="hidden" value="ok" name="db_deletar" />
<input type="hidden" value="<?=$zona[id]?>" name="z_id" />
<input type="hidden" value="<?=$zona[nome]?>" name="z_nome" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Deletar Zonas</b></td>
</tr>
<tr>
<td>Tem certeza que você quer deletar a zona <b><?=$zona[nome]?></b>?<br>
<b>Todos os banners cadastrados nesta zona também serão deletados.</b><br>
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
<? } ?>