
<?php
    $searchterm = $_GET[‘searchterm’];
    $argument = 'python cgi-bin/testapi.py'.$searchterm;
  ////  $command = escapeshellcmd($argument);
  //  $output = shell_exec($command);
  //  echo $output;
  print_r($searchterm);
  print_r($argument);
?>
