<?

$login=$_SESSION[anun_login];
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

$msg_erro= $login." voc� saiu do sistema!!!<br>
    Redirecionando se n�o quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";

?>