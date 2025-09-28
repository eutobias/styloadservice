 <?
 require "lib/lib.conexao.php";

 if (empty($_SESSION['admin_nome']) || empty($_SESSION['admin_senha']) || empty($_SESSION['admin_login']) || empty($_SESSION['admin_id']) || empty($_SESSION['admin_logado'])) {
    $msg_erro="Não foi encontrado a sessão de login administrativo ou sua sessão expirou.<br>
    Redirecionando se não quiser esperar <a href=index.php?acao=login>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=index.php?acao=login\">";
    include "msg_erro.php";
    exit;
    }

    $_admin_nome=$_SESSION['admin_nome'];
    $_admin_senha=$_SESSION['admin_senha'];
    $_admin_login=$_SESSION['admin_login'];
    $_admin_id=$_SESSION['admin_id'];

    $r_verifica_admin=mysql_query("select * from login where nome='$_admin_nome' and login='$_admin_login' and senha='$_admin_senha' and id='$_admin_id' and nivel='1'",$link_db)or die (mysql_erro());
	$rows_verifica_admin=mysql_num_rows($r_verifica_admin);
    	if ($rows_verifica_admin == "1") {
        }
        else {
        $msg_erro="Você não está logado ou sua sessão expirou.<br>
        Redirecionando se não quiser esperar <a href=index.php?acao=login>clique aqui</a>
        <meta http-equiv=\"refresh\" content=\"3;URL=index.php?acao=login\">";
        session_start();
		session_unregister("admin_nome");
		session_unregister("admin_login");
		session_unregister("admin_senha");
        session_unregister("admin_id");
        session_unregister("admin_nivel");
        session_unset();
		session_destroy();

        include "msg_erro.php";
    	exit;
        }
    mysql_query("UPDATE login SET u_a_time='".time()."' WHERE id='$_SESSION[admin_id]'",$link_db);
 ?>