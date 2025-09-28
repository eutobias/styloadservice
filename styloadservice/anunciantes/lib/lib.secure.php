 <?
 require "lib/lib.conexao.php";

 if (empty($_SESSION['anun_nome']) || empty($_SESSION['anun_senha']) || empty($_SESSION['anun_login']) || empty($_SESSION['anun_id']) || empty($_SESSION['anun_logado'])) {
    $msg_erro="Não foi encontrado a sessão de login administrativo ou sua sessão expirou.<br>
    Redirecionando se não quiser esperar <a href=index.php?acao=login>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=index.php?acao=login\">";
    include "msg_erro.php";
    exit;
    }

    $_admin_nome=$_SESSION['anun_nome'];
    $_admin_senha=$_SESSION['anun_senha'];
    $_admin_login=$_SESSION['anun_login'];
    $_admin_id=$_SESSION['anun_id'];

    $r_verifica_admin=mysql_query("select * from anunciantes where nome='$_admin_nome' and login='$_admin_login' and senha='$_admin_senha' and id='$_admin_id'",$link_db)or die (mysql_erro());
	$rows_verifica_admin=mysql_num_rows($r_verifica_admin);
    	if ($rows_verifica_admin == "1") {
        }
        else {
        $msg_erro="Você não está logado ou sua sessão expirou.<br>
        Redirecionando se não quiser esperar <a href=index.php?acao=login>clique aqui</a>
        <meta http-equiv=\"refresh\" content=\"3;URL=index.php?acao=login\">";
        session_start();
		session_unregister("anun_id");
		session_unregister("anun_nome");
		session_unregister("anun_login");
		session_unregister("anun_senha");
		session_unregister("anun_nivel");
		session_unregister("anun_logado");
		session_unregister('p_acesso');
        session_unset();
		session_destroy();

        include "msg_erro.php";
    	exit;
        }

        $data = date("D");
if ($data == "Mon") { $d="Segunda-feira"; }
elseif ($data == "Tue") { $d="Terça-feira"; }
elseif ($data == "Wed") { $d="Quarta-feira"; }
elseif ($data == "Thu") { $d="Quinta-feira"; }
elseif ($data == "Fri") { $d="Sexta-feira"; }
elseif ($data == "Sat") { $d="Sábado"; }
else { $d="Domingo"; }

$mes=date("m");
if ($mes=="01") { $m="Janeiro"; }
elseif ($mes=="02") { $m="Fevereiro"; }
elseif ($mes=="03") { $m="Março"; }
elseif ($mes=="04") { $m="Abril"; }
elseif ($mes=="05") { $m="Maio"; }
elseif ($mes=="06") { $m="Junho"; }
elseif ($mes=="07") { $m="Julho"; }
elseif ($mes=="08") { $m="Agosto"; }
elseif ($mes=="09") { $m="Setembro"; }
elseif ($mes=="10") { $m="Outubro"; }
elseif ($mes=="11") { $m="Novembro"; }
else { $m="Dezembro"; }
$data_c=$d.", ".date("d")." de ".$m." de ".date("Y")." - ".date("H:i:s");

$r_verifica_admin=mysql_query("update anunciantes set u_acesso='$data_c' where nome='$_admin_nome'",$link_db)or die (mysql_erro());

     ?>