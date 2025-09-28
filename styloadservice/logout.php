<?

$login=$_SESSION[user_nome];
session_start();
session_unregister("user_id");
session_unregister("user_nome");
session_unregister("user_login");
session_unregister("user_senha");
session_unregister("user_nivel");
session_unregister("user_logado");
session_unregister('p_acesso');
session_unset();
session_destroy();

$msg_erro= $login." você saiu do sistema!!!<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";

?>