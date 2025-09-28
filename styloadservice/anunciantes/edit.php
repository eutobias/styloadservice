<? require "lib/lib.secure.php";
if ($config[anun_alterar_dados]!="S") { } else {

if ($_POST[db_editar]=="ok") {

v_form($_POST[a_id],"Campo Oculto","?acao=edit&");
v_form($_POST[db_editar],"Campo Oculto","?acao=edit&");
v_form($_POST[email],"E-mail do Responsável pelo site","?acao=edit&");
v_form($_POST[login],"Login","?acao=edit");

if (!empty($_POST[senha])) {
v_form($_POST[senha],"Senha","?acao=edit");
$query="UPDATE anunciantes SET login='$_POST[login]',email='$_POST[email]', senha='".md5($_POST[senha])."' WHERE id='$_POST[a_id]'";
} else {
$query="UPDATE anunciantes SET login='$_POST[login]',email='$_POST[email]' WHERE id='$_POST[a_id]'";
}
if (!eregi("[@.]",$_POST[email])) {
$msg_erro="O Email digitado é inválido.<br>
    Redirecionando se não quiser esperar <a href=?acao=edit>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=edit\">";
    include "msg_erro.php";
    exit; }
$ed_a=mysql_query($query,$link_db);

if ($ed_a) {
$msg_erro="Seus dados foram editados com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=edit>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=edit\">";
    include "msg_erro.php";
    exit; }
} else {
	$sel_a=mysql_query("SELECT id,login,email FROM anunciantes WHERE id='$_SESSION[anun_id]'",$link_db);
	$a=mysql_fetch_array($sel_a);
?>
<table border="0" cellspacing="2" width="600" cellpadding="0" align="center">
<tr>
<td colspan="3" class="cel_menu">
Olá <b><?=$_SESSION[anun_login]?></b>, nesta tela você pode editar seus dados.<br><br>

<b>Algumas dicas e exclarecimentos</b><br>
<small>
<b>&raquo;</b> Se você editar seu login ou senha terá que efetuar login novamente.<br>
<b>&raquo;</b> Se não for editar a senha você deve deixa-lá em branco.
</small>
</td>
</tr>
</table>
<form method="post" action="?acao=edit">
<input type="hidden" value="ok" name="db_editar" />
<input type="hidden" value="<?=$a[id]?>" name="a_id" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Editar Dados</b></td>
</tr>
<tr>
<td>Seu E-mail:</td>
<td><input type="text" value="<?=$a[email]?>" readonly size="30" name="email" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Seu Login:</td>
<td><input type="text" size="20"  value="<?=$a[login]?>" name="login" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Sua Senha:</td>
<td><input type="text" size="20" name="senha" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<td colspan="2" align="right"><input type="submit" value="Editar Dados" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr>
</table>
<? } } ?>