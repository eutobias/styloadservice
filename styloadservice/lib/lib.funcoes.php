<?


    function v_form($campo,$n_campo,$url) {
    if (empty($campo)) {
    $msg_erro="O campo (<b>".$n_campo."</b>) deve ser preenchido.<br>
    Redirecionando se não quiser esperar <a href=".$url.">clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=".$url."\">";
    include ("msg_erro.php");
    exit;
    }
    if (eregi("[\"\'\$<>]",$campo)){
        $msg_erro="Há caracteres inválidos no campo (<b>".$n_campo."</b>).<br>
    Redirecionando se não quiser esperar <a href=".$url.">clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=".$url."\">";
    include "msg_erro.php";
    exit;
    }
    $pp = array("select","insert","update","delete","drop","destroy");
         foreach ($pp as $valor)
          if(substr_count($campo,$valor)!=0) {
           $msg_erro="Há caracteres inválidos no campo <b>".$n_campo."</b>.<br>
    Redirecionando se não quiser esperar <a href=".$url.">clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=".$url."\">";
    include "msg_erro.php";
    exit;
    } }
    function v_form_i($campo1,$campo2,$n_campo,$url) {
    if ($campo1 != $campo2) {
    $msg_erro="Os campos <b>".$n_campo."</b> não são idênticos.<br>
    Redirecionando se não quiser esperar <a href=".$url.">clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=".$url."\">";
    include "msg_erro.php";
    exit;
    } }
    function v_form_e($campo,$url) {
    if (!eregi("[@.]",$campo)) {
    $msg_erro="E-mail inválido <b>".$n_campo."</b>.<br>
    Redirecionando se não quiser esperar <a href=".$url.">clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=".$url."\">";
    include "msg_erro.php";
    exit;
    } }
    function v_form_n($campo,$n_campo,$url) {
    if (!is_numeric($campo)) {
    $msg_erro="O campo <b>".$n_campo."</b> deve conter somente números.<br>
    Redirecionando se não quiser esperar <a href=".$url.">clique aqui</a>
    <meta http-equiv=\"refresh\" content=\"3;URL=".$url."\">";
    include "msg_erro.php";
    exit;
    } }
    function gt() {
    $tempo=microtime();
    list($t[0],$t[1])=explode(' ',$tempo);
    return ((float)$t[0] + (float)$t[1]);
    }
    function corta($string) {
    if (strlen($string) > 150) {
    print substr($string,0,150)."...";
    }
    else { print $string."..."; }
    }
?>