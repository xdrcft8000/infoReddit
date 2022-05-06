<!DOCTYPE html>
<html>
<body>
<p>
<?php
    $argument = 'python shat.py ' . $_GET["searchterm"] . " " . $_GET["timecache"];
    $command = escapeshellcmd($argument);
    $output = passthru($command);
    echo $output;
    echo $argument;
     ?>
</p>
</body>
</html>
