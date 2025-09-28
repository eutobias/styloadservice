<?
require "lib/lib.secure.php";
include "banners/menu.php";

if ($_POST[db_editar]=="ok") {

v_form($_POST[db_editar],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_url],"URL do banner","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_link],"Link do site do anunciante","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_tipo],"Tipo do banner","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_tamanho],"Tamanho do banner","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_zona],"Zona onde o banner irá aparecer","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_limitacao],"Limitações do banner","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[dia],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[mes],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[ano],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_anunciante],"Anunciante","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_POST[banner_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");

if ($_POST[banner_limitacao]=="clicks") {
v_form($_POST[banner_q_clicks],"Quantidade de Clicks","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
$q_limitacao=$_POST[banner_q_clicks];
}
if ($_POST[banner_limitacao]=="views") {
v_form($_POST[banner_q_views],"Quantidade de Views","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
$q_limitacao=$_POST[banner_q_views];
}
if ($_POST[banner_limitacao]=="data") {
$q_limitacao=$_POST[ano].$_POST[mes].$_POST[dia];
}

$sel_v_l_zona_r=mysql_query("SELECT id,tamanho FROM zonas WHERE id='$_POST[banner_zona]'",$link_db);
$l_zona=mysql_fetch_row($sel_v_l_zona_r);

if ($l_zona[1] != $_POST[banner_tamanho]) {
$msg_erro="Você não pode adicionar esse banner a esta zona porque esta<br>
	zona somente exibe banners do tamanho de ".$l_zona[1].".<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]\">";
    include "msg_erro.php";
    exit; }

$tam=explode("x",$_POST[banner_tamanho]);
$largura=$tam[0];
$altura=$tam[1];

$data_c=date("d/m/Y");
    $cad_banner=mysql_query("UPDATE banners SET anunciante='$_POST[banner_anunciante]',link='$_POST[banner_link]',url='$_POST[banner_url]',tipo='$_POST[banner_tipo]',largura='$largura',altura='$altura',ativo='$_POST[banner_ativo]',zona_id='$_POST[banner_zona]',limitacao='$_POST[banner_limitacao]',q_limitacao='$q_limitacao' WHERE id='$_POST[banner_id]'",$link_db) or die (mysql_error());
if ($cad_banner) {
$msg_erro="Banner Editado com sucesso<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"10;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]\"><br><br>";

if ($_POST[banner_tipo]=="flash") {
$msg_erro=$msg_erro."<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"$largura\" height=\"$altura\">
  <param name=\"movie\" value=\"$_POST[banner_url]\">
  <param name=\"quality\" value=\"high\">
  <param name=\"scale\" value=\"exactfit\">
  <embed src=\"$_POST[banner_url]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" scale=\"exactfit\" width=\"$largura\" height=\"$altura\" ></embed>
</object>";
} else {
$msg_erro=$msg_erro."<img src=\"$_POST[banner_url]\" width=\"$largura\" height=\"$altura\" />";
}   include "msg_erro.php";
    exit; }
    } else {
if (!$_GET[b_id] && !$_GET[u_id]) {
$msg_erro="Nenhum banner selecionada.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]\">";
    include "msg_erro.php";
    exit; }

v_form($_GET[b_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");
v_form($_GET[u_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=$_GET[u_id]&b_id=$_GET[b_id]");

$ed_banner=mysql_query("SELECT id,url,link,tipo,views,click,largura,altura,zona_id,ativo,limitacao,q_limitacao FROM banners WHERE id='$_GET[b_id]'",$link_db);
$banner=mysql_fetch_array($ed_banner);
?>
<form method="post" action="?acao=usuarios&subacao=dados_gerais&subacao2=editar_banner&u_id=<?=$_GET[u_id]?>&b_id=<?=$_GET[b_id]?>">
<input type="hidden" name="db_editar" value="ok" />
<input type="hidden" name="banner_id" value="<?=$banner[id]?>" />

<table border="0" align="center" width="500" cellspacing="2" cellpadding="0">
<tr>
<td colspan="2" align="center" class="cel_menu"><b>Editar Banner</b></td>
</tr>
<tr><td height="10" colspan="2"></td></tr>
<tr>
<td colspan="2" align="center" class="cel_tit_banner"><b>Dados do Banner</b></td>
</tr>
<tr>
<td width="150">URL do Banner:</td>
<td><input type="text" value="<?=$banner[url]?>" size="60" name="banner_url" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Link do Site Anunciante:</td>
<td><input type="text" size="60" value="<?=$banner[link]?>" name="banner_link" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Tipo de Banner:</td>
<td>
<select name="banner_tipo" class="form_txt" />
<option value="gif" <? if ($banner[tipo]=="gif"){?>selected<?}?>>Gif (.gif)</option>
<option value="flash" <? if ($banner[tipo]=="flash"){?>selected<?}?>>Flash (.swf)</option>
<option value="jpeg" <? if ($banner[tipo]=="jpeg"){?>selected<?}?>>Jpeg (.jpg)</option>
</select>
</td>
</tr>
<tr>
<td>Tamanho do Banner:</td>
<? $tamanho=$banner[largura]."x".$banner[altura]; ?>
<td>
<select name="banner_tamanho" class="form_txt">
<option value='468x60' <? if ($tamanho=="468x60"){?>selected<?}?>>IAB Full Banner (468 x 60)</option>
<option value='234x60' <? if ($tamanho=="234x60"){?>selected<?}?>>IAB Half Banner (234 x 60)</option>
<option value='728x90' <? if ($tamanho=="728x90"){?>selected<?}?>>IAB Leader Board (728 x 90) *</option>
<option value='88x31' <? if ($tamanho=="88x31"){?>selected<?}?>>IAB Micro Bar (88 x 31)</option>
<option value='120x90' <? if ($tamanho=="120x90"){?>selected<?}?>>IAB Button 1 (120 x 90)</option>
<option value='120x60' <? if ($tamanho=="120x60"){?>selected<?}?>>IAB Button 2 (120 x 60)</option>
<option value='125x125' <? if ($tamanho=="125x125"){?>selected<?}?>>IAB Square Button (125 x 125)</option>
<option value='120x240' <? if ($tamanho=="120x240"){?>selected<?}?>>IAB Vertical Banner (120 x 240)</option>
<option value='180x150' <? if ($tamanho=="180x150"){?>selected<?}?>>IAB Rectangle (180 x 150) *</option>
<option value='300x250' <? if ($tamanho=="300x250"){?>selected<?}?>>IAB Medium Rectangle (300 x 250) *</option>
<option value='336x280' <? if ($tamanho=="336x280"){?>selected<?}?>>IAB Large Rectangle (336 x 280)</option>
<option value='240x400' <? if ($tamanho=="240x400"){?>selected<?}?>>IAB Vertical Rectangle (240 x 400)</option>
<option value='250x250' <? if ($tamanho=="250x250"){?>selected<?}?>>IAB Square Pop-up (250 x 250)</option>
<option value='120x600' <? if ($tamanho=="120x600"){?>selected<?}?>>IAB Skyscraper (120 x 600)</option>
<option value='160x600' <? if ($tamanho=="160x600"){?>selected<?}?>>IAB Wide Skyscraper (160 x 600) *</option>
</select>
</td>
</tr>
<tr>
<td>Zona em que o banner aparecerá:</td>
<td>
<select name="banner_zona" class="form_txt" />
<?
$r_zona=mysql_query("SELECT id,nome FROM zonas WHERE user_id='$_GET[u_id]'",$link_db);
while ($zona=mysql_fetch_row($r_zona)) {
?>
<option value="<?=$zona[0]?>" <? if ($banner[zona_id]==$zona[0]){?>selected<?}?>><?=$zona[1]?></option>
<? } ?>
</select>
</td>
</tr>
<tr>
<td>O banner está ativo:</td>
<td>
<select name="banner_ativo" class="form_txt" />
<option value="S" <? if ($banner[ativo]=="S"){?>selected<?}?>>Sim</option>
<option value="N" <? if ($banner[ativo]=="N"){?>selected<?}?>>Não</option>
</select>
</td>
</tr>
<tr><td height="10" colspan="2"></td></tr>
<tr>
<td colspan="2" align="center" class="cel_tit_banner"><b>Limitações</b></td>
</tr>
<tr>
<td colspan="2" class="cel_banner">Limitação Atual:
<?
if ($banner[limitacao]=="N") { print "Nenhuma"; }
elseif ($banner[limitacao]=="data") {
if ($banner[q_limitacao] <= date("Ymd")) { $msg=" - <b>Este banner já expirou.</b>"; }
print "Data - Expira em:".substr($banner[q_limitacao],-2)."/".substr($banner[q_limitacao],-4,-2)."/".substr($banner[q_limitacao],0,4).$msg; }
else {
if ($banner[limitacao]=="clicks") { if ($banner[q_limitacao] <= $banner[click]) { $msg=" - <b>Este banner já expirou.</b>"; } }
if ($banner[limitacao]=="views") { if ($banner[q_limitacao] <= $banner[views]) { $msg=" - <b>Este banner já expirou.</b>"; } }
print ucfirst($banner[limitacao])." - Qtd: ".$banner[q_limitacao].$msg;
}
?>
</td>
</tr>
<tr>
<td colspan="2">
<table border="0" width="505" cellspacing="2" cellpadding="0">
<tr>
<td rowspan="2" align="center" class="cel_banner"><input type="radio" name="banner_limitacao" value="N" /> Ilimitado</td>
<td class="cel_banner" align="center"><input type="radio" name="banner_limitacao" value="views" /> Views</td>
<td class="cel_banner" align="center"><input type="radio" name="banner_limitacao" value="clicks" /> Clicks</td>
<td class="cel_banner" align="center"><input type="radio" name="banner_limitacao" value="data" /> Data</td>
</tr>
<tr>
<td class="cel_banner" align="center">Qtd. <input type="text" size="10" name="banner_q_views" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
<td class="cel_banner" align="center">Qtd. <input type="text" size="10" name="banner_q_clicks" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
<td class="cel_banner" align="center">
<SELECT NAME="dia" class="form_txt">
<option value="01" >01
<option value="02" >02
<option value="03" >03
<option value="04" >04
<option value="05" >05
<option value="06" >06
<option value="07" >07
<option value="08" >08
<option value="09" >09
<option value="10" >10
<option value="11" >11
<option value="12" >12
<option value="13" >13
<option value="14" >14
<option value="15" >15
<option value="16" >16
<option value="17" >17
<option value="18" >18
<option value="19" >19
<option value="20" >20
<option value="21" >21
<option value="22" >22
<option value="23" >23
<option value="24" >24
<option value="25" >25
<option value="26" >26
<option value="27" >27
<option value="28" >28
<option value="29" >29
<option value="30" >30
<option value="31" >31
</SELECT>
<SELECT NAME="mes" class="form_txt">
<option value="01" >01
<option value="02" >02
<option value="03" >03
<option value="04" >04
<option value="05" >05
<option value="06" >06
<option value="07" >07
<option value="08" >08
<option value="09" >09
<option value="10" >10
<option value="11" >11
<option value="12" >12
</SELECT>
<SELECT NAME="ano" class="form_txt">
<option value="2004" >2004
<option value="2005" >2005
<option value="2006" >2006
<option value="2007" >2007
</SELECT>
</td>
</tr>
<tr><Td colspan="10"><b><small>Importante:</b> Banners em flash, devem ser limitados por data ou por views, pois não é possível gravar cliques em banners em flash.</b></td></tr>
</table>
</td>
</tr>
<tr><td height="10" colspan="2"></td></tr>
<tr>
<td colspan="2" align="center" class="cel_tit_banner"><b>Dados do Anunciante</b></td>
</tr>
<tr>
<td>Este banner pertence ao anunciante:</td>
<td>
<select name="banner_anunciante" class="form_txt" />
<?
$r_zona=mysql_query("SELECT nome FROM anunciantes WHERE user_id='$_GET[u_id]'",$link_db);
while ($zona=mysql_fetch_row($r_zona)) {
?>
<option value="<?=$zona[0]?>"><?=$zona[0]?></option>
<? } ?>
</select>
</td>
</tr>
<tr><td height="10" colspan="2"></td></tr>
<tr>
<td></td>
<td align="center"><input type="submit" value="Editar Banner" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr>
</table>
<? } ?>