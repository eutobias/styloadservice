<?

##################################
#                                #
# StyloAdService v1.0            #
# Autor: Tobias Taurian Viana    #
# Licen�a: GNU-GPL               #
#                                #
# Script Genuinamente Brasileiro #
#                                #
##################################

#### Configura��o do Banco de dados
$db['host']="localhost";
$db['login']="root";
$db['senha']="";
$db['db']="styloadservice";

#### Outras configura��es
$config['site_nome']="StyloAdService";
$config['site_url']="http://tests/styloadservice";
$config['site_slogan']="Site Slogan";
$config['aceitar_cadastro']="S"; //S => sim | N => n�o
$config['contato_email']="S"; //S => sim | N=> n�o
$config['user_alterar_dados']="S"; //S => sim | N=> n�o
$config['anun_alterar_dados']="S"; //S => sim | N=> n�o
$config['num_pag_user_admin']="20";
$config['num_pag_banner_admin']="5";
$config['num_pag_zona_admin']="10";
$config['num_pag_anun_admin']="10";
$config['num_banner_session']="10";
$config['id_conta_propaganda']="0";
$config['admin_nome']="Tobias";
$config['admin_email']="eutobias@gmail.com";
$config['gmt_data']="-3";
$config['versao']="1.0";

error_reporting('E_ALL & ~E_NOTICE');

?>