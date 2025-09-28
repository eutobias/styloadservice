<?

if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]\">";
    include "msg_erro.php";
    exit; }
    $ativo="N";
    $des="des";
    if ($_GET[act]=="a") { $ativo="S"; $des=""; }

$ativar=mysql_query("UPDATE banners SET ativo='$ativo' WHERE id='$_GET[b_id]'",$link_db);

if ($ativar) {
$msg_erro="Banner ".$des."ativado com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=ver_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]\">";
    include "msg_erro.php";
}
?>