<?
require "lib/lib.secure.php";

if ($_GET[subacao]=="adicionar") {
if ($_POST[db_adicionar]== "ok") {

v_form($_POST[db_adicionar],"Campo Oculto","?acao=anunciantes&subacao=adicionar");
v_form($_POST[nome],"Nome do Responsável pelo site","?acao=anunciantes&subacao=adicionar");
v_form($_POST[email],"E-mail do Responsável pelo site","?acao=anunciantes&subacao=adicionar");
v_form($_POST[login],"Login","?acao=anunciantes&subacao=adicionar");
v_form($_POST[senha],"Senha","?acao=anunciantes&subacao=adicionar");

$anun_nome=mysql_query("SELECT nome FROM anunciantes WHERE nome='$_POST[nome]' and user_id='$_SESSION[user_id]'",$link_db);
$r_nome=mysql_num_rows($anun_nome);
$anun_email=mysql_query("SELECT email FROM anunciantes WHERE email='$_POST[email]' and user_id='$_SESSION[user_id]'",$link_db);
$r_email=mysql_num_rows($anun_email);
$anun_login=mysql_query("SELECT login FROM anunciantes WHERE login='$_POST[login]' and user_id='$_SESSION[user_id]'",$link_db);
$r_login=mysql_num_rows($anun_login);

if ($r_nome > "0") {
$msg_erro="O Nome digitado já está cadastrado.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes&subacao=adicionar>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes&subacao=adicionar\">";
    include "msg_erro.php";
    exit; }
if ($r_email > "0") {
$msg_erro="O Email digitado já está cadastrado.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes&subacao=adicionar>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes&subacao=adicionar\">";
    include "msg_erro.php";
    exit; }
if ($r_login > "0") {
$msg_erro="O Login digitado já está cadastrado.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes&subacao=adicionar>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes&subacao=adicionar\">";
    include "msg_erro.php";
    exit; }
if (!eregi("[@.]",$_POST[email])) {
$msg_erro="O Email digitado é inválido.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes&subacao=adicionar>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes&subacao=adicionar\">";
    include "msg_erro.php";
    exit; }

$cad_anunciante=mysql_query("INSERT INTO anunciantes VALUES ('','$_SESSION[user_id]','$_POST[nome]','$_POST[login]','".md5($_POST[senha])."','$_POST[email]','','')",$link_db);

if ($cad_anunciante) {

$msg="Olá $_POST[nome], abaixo seguem seus dados para acessar as estatísticas do seu banner\n\n
URL: $config[site_url]/anunciantes/ \n
Login: $_POST[login]\n
Senha: $_POST[senha].";

@mail($_POST[email],"Dados de acesso a estatística",$msg,"FROM: $_SESSION[user_nome] - $config[admin_email]\n");

$msg_erro="Anunciante cadastrado com sucesso.<br>
<br><div align=\"left\">
Um e-mail foi enviado ao seu anunciante, se o e-mail não chegar,
Passe esse dados ao seu anunciante:<br><br>
Olá $_POST[nome], abaixo seguem seus dados para acessar as estatísticas do seu banner<br><br>
URL: $config[site_url]/anunciantes<br>
Login: $_POST[login]<br>
Senha: $_POST[senha].<br><br>
</div>
Redirecionando em 30 segundos se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"30;URL=?\">";
    include "msg_erro.php";
    exit; }
} else { ?>
<form method="post" action="?acao=anunciantes&subacao=adicionar">
<input type="hidden" value="ok" name="db_adicionar" />
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Adicionar Anunciantes</b></td>
</tr>
<tr>
<td>Nome do site:</td>
<td><input type="text" size="30" name="nome" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>E-mail do Responsável do site:</td>
<td><input type="text" size="30" name="email" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Login da area de estatísticas:</td>
<td><input type="text" size="20" name="login" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Senha  da area de estatísticas:</td>
<td><input type="text" size="20" name="senha" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Cadastrar Anunciante" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr>
</table>
<? } } elseif ($_GET[subacao]=="editar") {
if ($_POST[db_editar]=="ok") {

v_form($_POST[a_id],"Campo Oculto","?acao=anunciantes&");
v_form($_POST[db_editar],"Campo Oculto","?acao=anunciantes&");
v_form($_POST[nome],"Nome do Responsável pelo site","?acao=anunciantes&");
v_form($_POST[email],"E-mail do Responsável pelo site","?acao=anunciantes&");
v_form($_POST[login],"Login","?acao=anunciantes");

if (!empty($_POST[senha])) {
v_form($_POST[senha],"Senha","?acao=anunciantes");
$query="UPDATE anunciantes SET login='$_POST[login]', senha='".md5($_POST[senha])."' WHERE id='$_POST[a_id]'";
} else {
$query="UPDATE anunciantes SET login='$_POST[login]' WHERE id='$_POST[a_id]'";
}
if (!eregi("[@.]",$_POST[email])) {
$msg_erro="O Email digitado é inválido.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes\">";
    include "msg_erro.php";
    exit; }
$ed_a=mysql_query($query,$link_db);

if ($ed_a) {
$msg_erro="Anunciante editado com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes\">";
    include "msg_erro.php";
    exit; }
} else {
if (!$_GET[a_id]) {
$msg_erro="Nenhum Anunciante selecionado.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes\">";
    include "msg_erro.php";
    exit; }
v_form($_GET[a_id],"Campo Oculto","?acao=anunciantes");
$sel_a=mysql_query("SELECT id,nome,login,email FROM anunciantes WHERE id='$_GET[a_id]'",$link_db);
$a=mysql_fetch_array($sel_a);
?>
<form method="post" action="?acao=anunciantes&subacao=editar">
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
<? } }
elseif ($_GET[subacao]=="deletar") {
if ($_POST[db_deletar]=="ok") {

v_form($_POST[db_deletar],"Campo Oculto","?acao=anunciantes");
v_form($_POST[a_id],"Campo Oculto","?acao=anunciantes");
v_form($_POST[nome],"Nome da Zona","?acao=anunciantes");

if (!empty($_POST[del_banners])) {
v_form($_POST[del_banners],"Campo Oculto","?acao=anunciantes");
$del_banner=mysql_query("DELETE FROM banners WHERE anunciante='$_POST[nome]'",$link_db);
}
$del_zona=mysql_query("DELETE FROM anunciantes WHERE id='$_POST[a_id]'",$link_db);

if ($del_zona) {
$msg_erro="O Anunciante <b>".$_POST[nome]."</b> foi deletado com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes\">";
    include "msg_erro.php";
    exit; }
} else {
if (!$_GET[a_id]) {
$msg_erro="Nenhum Anunciante selecionado.<br>
    Redirecionando se não quiser esperar <a href=?acao=anunciantes>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=anunciantes\">";
    include "msg_erro.php";
    exit; }
v_form($_GET[a_id],"Campo Oculto","?acao=anunciantes");
$sel_a=mysql_query("SELECT id,nome FROM anunciantes WHERE id='$_GET[a_id]'",$link_db);
$a=mysql_fetch_array($sel_a);
?>
<form method="post" action="?acao=anunciantes&subacao=deletar">
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
<? } } else {
$r_a=mysql_query("SELECT nome,id,u_acesso FROM anunciantes WHERE user_id='$_SESSION[user_id]' order by id desc",$link_db);
$n_a=mysql_num_rows($r_a); ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td align="right"><b><a href="?acao=anunciantes&subacao=adicionar">Cadastrar Anunciante</a></b></td>
</tr>
<tr>
<td class="cel_menu" align="center"><b>Anunciantes do site</b></td>
</tr>
<? if ($n_a=="0") { ?>
<tr>
<td class="cel_tit" align="center">Você não tem nenhum Anunciante cadastrado.<br>Cardastre um anunciante clicando no link acima.</td>
</tr>
<? } else { while ($a=mysql_fetch_array($r_a)) { ?>
<tr>
<td class="cel_tit_banner" align="right">
<table border="0" cellspacing="5" cellpadding="0">
<tr>
<td width="500" align="left"><b><a href="?action=ver_banners&a_id=<?=$a[nome]?>" title="Ver Banners deste anunciante"><?=$a[nome]?></a></b><br>
<small>Último acesso em: <?=str_replace(" - "," às ",$a[u_acesso])?></small></td>
<td><a href="?action=ver_banners&a_id=<?=$a[nome]?>"><img src="images/expand.gif" alt="Ver Banners deste anunciante" border="0"></a></td>
<td><a href="?acao=anunciantes&subacao=editar&a_id=<?=$a[id]?>"><img src="images/editar.gif" alt="Editar este anunciante" border="0"></a></td>
<td><a href="?acao=anunciantes&subacao=deletar&a_id=<?=$a[id]?>"><img src="images/deletar.gif" alt="Deletar este anunciante" border="0"></a></td>
</tr>
</table>
</td></tr>
<? } } ?>
</table>
<? } ?>