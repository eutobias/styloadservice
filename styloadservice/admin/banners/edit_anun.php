<?
require "lib/lib.secure.php";
include "banners/menu.php";

if ($_POST[db_editar]=="ok") {

v_form($_POST[a_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
v_form($_POST[db_editar],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
v_form($_POST[nome],"Nome do Responsável pelo site","?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
v_form($_POST[email],"E-mail do Responsável pelo site","?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
v_form($_POST[login],"Login","?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");

if (!empty($_POST[senha])) {
v_form($_POST[senha],"Senha","?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
$query="UPDATE anunciantes SET login='$_POST[login]', senha='".md5($_POST[senha])."' WHERE id='$_POST[a_id]'";
} else {
$query="UPDATE anunciantes SET login='$_POST[login]' WHERE id='$_POST[a_id]'";
}
if (!eregi("[@.]",$_POST[email])) {
$msg_erro="O Email digitado é inválido.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]\">";
    include "msg_erro.php";
    exit; }
$ed_a=mysql_query($query,$link_db);

if ($ed_a) {
$msg_erro="Anunciante editado com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]\">";
    include "msg_erro.php";
    exit; }
} else {
if (!$_GET[a_id]) {
$msg_erro="Nenhum Anunciante selecionado.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]\">";
    include "msg_erro.php";
    exit; }
v_form($_GET[a_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=$_GET[a_id]&u_id=$_GET[u_id]");
$sel_a=mysql_query("SELECT id,nome,login,email FROM anunciantes WHERE id='$_GET[a_id]'",$link_db);
$a=mysql_fetch_array($sel_a);
?>
<form method="post" action="?acao=usuarios&subacao=dados_gerais&subacao2=editar_anunciante&a_id=<?=$_GET[a_id]?>&u_id=<?=$_GET[u_id]?>">
<input type="hidden" value="ok" name="db_editar" />
<input type="hidden" value="<?=$a[id]?>" name="a_id" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Editar Anunciantes</b></td>
</tr>
<tr>
<td>Nome do site:</td>
<td><input type="text" value="<?=$a[nome]?>" readonly size="30" name="nome" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>E-mail do Responsável do site:</td>
<td><input type="text" value="<?=$a[email]?>" readonly size="30" name="email" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Login da area de estatísticas:</td>
<td><input type="text" size="20"  value="<?=$a[login]?>" name="login" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Nova Senha da area de estatísticas:</td>
<td><input type="text" size="20" name="senha" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr><td colspan="2"><small>Se não for editar a senha deixe-a em branco</small></td></tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Editar Anunciante" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr>
</table>
<? } ?>