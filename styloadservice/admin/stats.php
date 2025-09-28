<?
$c_r=mysql_query("SELECT id FROM login",$link_db);
$c=mysql_num_rows($c_r);
$b_r=mysql_query("SELECT id FROM banners",$link_db);
$b=mysql_num_rows($b_r);
$z_r=mysql_query("SELECT id FROM zonas");
$z=mysql_num_rows($z_r);
$a_r=mysql_query("SELECT id FROM anunciantes");
$a=mysql_num_rows($a_r);
?>
<table border="0" cellspacing="5" cellpadding="0" align="center" width="350">
<tr>
<td colspan="3" class="cel_menu"><b>Estatíticas do Site.</b></td>
</tr>
<tr>
<td colspan="3" class="cel_tit">
Total de Usuarios Cadastrados: <?=$c?><br>
Total de Banners Cadastrados: <?=$b?><br>
Total de Zonas de publicidade cadastradas: <?=$z?><br>
Total de Anunciantes cadastrados: <?=$a?><br>
Média de Banners por usuario: <?=round($b/$c,2)?><br>
Média de Zonas de publicidade por usuario: <?=round($z/$c,2)?><br>
Média de Anunciantes por usuario: <?=round($a/$c,2)?><br>
</td>
</tr>
</table>