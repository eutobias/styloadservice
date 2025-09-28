<?
require "lib/lib.secure.php";

if ($config[user_alterar_dados]!="S") { } else {

if ($_GET[subacao]=="editar") {
if ($_POST[db_editar]=="ok") {
v_form($_POST[db_editar],"Campo Oculto","?acao=dados&subacao=editar");
v_form($_POST[nome],"Nome","?acao=dados&subacao=editar");
v_form($_POST[email],"E-mail","?acao=dados&subacao=editar");
v_form($_POST[login],"Login","?acao=dados&subacao=editar");
v_form($_POST[seus_conhecimentos],"Seus Conhecimentos","?acao=dados&subacao=editar");
v_form($_POST[local],"Localidade","?acao=dados&subacao=editar");
v_form($_POST[cep],"CEP","?acao=dados&subacao=editar");
v_form_e($_POST[email],"?acao=dados&subacao=editar");

if (!empty($_POST[msn])) { v_form($_POST[msn],"Msn Messeger","?acao=cadastro"); }
if (!empty($_POST[icq])) {
v_form($_POST[icq],"Icq","?acao=cadastro");
v_form_n($_POST[icq],"Icq","?acao=cadastro");
}
if (!empty($_POST[aim])) { v_form($_POST[aim],"Aim","?acao=cadastro"); }
if (!empty($_POST[yahoo])) { v_form($_POST[yahoo],"Yahoo Messeger","?acao=cadastro"); }


if (!empty($_POST[senha])) {
v_form($_POST[senha],"Senha","?acao=dados&subacao=editar");
v_form($_POST[senha2],"Senha","?acao=dados&subacao=editar");
v_form_i($_POST[senha],$_POST[senha2],"Senha","?acao=dados&subacao=editar");
$query="UPDATE login SET nome='$_POST[nome]', email='$_POST[email]',login='$_POST[login]',senha='".md5($_POST[senha])."',conhecimentos='$_POST[seus_conhecimentos]',nome_site='$_POST[site_nome]',url_site='$_POST[site_url]',local='$_POST[local]',cep='$_POST[cep]',msn='$_POST[msn]',icq='$_POST[icq]',aim='$_POST[aim]',yahoo='$_POST[yahoo]' HERE id='$_SESSION[user_id]'";
}
else {
$query="UPDATE login SET nome='$_POST[nome]', email='$_POST[email]',login='$_POST[login]',conhecimentos='$_POST[seus_conhecimentos]',nome_site='$_POST[site_nome]',url_site='$_POST[site_url]',local='$_POST[local]',cep='$_POST[cep]',msn='$_POST[msn]',icq='$_POST[icq]',aim='$_POST[aim]',yahoo='$_POST[yahoo]' WHERE id='$_SESSION[user_id]'";
}

if (!is_numeric($_SESSION[user_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }

$edita=mysql_query($query,$link_db);

if ($edita) {
$msg_erro="Seus dados foram editados com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
include "msg_erro.php";
exit; }
 else {
 	$msg_erro="Houve um erro ao tentar efetuar o seu cadastro, tente novamente por favor.<br>
    <a href=\"?acao=cadastro\">clique aqui</a> para tentar se cadastrar novamente.";
    include "msg_erro.php";
    exit; }

} else {
if (!is_numeric($_SESSION[user_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }
$dados_r=mysql_query("SELECT * FROM login WHERE id='$_SESSION[user_id]'",$link_db);
$dados=mysql_fetch_array($dados_r);
?>
<form method="post" action="?acao=dados&subacao=editar">
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
<tr><td colspan="2" height="10"><small>
Se não for editar a senha deixe-as branco.<br>
Por motivos de funcionamento do sistema você não pode editar seu login.<br>
Se você editar dados como nome e senha (usados para autenticação) você terá que efetuar login novamente após a edição dos dados.</small></td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Editar Dados" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr></form>
</table>
<? } }
elseif ($_GET[subacao]=="deletar") {
if ($_POST[db_deletar]=="ok") {
v_form($_POST[db_deletar],"Campo Oculto","?acao=dados&subacao=editar");
if (!is_numeric($_SESSION[user_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }

$del_anunciantes=mysql_query("DELETE FROM anunciantes WHERE user_id='$_SESSION[user_id]'",$link_db);
$del_zona=mysql_query("DELETE FROM zonas WHERE user_id='$_SESSION[user_id]'",$link_db);
$del_banners=mysql_query("DELETE FROM banners WHERE user_id='$_SESSION[user_id]'",$link_db);
$del_login=mysql_query("DELETE FROM login WHERE id='$_SESSION[user_id]'",$link_db);

$login=$_SESSION[user_nome];
session_start();
session_unregister("user_id");
session_unregister("user_nome");
session_unregister("user_login");
session_unregister("user_senha");
session_unregister("user_nivel");
session_unregister("logado");
session_unset();
session_destroy();

$msg_erro= $login." você saiu do sistema!!!<br>";
include "msg_erro.php";

if ($del_zona) {
$msg_erro="
Sua conta foi deletada com sucesso.<br>
Muito obrigado por utilizar nossos serviços, se você está insatisfeito com a qualidade do nosso seviço ou tem sugestões para falar conosco <a href=\"?acao=faleconosco\">clique aqui</a>, sua opinião é muito importante para nós.
Muito origado novamente e até a próxima.";
    include "msg_erro.php";
    exit; }
} else {
?>
<form method="post" action="?acao=dados&subacao=deletar">
<input type="hidden" value="ok" name="db_deletar" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Deletar Sua Conta e Descadastrar-se do Sistema</b></td>
</tr>
<tr>
<td>Tem certeza que você quer deletar a sua conta e se descadastrar do sistema?<br>
<b>Todos os banners os seus banners, zonas e anunciantes serão deletados e não poderão ser recuperados.</b><br>
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
<? } } } ?>