<?

if ($_GET['b_id']) {

require "lib/lib.conexao.php";
require_once ("lib/lib.funcoes.php");

   function v_ad($campo) {
    if (!is_numeric($campo)) {
    $erro=1;
    return $erro;
    } }

v_ad($_GET['b_id']);

if ($erro == 0) {
$upd_click=mysql_query("UPDATE banners SET click=click + 1 WHERE id='$_GET[b_id]'",$link_db);
$sel_url=mysql_query("SELECT url,link FROM banners WHERE id='$_GET[b_id]'",$link_db);
$visita=mysql_fetch_array($sel_url);

header("location: $visita[link]");
} } ?>