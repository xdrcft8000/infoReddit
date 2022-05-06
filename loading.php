<!DOCTYPE html>
<html>
<body>
<p>
<?php
    $command = escapeshellcmd('python cgi-bin/testapi.py ' . $_GET["searchterm"]);
    $output = shell_exec($command);
    echo $output;
    echo 'python cgi-bin/testapi.py ' . $_GET["searchterm"] ?>
</p>
</body>
</html>
