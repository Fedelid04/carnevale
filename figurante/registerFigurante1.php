
<?php

include "../conn.php";

$codiceSocio = $_POST['codSocio'];
$recupero = $_POST['mascheraRiserva'];
$uscita = $_POST['uscita'];
$uscitaEsterna = $_POST['uscitaEsterna'];
$nMaschera = $_POST['mascheraFigurante'];

$sql = "SELECT codSocio FROM figurante
         WHERE codSocio = '$codiceSocio'  LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();
$query = " INSERT INTO figurante VALUES('$codiceSocio','$nMaschera','$recupero','$uscita','$uscitaEsterna');
           ";

$stmt = $conn->prepare($query);
$stmt->execute();


$query = " UPDATE figurante SET codMaschera='$nMaschera' WHERE  codSocio='$codiceSocio';

                   UPDATE socio SET figurante='si' WHERE  codSocio='$codiceSocio';

        ";

$stmt = $conn->prepare($query);
$stmt->execute();
header("Location: ../home.php");
exit;
