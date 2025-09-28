<?
if ($_SESSION['anun_logado']=="ok") {
require "lib/lib.secure.php";

$r_banner=mysql_query("SELECT * from banners where anunciante='$_SESSION[anun_nome]' order by id desc",$link_db);
$n_banner=mysql_num_rows($r_banner);
$msg="Nenhum banner cadastrado em seu nome $_SESSION[anun_nome].";

if ($n_banner=="0") { ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td class="cel_tit_banner" align="center" width="300">
<?=$msg?>
</td>
</tr>
</table>
<? } else { ?>
<table border="0" cellspacing="2" width="600" cellpadding="0" align="center">
<tr>
<td colspan="3" class="cel_menu">
Olá <b><?=$_SESSION[anun_login]?></b>, você verá seus banners abaixo.<br><br>

<small>
<b>Algumas considerações:</b><br>
<b>&raquo;</b> Os banners em flash não mostram quantos clicks receberam.<br>
</small>
</td>
</tr>
</table>
<? while($banner=mysql_fetch_array($r_banner)) { ?>

<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td></td>
<td class="cel_tit_banner">Views</td>
<td class="cel_tit_banner">Clicks</td>
</tr>
<tr>
<td class="cel_banner" align="center" width="<?=$banner[largura]+2?>" height="<?=$banner[altura]+2?>">
<?
if ($banner[tipo]=="flash") {
print "
<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"$banner[largura]\" height=\"$banner[altura]\">
  <param name=\"movie\" value=\"$banner[url]\">
  <param name=\"quality\" value=\"high\">
  <param name=\"scale\" value=\"exactfit\">
  <embed src=\"$banner[url]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" scale=\"exactfit\" width=\"$banner[largura]\" height=\"$banner[altura]\" ></embed>
</object>";
} else {
print "<img border=\"0\" src=\"$banner[url]\" width=\"$banner[largura]\" height=\"$banner[altura]\" />";
} ?>
</td>
<td class="cel_banner" align="center"><?=$banner[views]?></td>
<td class="cel_banner" align="center"><?=$banner[click]?></td>
</tr>
</table>
<? } } } ?>