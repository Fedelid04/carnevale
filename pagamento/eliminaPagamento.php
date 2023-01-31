<?php
  include "../controlloRuolo.php";
?>
<?php

$annoP= $_POST['annoP'];

$numeroTessera= $_POST['numeroTessera'];

try {
    include  "conn.php";

    $sql = "SELECT * FROM pagamentotessera
WHERE numeroTessera = '$numeroTessera' AND annoPagato='$annoP' LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();



if ($totale == 0) {
  
   header("Location: gestionePagamenti.php?errore=3", true, 301);
   exit();
}else{
 $sql = "   DELETE FROM pagamentotessera WHERE numeroTessera='$numeroTessera' AND annoPagato='$annoP';
              ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

  
        header("Location: gestionePagamento.php", true, 301);
          exit();



}
   
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}