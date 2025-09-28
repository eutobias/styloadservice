<table border="0" cellspacing="2" cellpadding="0" align="center" width="450">
<tr>
<td colspan="2" class="cel_tit" align="center"><b>Termos de uso</b></td>
</tr>
<tr>
<td colspan="2">
<?
$arquivo="termos_de_uso.txt";
$ler = fopen ($arquivo, "r");
$conteudo = fread($ler, filesize($arquivo));
fclose ($ler);
$conteudo=str_replace("{versao}",$config['versao'],$conteudo);    
print nl2br($conteudo);
?>
</td>
</tr>
</table>