<?php

include  "conn.php";

$codiceSocioVecchio=$_GET['codSocio'];
echo $_GET['codSocio'];
echo "<br>";
$nome =$_POST['nome'];
echo $nome;
echo '<br>';
$cognome =$_POST['cognome'];
echo $cognome;
echo '<br>';
$cf =$_POST['cf'];
echo $cf;
//echo '<br>';
//$cf2 =$_POST['cf2'];
//echo $cf2;
echo '<br>';
$indirizzo= $_POST['indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀'];
echo $indirizzo;
echo '<br>';
$numCiv =$_POST['numCiv'];
echo $numCiv;
echo '<br>';
$citta =$_POST['citta'];
echo $citta;
echo '<br>';
$provincia =$_POST['provincia'];
echo $provincia;
echo '<br>';
$email =$_POST['email'];
echo $email;
echo '<br>';
$cell =$_POST['cell'];
echo $cell;
echo '<br>';
$numeroTessera =$_POST['nTessera'];
echo $numeroTessera;
echo '<br>';
$nMaschera =$_POST['maschera'];
echo $nMaschera;
echo '<br>';
$dataIscrizione =$_POST['dataIscrizione'];
echo $dataIscrizione;
echo '<br>';
$dataEvento =$_POST['dataEvento'];
echo $dataEvento;
echo '<br>';
$annoPagato =$_POST['annoPagato'];
echo $annoPagato;
echo '<br>';
$staff =$_POST['staff'];
echo $staff;
echo '<br>';
$note =$_POST['note'];
echo $note;
echo '<br>';
$carica=$_POST['carica'];
echo $carica;
echo '<br>';
echo '<br>';



    $sql = "SELECT nTessera FROM socio
    WHERE nTessera = '$numeroTessera'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if ($totale == 1) {
       
       header("Location: modificaSocio.php?errore=2&&codSocio=".$codiceSocioVecchio."", true, 301);
       exit();
   }else {

        $sql = "SELECT cf FROM socio
        WHERE cf NOT IN(SELECT cfGenitore FROM sociminorenni WHERE codSocio ='$codiceSocioVecchio') AND cf='$cf' LIMIT 1";

       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
           
        header("Location: modificaSocio.php?errore=3&&codSocio=".$codiceSocioVecchio."", true, 301);
        exit();
    
    } else {
        $sql = "SELECT email FROM socio
        WHERE email = '$email'  LIMIT 1";

       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
           
        header("Location: modificaSocio.php?errore=4&&codSocio=".$codiceSocioVecchio."", true, 301);
         exit();
      
    }else {
        $sql = "SELECT cell FROM socio
        WHERE cell = '$cell'  LIMIT 1";

       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
           
         header("Location: modificaSocio.php?errore=5&&codSocio=".$codiceSocioVecchio."", true, 301);
         exit();
      
    }else{
    try {
       
       
        $codiceSocioVecchio=$_GET['codSocio'];
       
        $sql = "SELECT * FROM socio WHERE codSocio='$codiceSocioVecchio'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $codiceSocioVecchio=$row['codSocio'];
          }

        if (isset($nome)&& !(empty($nome))) {

            $sql = "UPDATE socio SET nome='$nome' WHERE  codSocio ='$codiceSocioVecchio' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

       } 

       if (isset($cognome)&& !(empty($cognome))) {

        $sql = "UPDATE socio SET cognome='$cognome' WHERE  codSocio ='$codiceSocioVecchio' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

   } 

   if (isset($cf)&& !(empty($cf))) {

    $sql = "UPDATE socio SET cf='$cf' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "SELECT * FROM sociminorenni
    WHERE codSocio  = '$codiceSocioVecchio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){

    $sql = "UPDATE sociminorenni SET cfGenitore='$cf' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

}

if (isset($cf2)&& !(empty($cf2))) {


    $sql = "SELECT * FROM sociminorenni
    WHERE codSocio  = '$codiceSocioVecchio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){

    $sql = "UPDATE sociminorenni SET cf2Genitore2='$cf2' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

}


if (isset($indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀)&& !(empty($indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀))) {

    $sql = "UPDATE socio SET indirizzo='$indirizzo' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if($numCiv>0){
    if (isset($numCiv)&& !(empty($numCiv))) {

    $sql = "UPDATE socio SET Civico='$numCiv' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

}

if (isset($citta)&& !(empty($citta))) {

    $sql = "UPDATE socio SET citta='$citta' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if (isset($provincia)&& !(empty($provincia))) {

    $sql = "UPDATE socio SET provincia='$provincia' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if (isset($email)&& !(empty($email))) {

    $sql = "UPDATE socio SET email='$email' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

}

if (isset($staff)&& !(empty($staff))) {

    $sql = "UPDATE socio SET staff='$staff' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if (isset($cell)&& !(empty($cell))) {

    $sql = "UPDATE socio SET cell='$cell' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if($numeroTessera>0){
    
if (isset($numeroTessera)&& !(empty($numeroTessera))) {

    $sql = "UPDATE socio SET nTessera='$numeroTessera' WHERE codSocio ='$codiceSocioVecchio';
            UPDATE tessera SET nTessera='$numeroTessera' WHERE codSocio ='$codiceSocioVecchio;
     ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

}
if (isset($carica)&& !(empty($carica))) {

    $sql = "UPDATE socio SET carica='$carica' WHERE codSocio ='$codiceSocioVecchio'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if (isset($nMaschera)&& !(empty($nMaschera))) {

    if($nMaschera=="nessuna"){
        $sql = "UPDATE socio SET nMaschera=NULL WHERE codSocio ='$codiceSocioVecchio'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
    $sql = "SELECT * FROM manichini
    WHERE codSocio='$codiceSocioVecchio' LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){

    $sql = "UPDATE manichini SET nMaschera=NULL WHERE codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

    }else {
        
    $sql = "UPDATE socio SET nMaschera='$nMaschera' WHERE codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    
    $sql = "SELECT * FROM manichini
    WHERE codSocio  = '$codiceSocioVecchio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){

    $sql = "UPDATE manichini SET nMaschera='$nMaschera' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

    }
} 

if (isset($dataIscrizione)&& !(empty($dataIscrizione))) {

    $sql = "UPDATE socio SET dataIscrizione='$dataIscrizione' WHERE codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "SELECT * FROM manichini
    WHERE codSocio  = '$codiceSocioVecchio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){

    $sql = "UPDATE manichini SET dataIscrizione='$dataIscrizione' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

} 

if (isset($dataEvento)&& !(empty($dataEvento))) {
    echo $dataEvento;
    if($dataEvento=="nessuna"){

        
        $sql = "UPDATE socio SET dataEvento=NULL WHERE  codSocio ='$codiceSocioVecchio' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = "SELECT * FROM manichini
    WHERE codSocio  = '$codiceSocioVecchio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){

    $sql = "UPDATE manichini SET dataPrimoEvento=NULL WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

    }else {

        echo '888';
    $sql = "UPDATE socio SET dataEvento='$dataEvento' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "SELECT * FROM manichini
    WHERE codSocio  = '$codiceSocioVecchio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){
echo '888';
    $sql = "UPDATE manichini SET dataPrimoEvento='$dataEvento' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

    }
} 

if (isset($annoPagato)&& !(empty($annoPagato))) {

    $sql = "UPDATE socio SET anniPagati='$annoPagato' WHERE codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if (isset($note)&& !(empty($note))) {

    $sql = "UPDATE socio SET note='$note' WHERE codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    
    $sql = "SELECT * FROM manichini
    WHERE codSocio='$codiceSocioVecchio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   if($totale==1){

    $sql = "UPDATE manichini SET note='$note' WHERE  codSocio ='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }

} 
       header("Location: impostazioniSocio.php?codSocio=".$codiceSocioVecchio."");
       exit(); 


 
    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
        die();
    } finally {
        $conn = null;
    }



}
}
}
   }
