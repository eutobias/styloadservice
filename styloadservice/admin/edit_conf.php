<?
require "lib/lib.secure.php";

if ($_POST['edita_conf']=="ok") {

$ec="<?

##################################
#                                #
# StyloAdService v1.0beta        #
# Autor: Tobias Taurian Viana    #
# Licença: GNU-GPL               #
#                                #
# Script Genuinamente Brasileiro #
#                                #
##################################

#### Configuração do Banco de dados
\$db['host']=\"".$_POST[a_host]."\";
\$db['login']=\"".$_POST[a_login]."\";
\$db['senha']=\"".$_POST[a_senha]."\";
\$db['db']=\"".$_POST[a_db]."\";

#### Outras configurações
\$config['site_nome']=\"".$_POST[a_site_nome]."\";
\$config['site_url']=\"".$_POST[a_site_url]."\";
\$config['site_slogan']=\"".$_POST[a_site_slogan]."\";
\$config['aceitar_cadastro']=\"".$_POST[a_aceitar_cadastro]."\"; //S => sim | N => não
\$config['contato_email']=\"".$_POST[a_contato_email]."\"; //S => sim | N=> não
\$config['user_alterar_dados']=\"".$_POST[a_user_alterar_dados]."\"; //S => sim | N=> não
\$config['anun_alterar_dados']=\"".$_POST[a_anun_alterar_dados]."\"; //S => sim | N=> não
\$config['num_pag_user_admin']=\"".$_POST[a_num_pag_user_admin]."\";
\$config['num_pag_banner_admin']=\"".$_POST[a_num_pag_banner_admin]."\";
\$config['num_pag_zona_admin']=\"".$_POST[a_num_pag_zona_admin]."\";
\$config['num_pag_anun_admin']=\"".$_POST[a_num_pag_anun_admin]."\";
\$config['num_banner_session']=\"".$_POST[a_num_banner_session] ."\";
\$config['id_conta_propaganda']=\"".$_POST[a_id_conta_propaganda] ."\";
\$config['admin_nome']=\"".$_POST[a_admin_nome]."\";
\$config['admin_email']=\"".$_POST[a_admin_email]."\";
\$config[gmt_data]=\"".$_POST[a_gmt_data]."\";
\$config['versao']=\"1.0\";
?>";

$fp = fopen ("../config.php", "w+");
$fw = fwrite ($fp, $ec);
fclose ($fp);

if ($fw) { ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr><td class="cel_menu" align="center" colspan="2" width="300"><b>
Configurações editadas com sucesso.</b></td></tr>
</table><br>
<? } else { ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr><td class="cel_menu" align="center" colspan="2" width="300"><b>
Houve um erro ao tentar editar as configurações, verifique as permições do arquivo de configuração e tente novamente.</b></td></tr>
</table><br>
<? } } include "../config.php"; ?>
<? if (!is_writable("../config.php")) { ?>
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr><td class="cel_tit" align="center" colspan="2" width="300">
<img src="../images/desativar.gif"><b> Ops!!!</b><br>
O arquivo config.php está protegido contra gravação portanto não é possível editar as configurações do site.
</td></tr>
</table>
<? } ?>

<form method="post" action="?acao=edit_conf">
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr><td class="cel_menu" align="center" colspan="2"><b>Editando as configurações do sistema</b></td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Informações do banco de dados</b></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Host do banco de dados:</td>
<td class="cel_menu"><input type="text" name="a_host" value="<?=$db[host]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Login do banco de dados:</td>
<td class="cel_menu"><input type="text" name="a_login" value="<?=$db[login]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Senha do banco de dados:</td>
<td class="cel_menu"><input type="password" name="a_senha" value="<?=$db[senha]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Nome do banco de dados:</td>
<td class="cel_menu"><input type="text" name="a_db" value="<?=$db[db]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>

<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Informações do Administrador</b></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Nome do administrador:</td>
<td class="cel_menu"><input type="text" name="a_admin_nome" value="<?=$config[admin_nome]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>
<tr>
<td width="25%" class="cel_menu">E-mail do administrador:</td>
<td class="cel_menu"><input type="text" name="a_admin_email" value="<?=$config[admin_email]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>


