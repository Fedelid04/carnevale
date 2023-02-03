
<?php
include  "conn.php";

$codiceSocio=$_POST['codiceSocio'];
echo $codiceSocio;
$numeroTessera=$_POST['numeroTessera'];
echo $numeroTessera;
$annoP=$_POST['annoP'];
echo $annoP;
$quota=$_POST['quota'];
echo $quota;
$numeroRicevuta=$_POST['ricevuta'];


$sql = "SELECT numeroTessera,codiceSocio FROM socio
WHERE numeroTessera = '$numeroTessera' AND codiceSocio='$codiceSocio'";

$stmt = $con->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();


if ($totale == 0) {
  
   header("Location: gestionePagamenti.php?errore=4", true, 301);
   exit();
}else{
$sql = "SELECT * FROM pagamento_tessera
WHERE numeroTessera = '$numeroTessera' AND annoPagato='$annoP' LIMIT 1";

$stmt = $con->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();



if ($totale == 1) {
  
   header("Location: gestionePagamenti.php?errore=1", true, 301);
   exit();
}else{
    $sql = "SELECT dataIscrizione FROM socio
    WHERE numeroTessera = '$numeroTessera';";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();
    
      
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dataI=$row['dataIscrizione'];
    }

    
    $dataI=date('Y', strtotime($dataI));
    
    
    if ($annoP<$dataI ) {
      
       header("Location: gestionePagamenti.php?errore=2", true, 301);
       exit();
    
    }else{

        $query = "SELECT anniPagati FROM socio WHERE codiceSocio='$codiceSocio'";

        $stmt = $con->prepare($query);
        $stmt->execute();
        
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ultimoAnno=$row['anniPagati'];
        }
    echo $ultimoAnno;
        if ($ultimoAnno<$annoP) {
            $query = " INSERT INTO pagamento_tessera VALUES($quota,'$codiceSocio','$numeroTessera','$annoP','$numeroRicevuta');
            UPDATE socio SET anniPagati='$annoP' WHERE  codiceSocio='$codiceSocio';
    ";
        }else{
            $query = " INSERT INTO pagamento_tessera VALUES($quota,'$codiceSocio','$numeroTessera','$annoP','$numeroRicevuta');
    ";
        }
    
         
           
       
    
           
      
       
        
           if($con->query($query)==true){
              
                 header("Location: gestionePagamenti.php", true, 301);
                 exit();
           }else{
              
               echo "errore registrazione $query ".$con->error;
           
           } 
    }

}


}
} 