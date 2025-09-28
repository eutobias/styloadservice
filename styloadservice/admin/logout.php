<?

$login=$_SESSION[admin_nome];
session_start();
session_unregister("admin_id");
session_unregister("admin_nome");
session_unregister("admin_login");
session_unregister("admin_senha");
session_unregister("admin_logado");
session_unregister('p_acesso');
session_unset();
session_destroy();

$msg_erro= $login." você saiu do sistema!!!<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";

?>