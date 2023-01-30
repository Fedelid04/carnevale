<?php

include "conn.php";

if($_GET['scelta']==1){
$sql = "SELECT socio.codSocio, socio.nome, socio.cognome, socio.cf, socio.indirizzo, socio.Civico,
                    socio.citta, socio.provincia, socio.email, socio.cell, socio.nTessera, socio.carica, 
                    socio.nMaschera, socio.dataIscrizione, socio.dataEvento, socio.anniPagati, socio.staff,
                    socio.note, tessera.nTessera, tessera.attivita
                    FROM tessera NATURAL JOIN socio;
                    ";


$stmt = $conn->prepare($sql);
$stmt->execute();
$output = '';
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $output.='"codiceSocio:",';
    $output.="\n";
    $output.='"'.$row['codSocio'].'",';
    $output.='"nome:",';
    $output.="\n";
    $output.='"'.$row['nome'].'",';
    $output.='"cognome:",';
    $output.="\n";
    $output.='"'.$row['cognome'].'",';
    $output.='"cf:",';
    $output.="\n"; 
    $output.='"'.$row['cf'].'",';
    $output.='"indirizzo:",';
    $output.="\n";
    $output.='"'.$row['indirizzo'].'",';
    $output.='"numero civico:",';
    $output.="\n";
    $output.='"'.$row['Civico'].'",';
    $output.='"città:",';
    $output.="\n";
    $output.='"'.$row['citta'].'",';
    $output.='"provincia:",';
    $output.="\n";
    $output.='"'.$row['provincia'].'",';
    $output.='"email:",';
    $output.="\n";
    $output.='"'.$row['email'].'",';
    $output.='"cellulare:",';
    $output.="\n";
    $output.='"'.$row['cell'].'",';
    $output.='"numero tessera:",';
    $output.="\n";
    $output.='"'.$row['nTessera'].'",';
    $output.='"carica:",';
    $output.="\n";
    $output.='"'.$row['carica'].'",';
    $output.='"numero maschera:",';
    $output.="\n";
    $output.='"'.$row['nMaschera'].'",';
    $output.='"data iscrizione:",';
    $output.="\n";
    $output.='"'.$row['dataIscrizione'].'",';
    $output.='"data primo evento:",';
    $output.="\n";
    $output.='"'.$row['dataEvento'].'",';
    $output.='"ultimo anno pagato:",';
    $output.="\n";
    $output.='"'.$row['anniPagati'].'",';
    $output.='"staff:",';
    $output.="\n";
    $output.='"'.$row['staff'].'",';
    $output.='"note:",';
    $output.="\n";
    $output.='"'.$row['note'].'",'; 
    $output.='"attività:",';
    $output.="\n";
    $output.='"'.$row['attivita'].'",';
    $output.="\n";
}

if($output!= ''){
    $output.="\n";
}

$file = 'miofile.xls';
                    $f = fopen($file,'w');
                    fwrite($f,$output);
                    fclose($f);
                   
                  
header("Content-Type: application/vnd.ms-excel");

                    header("Content-Disposition: attachment; filename=miofile.xls");
                    echo $output;
                    exit;
}elseif ($_GET['scelta']==2) {

    $sql = "SELECT socio.codSocio, socio.nome, socio.cognome, socio.nTessera, socio.carica, 
    socio.dataIscrizione, cariche.carica, cariche.codiceCarica
    FROM cariche NATURAL JOIN socio;
    ";


$stmt = $conn->prepare($sql);
$stmt->execute();
$output = '';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$output.='"codiceSocio:",';
$output.="\n";
$output.='"'.$row['codSocio'].'",';
$output.='"nome:",';
$output.="\n";
$output.='"'.$row['nome'].'",';
$output.='"cognome:",';
$output.="\n";
$output.='"'.$row['cognome'].'",';
$output.='"numero tessera:",';
$output.="\n";
$output.='"'.$row['nTessera'].'",';
$output.='"carica:",';
$output.="\n";
$output.='"'.$row['carica'].'",';
$output.='"codice carica:",';
$output.="\n";
$output.='"'.$row['codiceCarica'].'",';
$output.="\n";
}

if($output!= ''){
$output.="\n";
}

$file = 'miofile.xls';
    $f = fopen($file,'w');
    fwrite($f,$output);
    fclose($f);
   
  
header("Content-Type: application/vnd.ms-excel");

    header("Content-Disposition: attachment; filename=miofile.xls");
    echo $output;
    exit;
}elseif ($_GET['scelta']==3) {
  

     
   $sql = "  SELECT socio.codSocio, socio.nome, socio.cognome, socio.nTessera, socio.carica, socio.anniPagati,
    socio.staff,
   tessera.nTessera, tessera.attivita
  FROM tessera NATURAL JOIN socio;
   ";


$stmt = $conn->prepare($sql);
$stmt->execute();
$output = '';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$output.='"codiceSocio:",';
$output.="\n";
$output.='"'.$row['codSocio'].'",';
$output.='"nome:",';
$output.="\n";
$output.='"'.$row['nome'].'",';
$output.='"cognome:",';
$output.="\n";
$output.='"'.$row['cognome'].'",';
$output.='"numero tessera:",';
$output.="\n";
$output.='"'.$row['nTessera'].'",';
$output.='"carica:",';
$output.="\n";
$output.='"'.$row['carica'].'",';
$output.='"ultimo anno pagati:",';
$output.="\n";
$output.='"'.$row['anniPagati'].'",';
$output.='"attività:",';
$output.="\n";
$output.='"'.$row['attivita'].'",';
$output.="\n";
}

