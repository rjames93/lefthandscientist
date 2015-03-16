<?php
$command = escapeshellcmd('./wordgen.py');
$output = shell_exec($command);
echo $output;
?>
