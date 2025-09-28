<?

if ($_GET[subacao] == "") { include "usuarios/home.php"; }
elseif ($_GET[subacao] == "detalhes") { include "usuarios/detalhes.php"; }
elseif ($_GET[subacao] == "editar") { include "usuarios/editar.php"; }
elseif ($_GET[subacao] == "ap_des") { include "usuarios/ap_des.php"; }
elseif ($_GET[subacao] == "dados_gerais") { include "banners/home.php"; }
elseif ($_GET[subacao] == "aprovar_todos") { include "usuarios/ap_des.php"; }
elseif ($_GET[subacao] == "deletar") { include "usuarios/deletar.php"; }
elseif ($_GET[subacao] == "nova_conta") { include "usuarios/cadastrar.php"; }

else { include "usuarios/home.php"; }

?>