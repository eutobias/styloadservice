<?
require "lib/lib.secure.php";

if (!is_numeric($_GET[u_id])) {
	$msg_erro="Erro não identificado redirecionando para a página inicial.<br>
    Redirecionando se não quiser esperar <a href=?>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?\">";
    include "msg_erro.php";
    exit; }

$b_r=mysql_query("SELECT id FROM banners WHERE user_id='$_GET[u_id]'",$link_db);
$b=mysql_num_rows($b_r);
$z_r=mysql_query("SELECT id FROM zonas  WHERE user_id='$_GET[u_id]'");
$z=mysql_num_rows($z_r);
$a_r=mysql_query("SELECT id FROM anunciantes  WHERE user_id='$_GET[u_id]'");
$a=mysql_num_rows($a_r);
$r=mysql_query("SELECT nome FROM login  WHERE id='$_GET[u_id]'");
$n=mysql_fetch_row($r);
?>
<table align="center" width="350" border="0" cellspacing="2" cellpadding="0">
<tr><td align="center" class="cel_tit">Estatísticas gerais de <b><?=$n[0]?></b></td></tr>
<tr><td class="cel_menu">
Total de banners deste usuario <?=$b?>.<br>
Total de zonas deste usuario <?=$z?>.<br>
Total de anunciantes deste usuario <?=$a?>.
</td></tr>
</table>