<?php
//$input=$_GET['searchbox'];
//$file = fopen("test.txt","w");
//fwrite($file,$input);
$command = escapeshellarg('recognitionfinal.py');
$output = shell_exec($command);
header('Location:push.php');
?>
