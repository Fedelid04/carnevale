
<?php

include  "../conn.php";

$figurante = $_POST['figurante'];


$nome = $_POST['nome'];
echo $nome;
echo '<br>';
$cognome = $_POST['cognome'];
echo $cognome;
echo '<br>';
$cf = $_POST['cf'];
echo $cf;
echo '<br>';
$indirizzo = $_POST['indirizzo'];
echo $indirizzo;
echo '<br>';
$citta = $_POST['citta'];
echo $citta;
echo '<br>';
$provincia = $_POST['provincia'];
echo $provincia;
echo '<br>';
$cell = $_POST['cell'];
echo $cell;
echo '<br>';
$dataIscrizione = $_POST['dataIscrizione'];
echo $dataIscrizione;
echo '<br>';
$staff = $_POST['staff'];
echo $staff;
echo '<br>';
$carica = $_POST['carica'];
echo $carica;
echo '<br>';
$tipoTessera = $_POST['tipologiaTessera'];
echo $tipoTessera;
echo '<br>';

$sql = "SELECT codSocio FROM socio order by codSocio desc LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    explode("C", $row['codSocio']);
    $row['codSocio']++;
    $codiceSocio = $row['codSocio'];
}
$sql = "INSERT INTO socio values ('$codiceSocio','$nome','$cognome','$indirizzo','$citta','$provincia',
'$cf','$cell','$dataIscrizione','$figurante','$staff','$carica');";
$conn->query($sql);

$sql = "SELECT codTessera from tessera order by codTessera desc limit 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    explode("S", $row['codTessera']);
    $row['codTessera']++;
    $codTessera = $row['codTessera'];
}

$sql = "INSERT INTO tessera values('$codTessera','$tipoTessera',DEFAULT);";
$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();
$sql = "INSERT INTO socio_tessera VALUES ('$codiceSocio','$codTessera',CURDATE());";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
