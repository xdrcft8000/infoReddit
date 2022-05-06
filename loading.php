<!DOCTYPE html>
<html>
<body>
<p>
<?php
    $argument = 'python cgi-bin/testapi.py ' . $_GET["searchterm"]
    //$command = escapeshellcmd('python cgi-bin/testapi.py ' . $_GET["searchterm"]);
    //$output = shell_exec($command);
    //echo $output;
    echo $argument ?>
</p>
</body>
</html>
