<?
if ($config[aceitar_cadastro]!="S") { exit; }

if ($_POST[cadastrar]) {
v_form($_POST[nome],"Nome","?acao=usuarios&subacao=nova_conta");
v_form($_POST[email],"E-mail","?acao=usuarios&subacao=nova_conta");
v_form($_POST[email2],"E-mail","?acao=usuarios&subacao=nova_conta");
v_form($_POST[login],"Login","?acao=usuarios&subacao=nova_conta");
v_form($_POST[senha],"Senha","?acao=usuarios&subacao=nova_conta");
v_form($_POST[senha2],"Senha","?acao=usuarios&subacao=nova_conta");
v_form($_POST[local],"Localidade","?acao=usuarios&subacao=nova_conta");
v_form($_POST[cep],"Cep","?acao=usuarios&subacao=nova_conta");
v_form($_POST[site_nome],"Nome do site","?acao=usuarios&subacao=nova_conta");
v_form($_POST[site_url],"Url do site","?acao=usuarios&subacao=nova_conta");
v_form($_POST[seus_conhecimentos],"Seus conhecimentos","?acao=usuarios&subacao=nova_conta");
v_form_i($_POST[email],$_POST[email2],"E-mail","?acao=usuarios&subacao=nova_conta");
v_form_i($_POST[senha],$_POST[senha2],"Senha","?acao=usuarios&subacao=nova_conta");
v_form_e($_POST[email],"?acao=usuarios&subacao=nova_conta");
v_form_e($_POST[email2],"?acao=usuarios&subacao=nova_conta");

if (!empty($_POST[msn])) { v_form($_POST[msn],"Msn Messeger","?acao=usuarios&subacao=nova_conta"); }
if (!empty($_POST[icq])) {
v_form($_POST[icq],"Icq","?acao=usuarios&subacao=nova_conta");
v_form_n($_POST[icq],"Icq","?acao=usuarios&subacao=nova_conta");
}
if (!empty($_POST[aim])) { v_form($_POST[aim],"Aim","?acao=usuarios&subacao=nova_conta"); }
if (!empty($_POST[yahoo])) { v_form($_POST[yahoo],"Yahoo Messeger","?acao=usuarios&subacao=nova_conta"); }

$v_login_r=mysql_query("SELECT login from login where login='$_POST[login]'",$link_db);
$v_nome_r=mysql_query("SELECT nome from login where nome='$_POST[nome]'",$link_db);
$v_email_r=mysql_query("SELECT email from login where email='$_POST[email]'",$link_db);
$v_login=mysql_num_rows($v_login_r);
$v_nome=mysql_num_rows($v_nome_r);
$v_email=mysql_num_rows($v_email_r);

if ($v_login > "0") {
	$msg_erro="Este login já está cadastrado no sistema.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=nova_conta>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=nova_conta\">";
    include "msg_erro.php";
    exit; }
if ($v_nome > "0") {
	$msg_erro="Este Nome já está cadastrado no sistema.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=nova_conta>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=nova_conta\">";
    include "msg_erro.php";
    exit; }
if ($v_email > "0") {
	$msg_erro="Este E-mail já está cadastrado no sistema.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=nova_conta>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=nova_conta\">";
    include "msg_erro.php";
    exit; }

$cadastra=mysql_query("INSERT INTO login VALUES	('','$_POST[nome]','$_POST[email]','$_POST[login]','".md5($_POST[senha])."','$_POST[site_nome]','$_POST[site_url]','$_POST[msn]','$_POST[icq]','$_POST[aim]','$_POST[yahoo]','$_POST[seus_conhecimentos]','$_POST[local]','$_POST[cep]','0','0','$data_c','$data_c','".time()."')",$link_db);

if ($cadastra) {
$msg_erro="<br><div style=\"width:400px;\">
<center><b>Cadastro foi efetuado com sucesso.</b></center><br>
Você será redirecionado para a página de login em 5 segundos, se não quiser esperar <a href=?acao=login>clique aqui</a>
<meta http-equiv=\"refresh\" content=\"5;URL=?acao=usuarios&\"></div>";
include "msg_erro.php";
exit; }
 else {
 	$msg_erro="Houve um erro ao tentar efetuar o seu cadastro, tente novamente por favor.<br>
    <a href=\"?acao=usuarios&subacao=nova_conta\">clique aqui</a> para tentar se cadastrar novamente.";
    include "msg_erro.php";
    exit; }

} else { ?>
<form method="post" action="?acao=usuarios&subacao=nova_conta">
<table border="0" cellspacing="4" cellpadding="0" align="center">
<tr>
<td colspan="2" class="cel_menu" align="center" width="300"><b>Formulário de Cadastro</b></td>
</tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Seus Dados</b></td>
</tr>
<tr>
<td>Nome completo:</td>
<td><input type="text" size="50" name="nome" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td>E-mail (válido):</td>
<td><input type="text" size="50" name="email" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td>Repita o E-mail:</td>
<td><input type="text" size="50" name="email2" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td>Nome do site:</td>
<td><input type="text" size="50" name="site_nome" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td>URL do site:</td>
<td><input type="text" size="50" name="site_url" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td>Seus conhecimentos:</td>
<td><textarea rows="4" cols="49" name="seus_conhecimentos" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"></textarea>*</td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Dados de login</b></td>
</tr>
<tr>
<td>Login:</td>
<td><input type="text" size="50" name="login" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td>Senha:</td>
<td><input type="password" size="50" name="senha" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td>Repita a Senha:</td>
<td><input type="password" size="50" name="senha2" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Dados complementares</b></td>
</tr>
<tr>
<td>Localidade:</td>
<td><input type="text" size="50" name="local" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*<br>
<small>ex.: Rio de Janeiro - RJ - Brasil</small></td>
</tr>
<tr>
<td>Cep:</td>
<td><input type="text" size="20" name="cep" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" />*</td>
</tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Outras formas de contatos</b></td>
</tr>
<tr>
<td>Msn Messeger:</td>
<td><input type="text" size="50" name="msn" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>ICQ:</td>
<td><input type="text" size="50" name="icq" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>AIM:</td>
<td><input type="text" size="50" name="aim" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Yahoo Messeger:</td>
<td><input type="text" size="50" name="yahoo" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2">
Todos os campos * são obrigatórios<br>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<input type="hidden" name="cadastrar" value="ok" />
<td colspan="2" align="right"><input type="submit" value="Cadastrar" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr></form>
</table>
<? } ?>