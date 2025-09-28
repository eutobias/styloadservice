<?

if ($_GET[acao] == "") { include "home.php"; }
elseif ($_GET[acao] == "login") { include "login.php"; }
elseif ($_GET[acao] == "stats") { include "stats.php"; }
elseif ($_GET[acao] == "edit") { include "edit.php"; }
elseif ($_GET[acao] == "logout") { include "logout.php"; }
else { include "home.php"; }

?>