<? require "lib/lib.secure.php"; ?>
<table border="0" cellspacing="2" width="600" cellpadding="0" align="center">
<tr>
<td colspan="3" class="cel_menu">
Olá <b><?=$_SESSION[anun_login]?></b>, seja bem vindo.<br><br>

<b>Suas Opções</b><br>
<small>
<? if ($config[anun_alterar_dados]=="S") { ?><b>&raquo;</b> <a class="link" href="?acao=edit">Para editar seus dados clique aqui.</a><br><? } ?>
<b>&raquo;</b> <a class="link" href="?acao=stats">Para ver seus banners clique aqui.</a>
</small>
</td>
</tr>
</table>