<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Informações do Site</b></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Nome do site:</td>
<td class="cel_menu"><input type="text" name="a_site_nome" value="<?=$config[site_nome]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>
<tr>
<td width="25%" class="cel_menu">URL do site:</td>
<td class="cel_menu"><input type="text" name="a_site_url" value="<?=$config[site_url]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>><br><small> <b>sem / no final</b> </small></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Slogan do site:</td>
<td class="cel_menu"><input type="text" name="a_site_slogan" value="<?=$config[site_slogan]?>" size="90" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>></td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Opções de Funcionamento</b></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Aceitar novos cadastros:</td>
<td class="cel_menu">
<input type="radio" name="a_aceitar_cadastro" value="S" <? if ($config['aceitar_cadastro']=="S") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Sim ·
<input type="radio" name="a_aceitar_cadastro" value="N" <? if ($config['aceitar_cadastro']=="N") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Não
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Aceitar contato por e-mail:</td>
<td class="cel_menu">
<input type="radio" name="a_contato_email" value="S" <? if ($config['contato_email']=="S") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Sim ·
<input type="radio" name="a_contato_email" value="N" <? if ($config['contato_email']=="N") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Não
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Deixar usuarios alterarem seus dados:</td>
<td class="cel_menu">
<input type="radio" name="a_user_alterar_dados" value="S" <? if ($config['user_alterar_dados']=="S") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Sim ·
<input type="radio" name="a_user_alterar_dados" value="N" <? if ($config['user_alterar_dados']=="N") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Não
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Deixar anunciantes alterarem seus dados:</td>
<td class="cel_menu">
<input type="radio" name="a_anun_alterar_dados" value="S" <? if ($config['anun_alterar_dados']=="S") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Sim ·
<input type="radio" name="a_anun_alterar_dados" value="N" <? if ($config['anun_alterar_dados']=="N") { ?>checked<? } ?> <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>Não
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Data GMT:</td>
<td class="cel_menu">
<select class="form_txt" name="a_gmt_data" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>
<option value='-12' <? if ($config['gmt_data']=="-12") {?>selected<? } ?>>(GMT - 12:00)</option>
<option value='-11' <? if ($config['gmt_data']=="-11") {?>selected<? } ?>>(GMT - 11:00)</option>
<option value='-10' <? if ($config['gmt_data']=="-10") {?>selected<? } ?>>(GMT - 10:00)</option>
<option value='-9' <? if ($config['gmt_data']=="-9") {?>selected<? } ?>>(GMT - 9:00)</option>
<option value='-8' <? if ($config['gmt_data']=="-8") {?>selected<? } ?>>(GMT - 8:00)</option>
<option value='-7' <? if ($config['gmt_data']=="-7") {?>selected<? } ?>>(GMT - 7:00)</option>
<option value='-6' <? if ($config['gmt_data']=="-6") {?>selected<? } ?>>(GMT - 6:00)</option>
<option value='-5' <? if ($config['gmt_data']=="-5") {?>selected<? } ?>>(GMT - 5:00)</option>
<option value='-4' <? if ($config['gmt_data']=="-4") {?>selected<? } ?>>(GMT - 4:00)</option>
<option value='-3' <? if ($config['gmt_data']=="-3") {?>selected<? } ?>>(GMT - 3:00)</option>
<option value='-2' <? if ($config['gmt_data']=="-2") { ?>selected<? } ?>>(GMT - 2:00)</option>
<option value='-1' <? if ($config['gmt_data']=="-1") { ?>selected<? } ?>>(GMT - 1:00)</option>
<option value='0' <? if ($config['gmt_data']=="0") { ?>selected<? } ?>>(GMT)</option>
<option value='1' <? if ($config['gmt_data']=="+1") { ?>selected<? } ?>>(GMT + 1:00)</option>
<option value='2' <? if ($config['gmt_data']=="+2") { ?>selected<? } ?>>(GMT + 2:00)</option>
<option value='3' <? if ($config['gmt_data']=="+3") { ?>selected<? } ?>>(GMT + 3:00)</option>
<option value='4' <? if ($config['gmt_data']=="+4") { ?>selected<? } ?>>(GMT + 4:00)</option>
<option value='5' <? if ($config['gmt_data']=="+5") { ?>selected<? } ?>>(GMT + 5:00)</option>
<option value='6' <? if ($config['gmt_data']=="+6") { ?>selected<? } ?>>(GMT + 6:00)</option>
<option value='7' <? if ($config['gmt_data']=="+7") { ?>selected<? } ?>>(GMT + 7:00)</option>
<option value='8' <? if ($config['gmt_data']=="+8") { ?>selected<? } ?>>(GMT + 8:00)</option>
<option value='9' <? if ($config['gmt_data']=="+9") { ?>selected<? } ?>>(GMT + 9:00)</option>
<option value='10' <? if ($config['gmt_data']=="+10") { ?>selected<? } ?>>(GMT + 10:00)</option>
<option value='11' <? if ($config['gmt_data']=="+11") { ?>selected<? } ?>>(GMT + 11:00)</option>
<option value='12' <? if ($config['gmt_data']=="+12") { ?>selected<? } ?>>(GMT + 12:00)</option>
</select>
</td>
</tr>

<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Propaganda exibida no sistema</b></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Número ratio da propaganda:</td>
<td class="cel_menu">
<input type="text" class="form_txt" name="a_num_banner_session" value="<?=$config['num_banner_session']?>" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Id da conta da propaganda:</td>
<td class="cel_menu">
<input type="text" name="a_id_conta_propaganda" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"  value="<?=$config[id_conta_propaganda]?>" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>
</td>
</tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Páginação</b></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Usuarios na administração:</td>
<td class="cel_menu">
<input type="text" class="form_txt" name="a_num_pag_user_admin" value="<?=$config['num_pag_user_admin']?>" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Banners na administração:</td>
<td class="cel_menu">
<input type="text" class="form_txt" name="a_num_pag_banner_admin" value="<?=$config['num_pag_banner_admin']?>" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Zonas na administração:</td>
<td class="cel_menu">
<input type="text" class="form_txt" name="a_num_pag_zona_admin" value="<?=$config['num_pag_zona_admin']?>" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Anunciantes na administração:</td>
<td class="cel_menu">
<input type="text" class="form_txt" name="a_num_pag_anun_admin" value="<?=$config['num_pag_anun_admin']?>" <? if (!is_writable("../config.php")) { ?>disabled<? } ?>>
</td>
</tr>
<tr><td colspan="2" class="cel_menu" align="right">
<input type="hidden" name="edita_conf" value="ok" />
<input type="Submit" value="Editar configurações" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';" <? if (!is_writable("../config.php")) { ?>disabled<? } ?> />
</td></form>
</tr>
</table>