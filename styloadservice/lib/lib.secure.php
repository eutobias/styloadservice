 <?
 require "lib/lib.conexao.php";

 if (empty($_SESSION['user_nome']) || empty($_SESSION['user_senha']) || empty($_SESSION['user_login']) || empty($_SESSION['user_id']) || empty($_SESSION['user_logado'])) {
    $msg_erro="Não foi encontrado a sessão de login administrativo ou sua sessão expirou.<br>
    Redirecionando se não quiser esperar <a href=index.php?acao=login>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=index.php?acao=login\">";
    include "msg_erro.php";
    exit;
    }

    $_user_nome=$_SESSION['user_nome'];
    $_user_senha=$_SESSION['user_senha'];
    $_user_login=$_SESSION['user_login'];
    $_user_id=$_SESSION['user_id'];

    $r_verifica_user=mysql_query("select * from login where nome='$_user_nome' and login='$_user_login' and senha='$_user_senha' and id='$_user_id' and nivel='1'",$link_db)or die (mysql_erro());
	$rows_verifica_user=mysql_num_rows($r_verifica_user);
    	if ($rows_verifica_user == "1") {
        }
        else {
        $msg_erro="Você não está logado ou sua sessão expirou.<br>
        Redirecionando se não quiser esperar <a href=index.php?acao=login>clique aqui</a>
        <meta http-equiv=\"refresh\" content=\"3;URL=index.php?acao=login\">";
        session_start();
		session_unregister("user_nome");
		session_unregister("user_login");
		session_unregister("user_senha");
        session_unregister("user_id");
        session_unregister("user_nivel");
        session_unset();
		session_destroy();

        include "msg_erro.php";
    	exit;
        }
    mysql_query("UPDATE login SET u_a_time='".time()."' WHERE id='$_SESSION[user_id]'",$link_db);
 ?>