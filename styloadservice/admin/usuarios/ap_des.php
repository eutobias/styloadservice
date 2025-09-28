<?

if ($_GET[subacao]=="aprovar_todos") {

$ativar=mysql_query("UPDATE login SET ativo='1' WHERE ativo='0' OR ativo=''",$link_db);
if ($ativar) {
$msg_erro="Todos os usuarios foram ativados com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
} }
else {
if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }
    $ativo=0;
    $des="des";
    if ($_GET[act]=="a") { $ativo=1; $des=""; }

$ativar=mysql_query("UPDATE login SET ativo='$ativo' WHERE id='$_GET[u_id]'",$link_db);

if ($ativar) {
$msg_erro="Usuario ".$des."ativado com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
} }
?>