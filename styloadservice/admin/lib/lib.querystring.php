<?

if ($_GET[acao] == "") { include "home.php"; }
elseif ($_GET[acao] == "login") { include "login.php"; }
elseif ($_GET[acao] == "edit_conf") { include "edit_conf.php"; }
elseif ($_GET[acao] == "usuarios") { include "usuarios.php"; }
elseif ($_GET[acao] == "stats") { include "stats.php"; }
elseif ($_GET[acao] == "logout") { include "logout.php"; }
else { include "home.php"; }

?>