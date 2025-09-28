<?

    $delay = 300;
    $filelocation = "online.db";
    $method = 1;
    if (!$fp = @fopen($filelocation, 'r')) {
    echo 'Error Locating File.';
    exit;
    }
    $time = time();
    $deltime = $time - $delay;
    $acfile = fread($fp, filesize($filelocation));
    fclose($fp);
    $activeusersarray = explode("\n", $acfile);
    foreach ($activeusersarray as $entry) {
    $data = explode("::", $entry);
    if ( ($deltime > $data[0]) && (strlen($entry) > 5) ) {
    $acfile = str_replace("\n$data[0]::$data[1]", '', $acfile);
    }
    $datatokill = array();
    if ($data[1] = $REMOTE_ADDR) {
    $acfile = str_replace("\n$data[0]::$data[1]", '', $acfile);
    }
    }
    $acfile .= "\n$time::$REMOTE_ADDR";
    $fp = fopen($filelocation, 'w');
    fputs($fp, $acfile);
    fclose($fp);
    $count = explode("\n", $acfile);
    foreach ($count as $line) {
    If (strlen($line) > 19) {
    $counter++;
    }
    }

    //---------------UserCount Script End---------------
    echo "$counter";
    ?>