<?php

include  "../conn.php";

$nMaschera=$_GET['nMaschera'];
$deposito=$_POST['deposito'];
$sarta=$_POST['sarta'];
$riparazione=$_POST['riparazione'];
$descrizione=$_POST['descrizione'];

    try {
       
$nMaschera=$_GET['nMaschera'];
      

        if (isset($deposito)&& !(empty($deposito))) {

            $sql = "UPDATE maschera SET deposito='$deposito' WHERE  nMaschera='$nMaschera' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

       } 

       if (isset($sarta)&& !(empty($sarta))) {

        
        $sql = "UPDATE maschera SET codiceSarta='$sarta' WHERE nMaschera='$nMaschera';  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

   } 

   
   if (isset($riparazione)&& !(empty($riparazione))) {

    if($riparazione=="si"){
        
    $sql = "UPDATE maschera SET riparazione='$riparazione' WHERE nMaschera='$nMaschera'  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    date_default_timezone_get();
    $date = date('Y-m-d', time());
    
     $query = " INSERT INTO riparazione VALUES('$nMaschera',NULL,'$date',NULL,'');
      
";
$stmt = $conn->prepare($query);
$stmt->execute();



    }else {
             
    $sql = "UPDATE maschera SET riparazione='$riparazione' WHERE nMaschera='$nMaschera'  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    date_default_timezone_get();
    $date = date('Y-m-d', time());
    
     $query = "  DELETE riparazione WHERE  nMaschera='$nMaschera';  
";
$stmt = $conn->prepare($query);
$stmt->execute();



    }

} 

echo $descrizione;

if (isset($descrizione)&& !(empty($descrizione))) {

    $sql = "UPDATE maschera SET descrizione='$descrizione' WHERE nMaschera='$nMaschera'  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

if (isset($_FILES['my_image'])) {

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error == 0) {
	
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database

                $sql = "SELECT * FROM galleria
                WHERE nMaschera = '$nMaschera'  LIMIT 1";
       
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $totale = $stmt->rowCount();
       
             
       
               if ($totale == 1) {
                  
                $sql = "UPDATE galleria SET immagine='$new_img_name' WHERE nMaschera='$nMaschera'  ";
  
				$stmt = $conn->prepare($sql);
   $stmt->execute();
   
               
             }else{
                $sql = "INSERT INTO galleria 
                VALUES('$nMaschera','$new_img_name')";
    
        $stmt = $conn->prepare($sql);
$stmt->execute();

             }
			
			}else {
				$em = "non puoi inserire file di questo tipo";
		       //  header("Location: modificaMaschera.php?error=".$em." &&nMaschera=".$mascheraVecchio.""); 
			}
		
	}


}else {

}

        
   
	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";
   
 

 
    
     header("Location: impostazioniMaschera.php?nMaschera=".$mascheraVecchio."");
       exit(); 

    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
        die();
    } finally {
        $conn = null;
    }


    


    

                ?>
