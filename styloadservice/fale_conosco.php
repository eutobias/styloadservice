<? if ($config[contato_email]!="S") { exit; }

if ($_GET[enviar]=="ok") {
if ($_POST[nome] && $_POST[email] && $_POST[assunto] && $_POST[mensagem]) {
if (!ereg("[@.]",$_POST[email])) {
$msg_erro="<b>Digite um E-mail Válido</b><br>
Redirecionando se não quiser esperar <a href=?acao=fale_conosco>clique aqui</a>
<meta http-equiv=\"refresh\" content=\"3;URL=?acao=fale_conosco\">";
include "msg_erro.php";
exit;
}
$env=mail($config[admin_email],$_POST[assunto],$_POST[mensagem],"FROM: $_POST[email]");

if ($env) {
$msg_confirm="
Este e-mail lhe foi enviado para confirmar que a sua solicitação será atendida pela nossa equipe.
\n\n
Não responda esse e-mail, ele foi gerado automaticamente pelo nosso site.
\n\n\n
Agradecimentos\n
$config[admin_nome] - Diretor Chefe do\n
$config[site_nome]\n
Comunicar Spam $config[admin_email]";
$env_ar=mail($_POST[email],"Confirmação de contato - Não responda",$msg_confirm,"FROM: ads@styloweb.org");

$msg_erro="<b>Seu e-mail foi enviado com sucesso<br>
	Em no máximo 36h. estaremos entrando em contato com você muito obrigado.<br>
    Se após este espaço de tempo você não receber a resposta entre em contato novamente<br>
    Pois pode ter acontecido do seu e-mail ter se extraviado.</b><br>
    Redirecionando se não quiser esperar <a href=?acao=>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"30;URL=?acao=\">";
    include "msg_erro.php";
} }
else {
$msg_erro="<b>Todos os campos devem ser preenchidos</b><br>
    Redirecionando se não quiser esperar <a href=?acao=fale_conosco>clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=?acao=fale_conosco\">";
    include "msg_erro.php";
} } else {
?>
<form method="post" action="?acao=fale_conosco&enviar=ok">
<table border="0" cellspacing="2" cellpadding="0" align="center">
<tr><td class="cel_menu" align="center" colspan="2"><b>Fale Conosco</b></td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td width="25%" class="cel_menu">Seu nome completo:</td>
<td class="cel_menu"><input type="text" name="nome" size="70" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Seu e-mail (válido):</td>
<td class="cel_menu"><input type="text" name="email" size="70" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"></td>
</tr>
<tr>
<td width="25%" class="cel_menu">Assunto:</td>
<td class="cel_menu">
<select name="assunto" class="form_txt">
<option value="Copias do sistema">Copias do sistema.</option>
<option value="Quero anunciar">Quero anunciar no site.</option>
<option selected value="Dúvidas, suporte, agradecimentos">Dúvidas, suporte, agradecimento.</option>
</select>
</td>
</tr>
<tr>
<td width="25%" class="cel_menu">Mensagem:</td>
<td class="cel_menu"><textarea name="mensagem" rows="6" cols="69" class="form_txt" OnFocus="this.className='form_txt_hover';" OnBlur="this.className='form_txt';"></textarea></td>
</tr>
<tr>
<tr>
<td width="25%"></td>
<td align="center"><input type="submit" value="Enviar" class="form_bt" OnFocus="this.className='form_bt_hover';" OnBlur="this.className='form_bt';"></td>
</tr>
</form>
</table>
</td></tr>
<? } ?>