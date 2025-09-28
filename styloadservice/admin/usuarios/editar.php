<?
require "lib/lib.secure.php";

if ($_GET[subacao]=="editar") {
if ($_POST[db_editar]=="ok") {
v_form($_POST[db_editar],"Campo Oculto","?acao=usuarios&");
v_form($_POST[nome],"Nome","?acao=usuarios&");
v_form($_POST[email],"E-mail","?acao=usuarios&");
v_form($_POST[login],"Login","?acao=usuarios");
v_form_e($_POST[email],"?acao=usuarios");
v_form($_POST[seus_conhecimentos],"Seus Conhecimentos","?acao=usuarios");
v_form($_POST[local],"Localidade","?acao=usuarios");
v_form($_POST[cep],"CEP","?acao=usuarios");
v_form($_POST[cargo],"Cargo","?acao=usuarios");

if (!empty($_POST[msn])) { v_form($_POST[msn],"Msn Messeger","?acao=usuarios"); }
if (!empty($_POST[icq])) {
v_form($_POST[icq],"Icq","?acao=usuarios");
v_form_n($_POST[icq],"Icq","?acao=usuarios");
}
if (!empty($_POST[aim])) { v_form($_POST[aim],"Aim","?acao=usuarios"); }
if (!empty($_POST[yahoo])) { v_form($_POST[yahoo],"Yahoo Messeger","?acao=usuarios"); }


if (!empty($_POST[senha])) {
v_form($_POST[senha],"Senha","?acao=usuarios&subacao=editar");
$query="UPDATE login SET nome='$_POST[nome]', email='$_POST[email]',login='$_POST[login]',senha='".md5($_POST[senha])."',conhecimentos='$_POST[seus_conhecimentos]',nome_site='$_POST[site_nome]',url_site='$_POST[site_url]',local='$_POST[local]',cep='$_POST[cep]',msn='$_POST[msn]',icq='$_POST[icq]',aim='$_POST[aim]',yahoo='$_POST[yahoo]',nivel='$_POST[cargo]' WHERE id='$_GET[u_id]'";
}
else {
$query="UPDATE login SET nome='$_POST[nome]', email='$_POST[email]',login='$_POST[login]',conhecimentos='$_POST[seus_conhecimentos]',nome_site='$_POST[site_nome]',url_site='$_POST[site_url]',local='$_POST[local]',cep='$_POST[cep]',msn='$_POST[msn]',icq='$_POST[icq]',aim='$_POST[aim]',yahoo='$_POST[yahoo]',nivel='$_POST[cargo]' WHERE id='$_GET[u_id]'";
}

if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios\">";
    include "msg_erro.php";
    exit; }

$edita=mysql_query($query,$link_db);

if ($edita) {
$msg_erro="Seus dados foram editados com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios\">";
include "msg_erro.php";
exit; }
 else {
 	$msg_erro="Houve um erro ao tentar efetuar o seu cadastro, tente novamente por favor.<br>
    <a href=\"?acao=usuarios\">clique aqui</a> para tentar se cadastrar novamente.";
    include "msg_erro.php";
    exit; }

} else {
if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios\">";
    include "msg_erro.php";
    exit; }
$dados_r=mysql_query("SELECT * FROM login WHERE id='$_GET[u_id]'",$link_db);
$dados=mysql_fetch_array($dados_r);
?>
<form method="post" action="?acao=usuarios&subacao=editar&u_id=<?=$_GET[u_id]?>">
<input type="hidden" name="db_editar" value="ok" />
<table border="0" cellspacing="4" cellpadding="0" align="center">
<tr>
<td colspan="2" class="cel_menu" align="center" width="300"><b>Formulário de Edição de Dados de Cadastro</b></td>
</tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Seus Dados</b></td>
</tr>
<tr>
<td>Nome completo:</td>
<td><input type="text" value="<?=$dados[nome]?>" size="50" name="nome" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>E-mail (válido):</td>
<td><input type="text" size="50" value="<?=$dados[email]?>" name="email" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Nome do site:</td>
<td><input type="text" size="50" value="<?=$dados[nome_site]?>" name="site_nome" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>URL do site:</td>
<td><input type="text" size="50" value="<?=$dados[url_site]?>" name="site_url" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Seus conhecimentos:</td>
<td><textarea rows="4" cols="49" name="seus_conhecimentos" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"><?=$dados[conhecimentos]?></textarea></td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Dados de login</b></td>
</tr>
<tr>
<td>Login:</td>
<td><input type="text" value="<?=$dados[login]?>" readonly size="50" name="login" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Nova Senha:</td>
<td><input type="text" size="50"  name="senha" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Dados complementares</b></td>
</tr>
<tr>
<td>Localidade:</td>
<td><input type="text" value="<?=$dados[local]?>" size="50" name="local" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /><br>
<small>ex.: Rio de Janeiro - RJ - Brasil</small></td>
</tr>
<tr>
<td>Cep:</td>
<td><input type="text" size="20" value="<?=$dados[cep]?>" name="cep" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Outras formas de contatos</b></td>
</tr>
<tr>
<td>Msn Messeger:</td>
<td><input type="text" size="50" value="<?=$dados[msn]?>" name="msn" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>ICQ:</td>
<td><input type="text" size="50" value="<?=$dados[icq]?>" name="icq" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>AIM:</td>
<td><input type="text" size="50" value="<?=$dados[aim]?>" name="aim" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Yahoo Messeger:</td>
<td><input type="text" size="50" value="<?=$dados[yahoo]?>" name="yahoo" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Cargo</b></td>
</tr>
<tr>
<td>Cargo do usuario:</td>
<td><select name="cargo" class="form_txt">
<option value="1" <? if ($dados[nivel]=="1") {?>selected<? } ?>>Administrador</option>
<option value="0" <? if ($dados[nivel]=="0") {?>selected<? } ?>>Usuario Comum</option>
</td>
</tr>
<tr><td colspan="2" height="10"><small>
Se não for editar a senha deixe-a branco.<br>
Por motivos de funcionamento do sistema você não pode editar seu login.<br>
Se você editar dados como nome e senha (usados para autenticação) você terá que efetuar login novamente após a edição dos dados.</small></td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Editar Dados" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr></form>
</table>
<? } } ?>