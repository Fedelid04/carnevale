<?php
include "../conn.php";
$codiceSocioVecchio = $_GET['codSocio'];
echo $_GET['codSocio'];
echo "<br>";
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
$nMaschera = $_POST['maschera'];
echo $nMaschera;
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
$figurante = $_POST['figurante'];
echo $figurante;
echo '<br>';

$sql = "SELECT * FROM socio WHERE codSocio='$codiceSocioVecchio'";
$stmt = $conn->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $codiceSocioVecchio = $row['codSocio'];
}

if (isset($figurante) && !empty($figurante)) {
    $sql = "UPDATE socio set figurante='$figurante' WHERE codSocio='$codiceSocioVecchio'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($nome) && !(empty($nome))) {
    $sql = "UPDATE socio SET nome='$nome' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
if (isset($cognome) && !(empty($cognome))) {

    $sql = "UPDATE socio SET cognome='$cognome' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($cf) && !(empty($cf))) {
    $sql = "UPDATE socio SET cf='$cf' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($indirizzo) && !(empty($indirizzo))) {

    $sql = "UPDATE socio SET via='$indirizzo' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($citta) && !(empty($citta))) {

    $sql = "UPDATE socio SET citta='$citta' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($provincia) && !(empty($provincia))) {

    $sql = "UPDATE socio SET provincia='$provincia' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($staff) && !(empty($staff))) {

    $sql = "UPDATE socio SET staff='$staff' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($cell) && !(empty($cell))) {

    $sql = "UPDATE socio SET cell='$cell' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($carica) && !(empty($carica))) {

    $sql = "UPDATE socio SET codCarica='$carica' WHERE codSocio ='$codiceSocioVecchio'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($nMaschera) && !(empty($nMaschera))) {
    $sql = "UPDATE figurante SET codMaschera='$nMaschera' WHERE codSocio ='$codiceSocioVecchio'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($dataIscrizione) && !(empty($dataIscrizione))) {

    $sql = "UPDATE socio SET dataIscrizione='$dataIscrizione' WHERE codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

header("Location: impostazioniSocio.php?codSocio=" . $codiceSocioVecchio . "");
exit();
