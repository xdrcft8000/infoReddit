<!DOCTYPE html>
<html>
<body>
<p>
<?php
    $argument = 'main.py ' . $_GET["searchterm"];
    $command = escapeshellcmd($argument);
    $output = shell_exec($command);
    echo $output;
    echo $argument;
     ?>
</p>
</body>
</html>
