<!DOCTYPE html>
<html>
<body>
<p>
<?php
    $argument = 'python3 shat.py ' . $_GET["searchterm"] . " " . $_GET["timecache"];
    $command = escapeshellcmd($argument);
    $output = shell_exec($command);
    echo $output;
    echo $argument;
     ?>
</p>
</body>
</html>
