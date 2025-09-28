<?
$data = gmdate("D");
if ($data == "Mon") { $d="Segunda-feira"; }
elseif ($data == "Tue") { $d="Terça-feira"; }
elseif ($data == "Wed") { $d="Quarta-feira"; }
elseif ($data == "Thu") { $d="Quinta-feira"; }
elseif ($data == "Fri") { $d="Sexta-feira"; }
elseif ($data == "Sat") { $d="Sábado"; }
else { $d="Domingo"; }

$mes=gmdate("m");
if ($mes=="01") { $m="Janeiro"; }
elseif ($mes=="02") { $m="Fevereiro"; }
elseif ($mes=="03") { $m="Março"; }
elseif ($mes=="04") { $m="Abril"; }
elseif ($mes=="05") { $m="Maio"; }
elseif ($mes=="06") { $m="Junho"; }
elseif ($mes=="07") { $m="Julho"; }
elseif ($mes=="08") { $m="Agosto"; }
elseif ($mes=="09") { $m="Setembro"; }
elseif ($mes=="10") { $m="Outubro"; }
elseif ($mes=="11") { $m="Novembro"; }
else { $m="Dezembro"; }
$data_c=$d.", ".gmdate("d")." de ".$m." de ".gmdate("Y")." - ".gmdate("H:i:s",mktime(date("H")-(-$config[gmt_data]), date("i"), date("s")));

?>