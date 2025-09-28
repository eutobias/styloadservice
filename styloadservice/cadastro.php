<?
if ($config[aceitar_cadastro]!="S") { exit; }

if ($_POST[cadastrar]) {
v_form($_POST[nome],"Nome","?acao=cadastro");
v_form($_POST[email],"E-mail","?acao=cadastro");
v_form($_POST[email2],"E-mail","?acao=cadastro");
v_form($_POST[login],"Login","?acao=cadastro");
v_form($_POST[senha],"Senha","?acao=cadastro");
v_form($_POST[senha2],"Senha","?acao=cadastro");
v_form($_POST[local],"Localidade","?acao=cadastro");
v_form($_POST[cep],"Cep","?acao=cadastro");
v_form($_POST[site_nome],"Nome do site","?acao=cadastro");
v_form($_POST[site_url],"Url do site","?acao=cadastro");
v_form($_POST[seus_conhecimentos],"Seus conhecimentos","?acao=cadastro");
v_form($_POST[cod_seg],"Código de Segurança","?acao=cadastro");
v_form_i($_POST[email],$_POST[email2],"E-mail","?acao=cadastro");
v_form_i($_POST[senha],$_POST[senha2],"Senha","?acao=cadastro");
v_form_e($_POST[email],"?acao=cadastro");
v_form_e($_POST[email2],"?acao=cadastro");

if (!empty($_POST[msn])) { v_form($_POST[msn],"Msn Messeger","?acao=cadastro"); }
if (!empty($_POST[icq])) {
v_form($_POST[icq],"Icq","?acao=cadastro");
v_form_n($_POST[icq],"Icq","?acao=cadastro");
}
if (!empty($_POST[aim])) { v_form($_POST[aim],"Aim","?acao=cadastro"); }
if (!empty($_POST[yahoo])) { v_form($_POST[yahoo],"Yahoo Messeger","?acao=cadastro"); }


if ($_POST[cod_seg] != $_SESSION[cod_seg]) {
	$msg_erro="Os códigos de segurança não conferem.<br>
    Redirecionando se não quiser esperar <a href=?acao=cadastro>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=cadastro\">";
    include "msg_erro.php";
    exit; }
if ($_POST[termos] != "de_acordo") {
	$msg_erro="Você deve estar de acordo com os termos de uso.<br>
    Redirecionando se não quiser esperar <a href=?acao=cadastro>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=cadastro\">";
    include "msg_erro.php";
    exit; }

$v_login_r=mysql_query("SELECT login from login where login='$_POST[login]'",$link_db);
$v_nome_r=mysql_query("SELECT nome from login where nome='$_POST[nome]'",$link_db);
$v_email_r=mysql_query("SELECT email from login where email='$_POST[email]'",$link_db);
$v_login=mysql_num_rows($v_login_r);
$v_nome=mysql_num_rows($v_nome_r);
$v_email=mysql_num_rows($v_email_r);

if ($v_login > "0") {
	$msg_erro="Este login já está cadastrado no sistema.<br>
    Redirecionando se não quiser esperar <a href=?acao=cadastro>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=cadastro\">";
    include "msg_erro.php";
    exit; }
if ($v_nome > "0") {
	$msg_erro="Este Nome já está cadastrado no sistema.<br>
    Redirecionando se não quiser esperar <a href=?acao=cadastro>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=cadastro\">";
    include "msg_erro.php";
    exit; }
if ($v_email > "0") {
	$msg_erro="Este E-mail já está cadastrado no sistema.<br>
    Redirecionando se não quiser esperar <a href=?acao=cadastro>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=cadastro\">";
    include "msg_erro.php";
    exit; }

include "lib/lib.data.php";

$cadastra=mysql_query("INSERT INTO login VALUES	('','$_POST[nome]','$_POST[email]','$_POST[login]','".md5($_POST[senha])."','$_POST[site_nome]','$_POST[site_url]','$_POST[msn]','$_POST[icq]','$_POST[aim]','$_POST[yahoo]','$_POST[seus_conhecimentos]','$_POST[local]','$_POST[cep]','0','0','$data_c','$data_c','".time()."')",$link_db);

if ($cadastra) {

$msg="Olá $_POST[login]<br>
este e-mail contém seus dados de seu cadastro.<br><br>

Abaixo seguem os seus dados:<br>

Nome cadastrado: $_POST[nome]<br>
E-mail cadastrado: $_POST[email]<br>
Login: $_POST[login]<br>
Senha: $_POST[senha]<br>
<br>

Este e-mail foi gerado automaticamente, não o responda.
Muito obrigado por utilizar nosso serviço.";

@mail("$_POST[email]","E-mail confirmação de cadastro - $config[site_nome]",$msg,"From:$config[site_nome]\n\nContent-type:text/html");

$msg_erro="<br><div style=\"width:400px;\">
<center><b>Seu cadastro foi efetuado com sucesso.</b></center><br>
Um e-mail com seus dados foi enviado para você.<br>
Em instantes você receberá essa mensagem, muito obrigado por cadastrar-se em nosso sistema.<br>
É o que deseja a equipe do site ".$config[site_nome].".<br><br>
Você será redirecionado para a página de login em 30 segundos, se não quiser esperar <a href=?acao=login>clique aqui</a>
<meta http-equiv=\"refresh\" content=\"30;URL=?acao=login\"></div>";
include "msg_erro.php";
exit; }
 else {
 	$msg_erro="Houve um erro ao tentar efetuar o seu cadastro, tente novamente por favor.<br>
    <a href=\"?acao=cadastro\">clique aqui</a> para tentar se cadastrar novamente.";
    include "msg_erro.php";
    exit; }

} else { ?>
<form method="post" action="?acao=cadastro">
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
<td colspan="2" class="cel_tit" align="center"><b>Termos de uso</b></td>
</tr>
<tr>
<td colspan="2" align="center">
<textarea rows="20" cols="70" class="form_txt" readonly>
<?
$arquivo="termos_de_uso.txt";
$ler = fopen ($arquivo, "r");
$conteudo = fread($ler, filesize($arquivo));
fclose ($ler);
print str_replace("{versao}",$config['versao'],$conteudo);
?>
</textarea>
</td></tr>
<tr><td colspan="2" align="center">
<input type="checkbox" name="termos" value="de_acordo" /> Estou de acordo com os termos de uso.
</td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Código de segurança</b></td>
</tr>
<?
$codigo=rand(1000,9999);
$_SESSION[cod_seg]=$codigo;
?>
<tr><td colspan="2" align="center"><img src="cod_seg.php?cod=<?=$codigo?>" />
</td></tr>
<tr><td colspan="2" align="center"><input type="text" size="20" style="text-align:center;" name="cod_seg" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr><td colspan="2">
Todos os campos * são obrigatórios<br>
Se a imagem não aparecer <a href="?acao=cadastro">clique aqui</a></td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<input type="hidden" name="cadastrar" value="ok" />
<td colspan="2" align="right"><input type="submit" value="Cadastrar" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr></form>
</table>
<? } ?>