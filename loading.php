<!DOCTYPE html>
<html>
<body>
  <!-- //$argument = 'python cgi-bin/testapi.py'.$searchterm;
  //  $command = escapeshellcmd($argument);
  //  $output = shell_exec($command);
  //  echo $output;
  //print_r($searchterm);
//  print_r($argument); -->

<p>
<?php echo 'python cgi-bin/testapi.py' . $_GET["searchterm"] ?>
</p>
</body>
</html>
