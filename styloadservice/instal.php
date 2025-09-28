<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Instalação StyloAdService - Powered by StyloAdService</title>
<link rel="stylesheet" type="text/css" href="estilos.css" />
</head>
<body topmargin="10" leftmargin="0">
<table width="730" align="center" border="0" cellspacing="3" cellpadding="0">
<tr>
<td class="cel_topo"><img src="images/logo.gif" border="0"></a></td>
</tr>
<tr>
<td align="center" class="cel_menu">
<? if ($_GET[passo]=="1") { ?>
  <form method="post" action="?passo=2">
     <table border="0" cellspacing="0" cellpadding="2" align="center">
     <tr>
       <td colspan="2" align="center" class="cel_tit"><small><b>Informações do banco de dados</b></small></td>
     </tr>
     <tr>
       <td align="left"><small>Host do banco de dados:</small></td>
       <td><input type="text" name="host_db" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';" size="40" />
     </tr>
     <tr>
       <td align="left"><small>Usuario do banco de dados:</small></td>
       <td><input type="text" name="user_db" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>Senha do banco de dados:</small></td>
       <td><input type="password" name="senha_db" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>Nome do banco de dados:</small></td>
       <td><input type="text" value="styloadservice" name="nome_db" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td></td>
       <td><small><input type="checkbox" value="S" name="cria_db" /> Criar Banco de dados</small></td>
     </tr>
     <tr>
       <td colspan="2" align="center" class="cel_tit"><small><b>Informações do site</b></small></td>
     </tr>
     <tr>
       <td align="left"><small>Nome do site:</small></td>
       <td><input type="text" name="site_nome" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>URL do site:</small></td>
       <td><input type="text" value="http://" name="site_url" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td colspan="2" align="center" class="cel_tit"><small><b>Informações do administrador</b></small></td>
     </tr>
     <tr>
       <td align="left"><small>Nome completo do administrador:</small></td>
       <td><input type="text" name="nome" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>E-mail do administrador:</small></td>
       <td><input type="text" name="email1" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>Repita o e-mail do administrador:</small></td>
       <td><input type="text" name="email2" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>Login do administrador:</small></td>
       <td><input type="text" name="login" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>Senha do administrador:</small></td>
       <td><input type="password" name="senha" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
       <td align="left"><small>Repita a Senha do administrador:</small></td>
       <td><input type="password" name="senha_b" class="form_txt" size="40" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"/>
     </tr>
     <tr>
     <td align="right" colspan="2">
     <input type="submit" value="Avançar &raquo;" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"/>
     </td>
     </tr>
     </table>
</form>

<? } elseif ($_GET[passo]=="2") {
$conecta_db=@mysql_connect($_POST[host_db],$_POST[user_db],$_POST[senha_db]);

if (empty($_POST[cria_db])) {
$seleciona_db=@mysql_select_db($_POST[nome_db]);
if (!$seleciona_db) {
$erro=1;
$msg_erro=$msg_erro."Não foi selecionar o banco de dados para uso.<br>";
} }

if (empty($_POST[host_db]) || empty($_POST[user_db]) || empty($_POST[nome_db]) || empty($_POST[nome]) || empty($_POST[login]) || empty($_POST[senha]) || empty($_POST[senha_b]) || empty($_POST[email1]) || empty($_POST[email2]) || empty($_POST[site_nome]) || empty($_POST[site_url])) {
$erro=1;
$msg_erro=$msg_erro."Todos os campos devem ser preenchidos. (exceto a senha do banco de dados (lógicamente quando o usuario do banco de dados não usa senha))<br>";
}
if ($_POST[senha] != $_POST[senha_b]) {
$erro=1;
$msg_erro=$msg_erro."A senhas do administrador não conferem.<br>";
}
if ($_POST[email1] != $_POST[email2]) {
$erro=1;
$msg_erro=$msg_erro."Os e-mails do administrador não conferem.<br>";
}
if (!eregi("[@.]",$_POST[email1]) || !eregi("[@.]",$_POST[email2])) {
$erro=1;
$msg_erro=$msg_erro."Preencha e-mails válidos.<br>";
}
if (strlen($_POST[senha]) < "4") {
$erro=1;
$msg_erro=$msg_erro."A senha deve ter no mínimo 4 caracteres.<br>";
}
if (strlen($_POST[senha]) > "15") {
$erro=1;
$msg_erro=$msg_erro."A senha deve ter no máximo 15 caracteres.<br>";
}
if (!$conecta_db) {
$erro=1;
$msg_erro=$msg_erro."Não foi possível conectar com o banco de dados.<br>";
}

if ($erro > "0") {
?>
<div style="width:400px;padding:20px;text-align:justify;border-style:dashed;border-width:1px;border-color:#CC3300;background-color:#FFD7D7;">
<font color="#CC3300">
<center><b>Os seguinte erros foram retornados<B></center><br>
<?=$msg_erro?>
</font>
</div>
<br>
 <a href="instalar.php?passo=1"><font color="#CC3300">clique aqui para voltar</font></a>
<? } else {
$cont_arq_config="<?

##################################
#                                #
# StyloAdService v1.0            #
# Autor: Tobias Taurian Viana    #
# Licença: GNU-GPL               #
#                                #
# Script Genuinamente Brasileiro #
#                                #
##################################

#### Configuração do Banco de dados
\$db[host]=\"".$_POST[host_db]."\";
\$db[login]=\"".$_POST[user_db]."\";
\$db[senha]=\"".$_POST[senha_db]."\";
\$db[db]=\"".$_POST[nome_db]."\";

#### Outras configurações
\$config['site_nome']=\"".$_POST[site_nome]."\";
\$config['site_url']=\"".$_POST[site_url]."\";
\$config['site_slogan']=\"Site Slogan\";
\$config['aceitar_cadastro']=\"S\"; //S => sim | N => não
\$config['contato_email']=\"S\"; //S => sim | N=> não
\$config['user_alterar_dados']=\"S\"; //S => sim | N=> não
\$config['anun_alterar_dados']=\"S\"; //S => sim | N=> não
\$config['num_pag_user_admin']=\"20\";
\$config['num_pag_banner_admin']=\"5\";
\$config['num_pag_zona_admin']=\"10\";
\$config['num_pag_anun_admin']=\"10\";
\$config['num_banner_session']=\"10\";
\$config['id_conta_propaganda']=\"0\";
\$config['admin_nome']=\"".$_POST[nome]."\";
\$config['admin_email']=\"".$_POST[email1]."\";
\$config[gmt_data]=\"-3\";
\$config['versao']=\"1.0\";

?>";

$fp = fopen ("config.php", "w+");
fwrite ($fp, $cont_arq_config);
fclose ($fp);

if ($_POST[cria_db] == "S") {
@mysql_query("CREATE DATABASE $_POST[nome_db]",$conecta_db) or die (mysql_errno()." - ".mysql_error());
@mysql_select_db($_POST[nome_db]);
}

$cria_login="CREATE TABLE login (
  id bigint(250) NOT NULL auto_increment,
  nome varchar(250) NULL default '',
  email varchar(100) NULL default '',
  login varchar(15) NULL default '',
  senha varchar(50) NULL default '',
  nome_site varchar(250) NULL default '',
  url_site varchar(250) NULL default '',
  msn varchar(250) NULL default '',
  icq varchar(250) NULL default '',
  aim varchar(250) NULL default '',
  yahoo varchar(250) NULL default '',
  conhecimentos text NULL,
  local varchar(250) NULL default '',
  cep varchar(30) NULL default '',
  nivel enum('0','1') NULL default '0',
  ativo enum('0','1') NULL default '0',
  p_acesso varchar(50) NULL default '',
  u_acesso varchar(50) NULL default '',
  u_a_time varchar(250) NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;";
$cria_banner="CREATE TABLE banners (
  id bigint(250) NOT NULL auto_increment,
  user_id varchar(250) NOT NULL default '',
  anunciante varchar(50) NOT NULL default '',
  link varchar(250) NOT NULL default '',
  url varchar(250) NOT NULL default '',
  tipo enum('flash','gif','jpeg') NOT NULL default 'gif',
  largura varchar(5) NOT NULL default '',
  altura varchar(5) NOT NULL default '',
  views varchar(250) NOT NULL default '',
  click varchar(250) NOT NULL default '',
  data_cad varchar(12) NOT NULL default '',
  ativo enum('S','N') NOT NULL default 'S',
  zona_id varchar(25) NOT NULL default '',
  limitacao varchar(10) NOT NULL default 'N',
  q_limitacao varchar(25) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;";
$cria_zonas="CREATE TABLE zonas (
  id bigint(25) NOT NULL auto_increment,
  user_id varchar(250) NOT NULL default '',
  nome varchar(250) NOT NULL default '',
  tamanho varchar(12) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;";
$cria_anunciantes="CREATE TABLE anunciantes (
  id bigint(250) NOT NULL auto_increment,
  user_id varchar(250) NOT NULL default '',
  nome varchar(250) NOT NULL default '',
  login varchar(50) NOT NULL default '',
  senha varchar(50) NOT NULL default '',
  email varchar(50) NOT NULL default '',
  p_acesso varchar(250) NOT NULL default '',
  u_acesso varchar(250) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;";

$c_login=@mysql_query($cria_login,$conecta_db);
$c_banner=@mysql_query($cria_banner,$conecta_db);
$c_zonas=@mysql_query($cria_zonas,$conecta_db);
$c_anunciantes=@mysql_query($cria_anunciantes,$conecta_db);

$i_login=@mysql_query("INSERT INTO login (nome,email,login,senha,nivel) VALUES ('$_POST[nome]','$_POST[email1]','$_POST[login]','".md5($_POST[senha])."','1')",$conecta_db);
?>

<table width="300" border="0" cellspacing="0" cellpadding="2" align="center">
   <tr>
     <td colspan="2" align="center" class="cel_tit"><small><b>Status</b></small></td>
   </tr>
   <tr>
     <td align="left">Criado a tabela de login</td>
     <td align="center"><? if ($c_login) { print "<b>Ok</b>"; }
			else { $erro=1; print "<b><font color=\"#CC3300\">Error</font></b>"; } ?></td>
   </tr>
   <tr>
     <td align="left">Criado a tabela de banners</td>
     <td align="center"><? if ($c_banner) { print "<b>Ok</b>"; }
			else { $erro=1; print "<b><font color=\"#CC3300\">Error</font></b>"; } ?></td>
   </tr>
   <tr>
     <td align="left">Criado a tabela das zonas</td>
     <td align="center"><? if ($c_zonas) { print "<b>Ok</b>"; }
			else { $erro=1; print "<b><font color=\"#CC3300\">Error</font></b>"; } ?></td>
   </tr>
   <tr>
     <td align="left">Criado a tabela de anunciantes</td>
     <td align="center"><? if ($c_anunciantes) { print "<b>Ok</b>"; }
			else { $erro=1; print "<b><font color=\"#CC3300\">Error</font></b>"; } ?></td>
   </tr>
   <tr>
     <td align="left">Cadastrando Administrador</td>
     <td align="center"><? if ($i_login) { print "<b>Ok</b>"; }
			else { $erro=1; print "<b><font color=\"#CC3300\">Error</font></b>"; } ?></td>
   </tr>

   <? if ($erro > 0) { ?>
   <tr>
   <td colspan="2" align="center">
   <a href="?passo=1">Houve algum erro clique aqui para voltar</a>
   </td></tr>
   <? } else {?>
   <tr>
   <td colspan="2" align="center">
   <B>Sucesso!!!</B><br>
   A instalação foi efetuado com sucesso<br><br>

   <font color="#CC3300">Antes de tudo <B>DELETE O ARQUIVO INSTALAR.PHP</B>.</font><br><br>

   <a href="admin/index.php" target="_blank">clique aqui</a> para administrar o sistema.
   </table>

<? } } } elseif ($_GET[passo]=="3") { ?>
<? } elseif ($_GET[passo]=="4") { ?>
<? } else { ?>
<div style="text-align:justify;width:600px">
Bem vindo ao programa de instalação do StyloAdService, um programa <b>genuinamente brasileiro</b>
, este programa lhe permite oferecer um serviço de troca de banners onde
os usuarios administram os banners mostrados em sua página e você administrador tem total controle sobre
as ações dos usuarios, está página o ajudará a instalar esse sistema. <br><br><div align="right">Clique <b><a href="?passo=1">aqui</a></b> para continuar a instalação.</div>
</div>
<? } ?>
</td>
</tr>
</table>

</body>
</html>