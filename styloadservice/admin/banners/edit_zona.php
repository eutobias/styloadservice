<?
require "lib/lib.secure.php";
include "banners/menu.php";

if ($_POST[db_editar]=="ok") {

v_form($_POST[db_editar],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]");
v_form($_POST[z_id],"Campo Oculto","?");
v_form($_POST[nome_zona],"Nome da Zona","?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]");
v_form($_POST[tamanho],"Tamanho dos Banners","?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]");

$ed_zona=mysql_query("UPDATE zonas SET nome='$_POST[nome_zona]', tamanho='$_POST[tamanho]' WHERE id='$_POST[z_id]'",$link_db);

if ($ed_zona) {
$msg_erro="Zona editada com sucesso.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]\">";
    include "msg_erro.php";
    exit; }
} else {
if (!$_GET[z_id]) {
$msg_erro="Nenhuma zona selecionada.<br>
    Redirecionando se não quiser esperar <a href=?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]\">";
    include "msg_erro.php";
    exit; }
v_form($_GET[z_id],"Campo Oculto","?acao=usuarios&subacao=dados_gerais&subacao2=ver_zona&u_id=$_GET[u_id]&z_id=$_GET[z_id]");
$sel_zona=mysql_query("SELECT id,nome,tamanho FROM zonas WHERE id='$_GET[z_id]'",$link_db);
$zona=mysql_fetch_array($sel_zona);
?>
<form method="post" action="?acao=usuarios&subacao=dados_gerais&subacao2=editar_zona&u_id=<?=$_GET[u_id]?>&z_id=<?=$_GET[z_id]?>">
<input type="hidden" value="ok" name="db_editar" />
<input type="hidden" value="<?=$zona[id]?>" name="z_id" />

<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr>
<td width="350" colspan="2" class="cel_menu" align="center"><b>Editar Zonas</b></td>
</tr>
<tr>
<td>Nome da Zona:</td>
<td><input type="text" value="<?=$zona[nome]?>" size="30" name="nome_zona" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" /></td>
</tr>
<tr>
<td>Tamanho dos Banners:</td>
<td>
<select name="tamanho" class="form_txt">
<option value='468x60' <? if ($zona[tamanho]=="468x60") {?>selected<?}?>>IAB Full Banner (468 x 60)</option>
<option value='234x60' <? if ($zona[tamanho]=="234x60") {?>selected<?}?>>IAB Half Banner (234 x 60)</option>
<option value='728x90' <? if ($zona[tamanho]=="728x90") {?>selected<?}?>>IAB Leader Board (728 x 90) *</option>
<option value='88x31' <? if ($zona[tamanho]=="88x31") {?>selected<?}?>>IAB Micro Bar (88 x 31)</option>
<option value='120x90' <? if ($zona[tamanho]=="120x90") {?>selected<?}?>>IAB Button 1 (120 x 90)</option>
<option value='120x60' <? if ($zona[tamanho]=="120x60") {?>selected<?}?>>IAB Button 2 (120 x 60)</option>
<option value='125x125' <? if ($zona[tamanho]=="125x125") {?>selected<?}?>>IAB Square Button (125 x 125)</option>
<option value='120x240' <? if ($zona[tamanho]=="120x240") {?>selected<?}?>>IAB Vertical Banner (120 x 240)</option>
<option value='180x150' <? if ($zona[tamanho]=="180x150") {?>selected<?}?>>IAB Rectangle (180 x 150) *</option>
<option value='300x250' <? if ($zona[tamanho]=="300x250") {?>selected<?}?>>IAB Medium Rectangle (300 x 250) *</option>
<option value='336x280' <? if ($zona[tamanho]=="336x280") {?>selected<?}?>>IAB Large Rectangle (336 x 280)</option>
<option value='240x400' <? if ($zona[tamanho]=="240x400") {?>selected<?}?>>IAB Vertical Rectangle (240 x 400)</option>
<option value='250x250' <? if ($zona[tamanho]=="250x250") {?>selected<?}?>>IAB Square Pop-up (250 x 250)</option>
<option value='120x600' <? if ($zona[tamanho]=="120x600") {?>selected<?}?>>IAB Skyscraper (120 x 600)</option>
<option value='160x600' <? if ($zona[tamanho]=="160x600") {?>selected<?}?>>IAB Wide Skyscraper (160 x 600) *</option>
</select>
</td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Editar Zona" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/></td>
</tr>
</table>
<? } ?>