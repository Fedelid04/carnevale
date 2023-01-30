<?php
   if($_GET)
   {
       $output = $_GET["valori"];
   

      
$file = 'miofile.xls';
$f = fopen($file,'w');
fwrite($f,$output);
fclose($f);


header("Content-Type: application/vnd.ms-excel");

header("Content-Disposition: attachment; filename=miofile.xls");
echo $output;
exit;
   }
?>