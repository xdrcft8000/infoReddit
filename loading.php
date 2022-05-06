
<?php
    $command = escapeshellcmd('python cgi-bin/testapi.py ' + $_GET[‘searchterm’]);
    $output = shell_exec($command);
    echo $output;
?>
