# phpMyAdmin MySQL-Dump
# version 2.2.6
# http://phpwizard.net/phpMyAdmin/
# http://www.phpmyadmin.net/ (download page)
#
# Servidor: localhost
# Tempo de Generação: Ago 26, 2004 at 07:05 PM
# Versão do Servidor: 3.23.49
# Versão do PHP: 5.0.0
# Banco de Dados : `styloadservice`
# --------------------------------------------------------

#
# Estrutura da tabela `anunciantes`
#

CREATE TABLE anunciantes (
  id bigint(250) NOT NULL auto_increment,
  user_id varchar(250) NOT NULL default '',
  nome varchar(250) NOT NULL default '',
  login varchar(50) NOT NULL default '',
  senha varchar(50) NOT NULL default '',
  email varchar(50) NOT NULL default '',
  p_acesso varchar(250) NOT NULL default '',
  u_acesso varchar(250) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Estrutura da tabela `banners`
#

CREATE TABLE banners (
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
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Estrutura da tabela `login`
#

CREATE TABLE login (
  id bigint(250) NOT NULL auto_increment,
  nome varchar(250) NOT NULL default '',
  email varchar(100) NOT NULL default '',
  login varchar(15) NOT NULL default '',
  senha varchar(50) NOT NULL default '',
  nome_site varchar(250) NOT NULL default '',
  url_site varchar(250) NOT NULL default '',
  msn varchar(250) NOT NULL default '',
  icq varchar(250) NOT NULL default '',
  aim varchar(250) NOT NULL default '',
  yahoo varchar(250) NOT NULL default '',
  conhecimentos text NOT NULL,
  local varchar(250) NOT NULL default '',
  cep varchar(30) NOT NULL default '',
  nivel enum('0','1') NOT NULL default '0',
  ativo enum('0','1') NOT NULL default '0',
  p_acesso varchar(50) NOT NULL default '',
  u_acesso varchar(50) NOT NULL default '',
  u_a_time varchar(250) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Estrutura da tabela `zonas`
#

CREATE TABLE zonas (
  id bigint(25) NOT NULL auto_increment,
  user_id varchar(250) NOT NULL default '',
  nome varchar(250) NOT NULL default '',
  tamanho varchar(12) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

