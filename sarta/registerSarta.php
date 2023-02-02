<?php

include "../conn.php";

$costo = $_POST['costo'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];

$sql = "SELECT codSarta FROM sarta";
$stmt = $conn->query($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $codSarta = explode('S', $row['codSarta'])[1];
  if ($codSarta > $tmp) {
    $tmp = $codSarta;
  }
}
$tmp++;
$codSarta = 'S' . $tmp;



$query = " INSERT INTO sarta
         VALUES('$codSarta','$nome' , '$cognome' ,'$costo'); ";


if ($conn->query($query) == true) {

  header("Location: aggiungiSarta.php", true, 301);
  exit();
} else {

  echo "errore registrazione $query " . $conn->error;

}