if($output!= ''){
$output.="\n";
}

$file = 'miofile.xls';
   $f = fopen($file,'w');
   fwrite($f,$output);
   fclose($f);
  
 
header("Content-Type: application/vnd.ms-excel");

   header("Content-Disposition: attachment; filename=miofile.xls");
   echo $output;
   exit;


}elseif ($_GET['scelta']==4) {

    
     
   $sql = "  SELECT socio.codSocio, socio.nome, socio.cognome, socio.nTessera, socio.carica, 
   socio.anniPagati, socio.staff,
   evento.codiceEvento, evento.descrizione, evento.dataEvento, evento.incassoEvento, evento.provinciaEvento, 
  evento.comuneEvento, evento.cittaEvento
  FROM socio NATURAL JOIN evento;


  ";


$stmt = $conn->prepare($sql);
$stmt->execute();
$output = '';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$output.='"codiceSocio:",';
$output.="\n";
$output.='"'.$row['codSocio'].'",';
$output.='"nome:",';
$output.="\n";
$output.='"'.$row['nome'].'",';
$output.='"cognome:",';
$output.="\n";
$output.='"'.$row['cognome'].'",';
$output.='"numero tessera:",';
$output.="\n";
$output.='"'.$row['nTessera'].'",';
$output.='"carica:",';
$output.="\n";
$output.='"'.$row['carica'].'",';
$output.='"ultimo anno pagati:",';
$output.="\n";
$output.='"'.$row['anniPagati'].'",';
$output.='"staff:",';
$output.="\n";
$output.='"'.$row['staff'].'",';
$output.='"codice evento:",';
$output.="\n";
$output.='"'.$row['codiceEvento'].'",';
$output.='"descrizione evento:",';
$output.="\n";
$output.='"'.$row['descrizione'].'",';
$output.='"data evento:",';
$output.="\n";
$output.='"'.$row['dataEvento'].'",';
$output.='"incasso evento:",';
$output.="\n";
$output.='"'.$row['incassoEvento'].'",';
$output.='"provincia evento:",';
$output.="\n";
$output.='"'.$row['provinciaEvento'].'",';
$output.='"comune evento:",';
$output.="\n";
$output.='"'.$row['comuneEvento'].'",';
$output.='"città evento:",';
$output.="\n";
$output.='"'.$row['cittaEvento'].'",';
$output.="\n";
}

if($output!= ''){
$output.="\n";
}

$file = 'miofile.xls';
  $f = fopen($file,'w');
  fwrite($f,$output);
  fclose($f);
 

header("Content-Type: application/vnd.ms-excel");

  header("Content-Disposition: attachment; filename=miofile.xls");
  echo $output;
  exit;            

}elseif ($_GET['scelta']==5) {
                  
    $sql = "   SELECT deposito.deposito, deposito.citta, deposito.descrizione FROM deposito;
 
    ";


$stmt = $conn->prepare($sql);
$stmt->execute();
$output = '';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$output.='"deposito:",';
$output.="\n";
$output.='"'.$row['deposito'].'",';
$output.='"città deposito:",';
$output.="\n";
$output.='"'.$row['citta'].'",';
$output.='"descrizione:",';
$output.="\n";
$output.='"'.$row['descrizione'].'",';
$output.="\n";
}

if($output!= ''){
$output.="\n";
}

$file = 'miofile.xls';
    $f = fopen($file,'w');
    fwrite($f,$output);
    fclose($f);
   
  
header("Content-Type: application/vnd.ms-excel");

    header("Content-Disposition: attachment; filename=miofile.xls");
    echo $output;
    exit;
}elseif ($_GET['scelta']==6) {

    
                  
    $sql = "  SELECT maschera.nMaschera, maschera.deposito, maschera.descrizione, maschera.codiceSarta, maschera.riparazione
    FROM maschera;
    ";


$stmt = $conn->prepare($sql);
$stmt->execute();
$output = '';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$output.='"maschera:",';
$output.="\n";
$output.='"'.$row['nMaschera'].'",';
$output.='" deposito:",';
$output.="\n";
$output.='"'.$row['deposito'].'",';
$output.='"descrizione:",';
$output.="\n";
$output.='"'.$row['descrizione'].'",';
$output.="\n";
$output.='" codice sarta:",';
$output.="\n";
$output.='"'.$row['codiceSarta'].'",';
$output.='"riparazione:",';
$output.="\n";
$output.='"'.$row['riparazione'].'",';
$output.="\n";
}

if($output!= ''){
$output.="\n";
}

$file = 'miofile.xls';
    $f = fopen($file,'w');
    fwrite($f,$output);
    fclose($f);
   
  
header("Content-Type: application/vnd.ms-excel");

    header("Content-Disposition: attachment; filename=miofile.xls");
    echo $output;
    exit;

}
                   