<?

if ($_GET[acao] == "") { include "home.php"; }
elseif ($_GET[acao] == "faq") { include "faq.php"; }
elseif ($_GET[acao] == "gerar_codigo") { include "gerar_codigo.php"; }
elseif ($_GET[acao] == "anunciantes") { include "anunciantes.php"; }
elseif ($_GET[acao] == "dados") { include "dados.php"; }
elseif ($_GET[acao] == "banner") { include "banner.php"; }
elseif ($_GET[acao] == "conta") { include "seus_dados.php"; }
elseif ($_GET[acao] == "cadastro") { include "cadastro.php"; }
elseif ($_GET[acao] == "termos_de_uso") { include "termos.php"; }
elseif ($_GET[acao] == "login") { include "login.php"; }
elseif ($_GET[acao] == "fale_conosco") { include "fale_conosco.php"; }
elseif ($_GET[acao] == "logout") { include "logout.php"; }
elseif ($_GET[acao] == "zonas") { include "zonas.php"; }
else { include "home.php"; }

?>