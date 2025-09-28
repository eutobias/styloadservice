<? require "lib/lib.secure.php"; ?>
<table border="0" cellspacing="5" cellpadding="0" align="center">
<tr>
<td width="500" class="cel_menu" align="center"><b>Gerar Código</b></td>
</tr>
<tr><td class="cel_tit" width="500" style="text-align:justify;">
Estão disponíveis no momento uma forma para chamar seus banners, através de um iframe.<br>
O processo de geração do código é bem simples.<br>
<ol>
<li>Você precisa indicar antes de tudo qual zona de publicidade será mostrada.
<li>E em seguida qual tipo e código gerar.
</td></tr>
<tr>
<td class="cel_tit" align="center">
<? if ($_POST['zona_id']) { ?>
<table align="center">
<tr>
<td colspan="2"><b>Escolha agora o tipo de código?</b></td>
</tr>
<tr><td>
<form action="?acao=gerar_codigo" method="post">
<input type="hidden" value="<?=$_POST[zona_id]?>" name="z_id">
<select name="tipo_id" class="form_txt">
<option value="" selected>Escolha uma das opções</option>
<option value="ifr">Iframe</option>
</select>
<input type="submit" value="&raquo;" class="form_bt">
</form>
</td></tr>
</table>
<? } elseif ($_POST['tipo_id']) { ?>
<table align="center">
<tr>
<td colspan="2"><b>Código gerado com sucesso</b></td>
</tr>
<tr>
<td colspan="2">Copie e cole este código em seu site.</td>
</tr>
<tr><td>
<? if ($_POST['tipo_id']=="js") {
$cod="<!--Inicio do código gerado em ".$config['site_nome']." -->
<script language=\"javascript\" src=\"".$config[site_url]."/ads_js.php?u_id=".$_SESSION['user_id']."&z_id=".$_POST['z_id']."\"></script>
<!--Fim do código gerado em ".$config['site_nome']." -->";
} else {
$r_zona=mysql_query("SELECT tamanho FROM zonas WHERE id='$_POST[z_id]'",$link_db);
$z=mysql_fetch_row($r_zona);
$t=explode("x",$z[0]);
$cod="<!--Inicio do código gerado em ".$config['site_nome']." -->
<iframe scrolling=\"no\" src=\"".$config[site_url]."/ads_ifr.php?u_id=".$_SESSION['user_id']."&z_id=".$_POST['z_id']."\" frameborder=\"0\" framespacing=\"0\" width=\"".$t[0]."\" height=\"".$t[1]."\"></iframe>
<!--Fim do código gerado em ".$config['site_nome']." -->";
} ?>
<textarea rows="5" cols="60" style="text-align:center;" class="form_txt">
<?=$cod?>
</textarea>
</td></tr>
</table>
<? } else { ?>
<table align="center">
<tr>
<td colspan="2"><b>Escolha a zona de publicidade?</b></td>
</tr>
<tr><td>
<form action="?acao=gerar_codigo" method="post">
<select name="zona_id" class="form_txt">
<option value="" selected>Escolha uma das opções</option>
<?
$r_zona=mysql_query("SELECT id,nome FROM zonas WHERE user_id='$_SESSION[user_id]'",$link_db);
while ($z=mysql_fetch_row($r_zona)) {
print "<option value=\"".$z[0]."\">".$z[1]."</option>"; }
?>
</select>
<input type="submit" value="&raquo;" class="form_bt">
</form></td></tr>
</table>
<? } ?>
</td>
</tr>
</table>