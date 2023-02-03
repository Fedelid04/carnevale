
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
$numCivico = $_POST['civico'];
echo $uscita;
echo '<br>';
$email = $_POST['email'];
echo $uscitaEsterna;
echo '<br>';
$uscita = $_POST['uscita'];
echo $uscita;
echo '<br>';
$uscitaEsterna = $_POST['esterna'];
echo $uscitaEsterna;
echo '<br>';

echo $mascheraSecondaria;
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
if ($figurante == 'si') {
    $colore = $_POST['colore'];
    $deposito = $_POST['deposito'];
    $sarta = $_POST['sarta'];
    $descrizione = $_POST['descrizione'];
    $mascheraFigurante = $_POST['mascheraFigurante'];
    $mascheraSecondaria = $_POST['mascheraSecondaria'];
    $sql = "SELECT * FROM maschera where codMaschera = '$mascheraFigurante'";
    $stmt = $conn->query($sql);
    $totale = $stmt->rowCount();
    if ($totale == 1) {
        header("Location: registraSocio.php?errore=1");
        exit();
    }
    $sql = "SELECT * FROM figurante where mascheraRiserva = '$mascheraSecondaria'";
    $stmt = $conn->query($sql);
    $totale = $stmt->rowCount();
    if ($totale == 1) {
        header("Location: registraSocio.php?errore=1");
        exit();
    }
    if ($mascheraFigurante == $mascheraSecondaria) {
        header("Location: registraSocio.php?errore=3");
        exit();
    }
}
$codTessera = $_POST['codTessera'];
$sql = "SELECT * FROM tessera where codTessera = '$codTessera'";
$stmt = $conn->query($sql);
$totale = $stmt->rowCount();
if ($totale == 1) {
    header("Location: registraSocio.php?errore=2");
    exit();
}
$sql = "INSERT INTO socio values ('$codSocio','$nome','$cognome','$indirizzo','$citta','$provincia',
'$cf','$cell','$dataIscrizione','$figurante','$staff','$carica',DEFAULT,'$email','$numCivico');";
$stmt = $conn->query($sql);
if ($figurante == 'si') {
    $sql = "INSERT INTO maschera values
 ('$mascheraFigurante', '$colore' , '$descrizione' , DEFAULT , '$sarta' , '$deposito',DEFAULT);";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "INSERT INTO maschera values
 ('$mascheraSecondaria', '$colore' , '$descrizione' , DEFAULT , '$sarta' , '$deposito',DEFAULT);";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "INSERT INTO figurante 
    values('$codSocio','$mascheraFigurante','$mascheraSecondaria','$uscita','$uscitaEsterna')";
    $stmt = $conn->query($sql);
}
if (isset($_FILES["image"])) {
    $image = $_FILES["image"];
    $image_path = "uploads/" . $image["name"];
    echo $image_path;
    if (move_uploaded_file($image["tmp_name"], $image_path)) {
        $conn = new mysqli("host", "username", "password", "database");
        $sql = "INSERT INTO images (path) VALUES ('$image_path')";
        $conn->query($sql);
        $conn->close();
    }
} else {
    //header("Location: aggiungiMaschera.php");
}
$sql = "INSERT INTO tessera VALUES ('$codTessera','$tipoTessera',DEFAULT,'$codSocio',CURDATE());";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("Location: registraSocio.php");
exit();
?>
