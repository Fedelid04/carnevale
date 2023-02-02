
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
$tmp = 0;
$sql = "SELECT codSocio FROM socio";
$stmt = $conn->query($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $codSocio = explode('SC', $row['codSocio'])[1];
    if ($codSocio > $tmp) {
        $tmp = $codSocio;
    }
}
$tmp++;
$codSocio = 'SC' . $tmp;
$sql = "INSERT INTO socio values ('$codSocio','$nome','$cognome','$indirizzo','$citta','$provincia',
'$cf','$cell','$dataIscrizione','$figurante','$staff','$carica',DEFAULT);";
$stmt = $conn->query($sql);
$tmp = 0;
$sql = "SELECT codTessera FROM tessera";
$stmt = $conn->query($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $codTessera = explode('TS', $row['codTessera'])[1];
    if ($codTessera > $tmp) {
        $tmp = $codTessera;
    }
}
$tmp++;
$codTessera ='TS'.$tmp;
$sql = "INSERT INTO tessera VALUES ('$codTessera','$tipoTessera',DEFAULT,'$codSocio',CURDATE());";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("Location: registraSocio.php");
exit();
?>
