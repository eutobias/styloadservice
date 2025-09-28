<?

    session_start(mb_js);

require "lib/lib.conexao.php";
require_once ("lib/lib.funcoes.php");

   function v_ad($campo) {
    if (!is_numeric($campo)) {
    $erro=1;
    return $erro;
    } }

$erro=0;
$mostra=0;

v_ad($_GET['u_id']);
v_ad($_GET['z_id']);
$u_id=$_GET['u_id'];
$z_id=$_GET['z_id'];

$_SESSION[mb_js]=$_SESSION[mb_js]+1;

if (($_SESSION[mb_js]%$config[num_banner_session])==0) {
$u_id=$config[id_conta_propaganda];

if ($erro == 0) {
while( $mostra==0 ) {

$sel_zona=mysql_query("select tamanho from zonas where id='$_GET[z_id]'",$link_db);
$zona=mysql_fetch_row($sel_zona);
$t=explode("x",$zona[0]);

$sel_banner=mysql_query("select id,click,views,limitacao,q_limitacao from banners where user_id='$u_id' and largura='$t[0]' and altura='$t[1]' and ativo='S' order by rand()",$link_db);
$banner=mysql_fetch_array($sel_banner);

if ($banner['limitacao']!="N") {
	if ($banner['limitacao']=="views") {
   		if ($banner['views'] < $banner['q_limitacao']) { $mostra=1; }
	   }
	if ($banner['limitacao']=="clicks") {
   		if ($banner['click'] < $banner['q_limitacao']) { $mostra=1; }
	   }
	if ($banner['limitacao']=="data") {
		$l_data=date("Ymd");
   		if ($l_data < $banner['q_limitacao']) { $mostra=1; }
		}
}
else { $mostra=1; }
}

if ($mostra=="1") {
$views=$banner['views']+1;
$b_id=$banner['id'];
$atualiza_views=mysql_query("update banners set views='$views' where id='$b_id'",$link_db);
$sel_m_banner=mysql_query("select id,link,url,tipo,largura,altura from banners where id='$b_id' and ativo='S'",$link_db);
$b=mysql_fetch_array($sel_m_banner);

if ($b[tipo]=="flash") {
print "document.write('<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"$b[largura]\" height=\"$b[altura]\">
 <param name=\"movie\" value=\"$b[url]\">
 <param name=\"quality\" value=\"high\">
 <param name=\"scale\" value=\"exactfit\">
 <embed src=\"$b[url]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" scale=\"exactfit\" width=\"$b[largura]\" height=\"$b[altura]\" ></embed>
</object>');";
} else {
print "document.write('<a href=\"".$config[site_url]."/click.php?b_id=".$b_id."\" target=\"_blank\"><img border=\"0\" src=\"$b[url]\" width=\"$b[largura]\" height=\"$b[altura]\" /></a>');";
} } }

} else {
if ($erro == 0) {
while( $mostra==0 ) {
$sel_banner=mysql_query("select id,click,views,limitacao,q_limitacao from banners where user_id='$u_id' and zona_id='$z_id' and ativo='S' order by rand()",$link_db);
$banner=mysql_fetch_array($sel_banner);

if ($banner['limitacao']!="N") {
	if ($banner['limitacao']=="views") {
   		if ($banner['views'] < $banner['q_limitacao']) { $mostra=1; }
	   }
	if ($banner['limitacao']=="clicks") {
   		if ($banner['click'] < $banner['q_limitacao']) { $mostra=1; }
	   }
	if ($banner['limitacao']=="data") {
		$l_data=date("Ymd");
   		if ($l_data < $banner['q_limitacao']) { $mostra=1; }
		}
}
else { $mostra=1; }
}

if ($mostra=="1") {
$views=$banner['views']+1;
$b_id=$banner['id'];
$atualiza_views=mysql_query("update banners set views='$views' where id='$b_id'",$link_db);
$sel_m_banner=mysql_query("select id,link,url,tipo,largura,altura from banners where id='$b_id' and ativo='S'",$link_db);
$b=mysql_fetch_array($sel_m_banner);

if ($b[tipo]=="flash") {
print "document.write('
<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"$b[largura]\" height=\"$b[altura]\">
 <param name=\"movie\" value=\"$b[url]\">
 <param name=\"quality\" value=\"high\">
 <param name=\"scale\" value=\"exactfit\">
 <embed src=\"$b[url]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" scale=\"exactfit\" width=\"$b[largura]\" height=\"$b[altura]\" ></embed>
</object>')";
} else {
print "document.write('<a href=\"".$config[site_url]."/click.php?b_id=".$b_id."\" target=\"_blank\"><img border=\"0\" src=\"$b[url]\" width=\"$b[largura]\" height=\"$b[altura]\" /></a>');";
} } } }

?>