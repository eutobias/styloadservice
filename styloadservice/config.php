<?

##################################
#                                #
# StyloAdService v1.0            #
# Autor: Tobias Taurian Viana    #
# Licenчa: GNU-GPL               #
#                                #
# Script Genuinamente Brasileiro #
#                                #
##################################

#### Configuraчуo do Banco de dados
$db['host']="localhost";
$db['login']="root";
$db['senha']="";
$db['db']="styloadservice";

#### Outras configuraчѕes
$config['site_nome']="StyloAdService";
$config['site_url']="http://tests/styloadservice";
$config['site_slogan']="Site Slogan";
$config['aceitar_cadastro']="S"; //S => sim | N => nуo
$config['contato_email']="S"; //S => sim | N=> nуo
$config['user_alterar_dados']="S"; //S => sim | N=> nуo
$config['anun_alterar_dados']="S"; //S => sim | N=> nуo
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