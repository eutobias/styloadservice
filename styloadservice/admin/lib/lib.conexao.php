<?
require "../config.php";

$link_db=mysql_connect($db[host],$db[login],$db[senha]);
	mysql_select_db($db[db]);
?>