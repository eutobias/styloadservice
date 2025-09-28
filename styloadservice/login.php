<?

if ($_POST[login] && $_POST[senha]) {

require ("lib/lib.conexao.php");

session_start();

v_form($_POST['login'],"Login","?acao=login");
v_form($_POST['senha'],"Senha","?acao=login");

$l_login=$_POST['login'];
$l_senha=md5($_POST['senha']);

$r_login=mysql_query("select * from login where login='$l_login' and senha='$l_senha'",$link_db) or die (mysql_error());
$f_login=mysql_fetch_array($r_login);
$rows_login=mysql_num_rows($r_login);

if ($rows_login != "1") {

$r_login_row=mysql_query("select * from login where login='$l_login'",$link_db);
$c_login_row=mysql_num_rows($r_login_row);
$r_senha_row=mysql_query("select * from login where senha='$l_senha'",$link_db);
$c_senha_row=mysql_num_rows($r_senha_row);

if ($c_login_row=="0") {
	$msg_erro="O <b>LOGIN</b> está errado ou não está cadastrado no sistema.<br>
    Redirecionando se não quiser esperar <a href=?acao=login>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=login\">";
    include "msg_erro.php";
    exit;
    }

if ($c_senha_row=="0") {
    $msg_erro="A <b>SENHA</b> está errada digite-a novamente.<br>
    Redirecionando se não quiser esperar <a href=?acao=login>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=login\">";
    include "msg_erro.php";
    exit;
    }
}
else {

$_SESSION['user_id']=$f_login['id'];
$_SESSION['user_nome']=$f_login['nome'];
$_SESSION['user_senha']=$f_login['senha'];
$_SESSION['user_login']=$f_login['login'];
$_SESSION['user_nivel']=$f_login['nivel'];
$_SESSION['user_logado']="ok";
$_SESSION['p_acesso']=$f_login['p_acesso'];

include "lib/lib.data.php";

mysql_query("UPDATE login SET p_acesso='$f_login[u_acesso]',u_acesso='$data_c',u_a_time='".time()."' where id='$f_login[id]'",$link_db);

 $msg_erro= $f_login['login']." você está logado!!!<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
}
}
else { ?>
    <form method="post" action="?acao=login">
    <table border="0" cellspacing="0" cellpadding="2" align="center">
    <tr>
    <td colspan="2" class="cel_menu" align="center"><b>Formulário de Login</b></td>
    </tr>
    <tr>
    <td>Login:</td>
    <td><input type="text" size="30" name="login" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
    </tr>
    <tr>
    <td>Senha:</td>
    <td><input type="password" size="30" name="senha" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
    </tr>
    <tr><td colspan="2"><small>Todos os campos são obrigatórios</small></td></tr>
    <tr><td colspan="2"><small><a href="?area=lembrar_senha">Esqueceu sua senha?</a></small></td></tr>
    <tr><td colspan="2" align="right"><input type="submit" value="Login" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td></tr>
    </form>
    <tr><td colspan="2" height="10"></td></tr>
   <? if ($config[aceitar_cadastro]=="S") { ?>
    <tr><td colspan="2" class="cel_menu">
    Não é cadastrado?<br>
    Então <a href="?area=cadastro"><b>clique aqui</b></a> e cadastre-se.</a>
    </td></tr>
   <? } ?>
    </table>
<? } ?>