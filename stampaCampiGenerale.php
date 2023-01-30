<?php
function creaTabella($sql, $stmt, $vetIndex)
{
    $sql = explode("FROM", $sql)[0];
    $sql = removeSpaces($sql);
    $vetCampi = getCampi($sql);
   
    // print_r($vetCampi);
    echo '<table border = "1" id="table" style="height: 100px;">';
  
    echo getHeader($vetCampi, $vetIndex);
   
    echo '<tbody id="myTable" style="height: 20px;">';
    printTable($stmt, $vetCampi, $vetIndex);
    echo '</tbody>';
  echo '  <tfoot>
    <tr>
        <th></th>
        <th>uscita</th>
        <th></th>
        <th></th>
        <th>uscita esterna</th>
      
    </tr>
</tfoot>';
    echo "</table>";

}

function creaTabella2($sql, $stmt, $vetIndex)
{
    $sql = explode("FROM", $sql)[0];
    $sql = removeSpaces($sql);
    $vetCampi = getCampi($sql);

    // print_r($vetCampi);
    echo '<table border = "1" id="table" style="height: 100px;">';
    
    echo getHeader2($vetCampi, $vetIndex);
   
    echo '<tbody id="myTable" style="height: 20px;">';
    printTable($stmt, $vetCampi, $vetIndex);
    echo '</tbody>';
    echo "</table>";
}

#creo un vettore che contiene i campi della query

function getCampi($sql)
{
    $vetData = explode(",", $sql);
    $vetCampi = [];
    for ($i = 0; $i < count($vetData); $i++) {
        # code...
        # predno solo il campo e non la tabella di provenienza
        $vetCampi[$i] = explode(".", $vetData[$i])[1];
    }
    return $vetCampi;
}

# rimuove gli spazi per poter poi isolare i campi della query

function removeSpaces($sql)
{

    $string = "";
    for ($i = 7; $i < strlen($sql); $i++) {
        # code...
        if ($sql[$i] != " ") {
            $string .= $sql[$i];
        }
    }
    $string = rtrim($string);
    return $string;
}

# ritorna l'header da stampare

function getHeader($vetCampi, $vetIndex)
{
    $string = "<thead>";
    $string .= "<tr>";

    for ($i = 0; $i < count($vetCampi); $i++) {
        # code...
        for ($j = 0; $j < count($vetIndex); $j++) {
            # code...
            if ($i == $vetIndex[$j]) {
                # code...
                $string .= "<td style='height: 20px;'>";
              
                $string .= $vetCampi[$i];
                $string .= "</td>";
            }
        }
    }

    $string .= "</tr>";
    $string .= "</thead>";
    return $string;
}

function getHeader2($vetCampi, $vetIndex)
{
   
    $string = "<tr>";

    for ($i = 0; $i < count($vetCampi); $i++) {
        # code...
        for ($j = 0; $j < count($vetIndex); $j++) {
            # code...
            if ($i == $vetIndex[$j]) {
                # code...
                $string .= "<td style='height: 20px;'>";
              
                $string .= $vetCampi[$i];
                $string .= "</td>";
            }
        }
    }

    $string .= "</tr>";
    
    return $string;
}

function printTable($stmt, $vetCampi, $vetIndex)
{
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        for ($i = 0; $i < count($vetCampi); $i++) {
            # code...
            for ($j = 0; $j < count($vetIndex); $j++) {
                # code...
                if ($i == $vetIndex[$j]) {
                
               
                    if ($row[$vetCampi[$i]] == NULL && $vetIndex[$j] != 4 && $vetIndex[$j] != 1 ) {
                        # code...
                        echo "<td style='height: 20px;'>";
                        echo' <input class="form-check-input" type="checkbox" value="N/A" name="check[]" onchange="cambio(this);">
                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>';
                        echo "N/A";
                        echo "</td>";
                    }elseif ($row[$vetCampi[$i]] == "si") {
                        echo "<td style='background: lightgreen; height: 20px;'>";
                        echo $row[$vetCampi[$i]];
                        echo "</td>";
                    }elseif ($row[$vetCampi[$i]] == "no") {
                        echo "<td style='background: indianred; height: 20px;'>";
                        echo $row[$vetCampi[$i]];
                        echo "</td>";
                    }elseif ($vetIndex[$j] == 4 && $row[$vetCampi[$i]] == NULL) {
                        echo "<td style='height: 20px;'>";
                        echo "N/A";
                        echo "</td>";
                    }elseif ($vetIndex[$j] == 1 && $row[$vetCampi[$i]] == NULL) {
                        echo "<td style='height: 20px;'>";
                        echo "N/A";
                        echo "</td>";
                    }elseif($vetIndex[$j]==3){
                        

try {
  include "conn.php";

  $ma=$row[$vetCampi[$i]];

      $sql = " SELECT riparazione,nMaschera FROM maschera WHERE nMaschera='$ma' ;
       ";
      
         $stmt2 = $conn->prepare($sql);
         $stmt2->execute();
         while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $riparazione=$row2['riparazione'];
           
         }
         

         if($ma="N/A"){
            $riparazione="no";
         }
     

           ?>
  
           
         
           <?php      
           
    

      }catch (PDOException $e) {
          echo "Errore nella query....<br/>";
          echo $e->getMessage() . "<br/>";
          die();
      } finally {
          $conn = null;
      }


                        echo "<td style='height: 20px;'>";
                        echo' <input class="form-check-input" type="checkbox" value='.$row[$vetCampi[$i]].' name="check2[]" onchange="cambio(this);">';
                     
                        if($riparazione=="si"&&$row[$vetCampi[$i]]!='N/A'){
                            echo "<a href='?val=".$row[$vetCampi[$i]]."' onclick='test_click2(this.innerHTML);' id='f' value=".$row[$vetCampi[$i]]." style='color: black;'>".$row[$vetCampi[$i]]."</a>";
                       echo " ⓡ";
                           }else {
                             echo $row[$vetCampi[$i]];

                           }
                        echo "</td>";

                                               
                    try {
                        $hostname = "localhost";
                        $dbname = "carnevale";
                        $user = "root";
                        $pass = "";
                        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
  
                        if (isset($_GET['val'])&& $_GET['val']!='N/A' ) {
     
                    $masch=$_GET['val'];
                        
                    $sql6 = " SELECT * FROM riparazione WHERE codiceMaschera='$masch' AND dataFineRiparazione IS NULL;
                    ";
                   
                      $stmt6 = $conn->prepare($sql6);
                      $stmt6->execute();
                      while ($row6 = $stmt6->fetch(PDO::FETCH_ASSOC)) {
                         $note2=$row6['note'];
                        
                         $dataInizioRiparazione2=$row6['dataInizioRiparazione'];
                     
                         $dataFineRiparazione2=$row6['dataFineRiparazione'];
                       
                      }  

             ?>
         <script type="text/javascript">
         function test_click2(masc){
         
var mar="<?php echo $masch?>";
if(masc==mar){
    
             var dataF2="<?php echo $dataFineRiparazione2?>";
             if (dataF2=="") {
                dataF2="N/A";
             }
           
             var message4 = "<?php echo "note: ".$note2." " ?>";
             var message5 = "<?php echo "data inizio riparazione: ".$dataInizioRiparazione2." " ?>";
             var message6 = "data fine riparazione: "+dataF2;
             alert("informazioni riparazione: \n"+message4+" \n"+message5+" \n"+message6);
         
             return true;
}
 

         }
         </script>
 <?php  
                   }
                       
            
                    
                    
        }catch (PDOException $e) {
            echo "Errore nella query....<br/>";
            echo $e->getMessage() . "<br/>";
            die();
        } finally {
            $conn = null;
        }

                    }elseif($vetIndex[$j]==0){
                        echo "<td style='height: 20px;'>";
                        echo' <input class="form-check-input" type="checkbox" value='.$row[$vetCampi[$i]].' name="check3[]" onchange="cambio(this);">';
                     
                        echo $row[$vetCampi[$i]];
                        echo "</td>";
                    } else {

                        
try {
    $hostname = "localhost";
    $dbname = "carnevale";
    $user = "root";
    $pass = "";
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
  
    $ma=$row[$vetCampi[$i]];
  
        $sql3 = " SELECT riparazione,nMaschera FROM maschera WHERE nMaschera='$ma';
         ";
        
           $stmt3 = $conn->prepare($sql3);
           $stmt3->execute();
           while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
              $riparazione=$row3['riparazione'];
          
           }  
?>
  
 
  <?php      
  
        }catch (PDOException $e) {
            echo "Errore nella query....<br/>";
            echo $e->getMessage() . "<br/>";
            die();
        } finally {
            $conn = null;
        }
                        echo "<td style='height: 20px;'>";
                        echo' <input class="form-check-input" type="checkbox" value='.$row[$vetCampi[$i]].' name="check[]" id="check[]" onchange="cambio(this);">';
                       
                        if($riparazione=="si"&&$row[$vetCampi[$i]]!='N/A'){
                            echo "<a href='?val=".$row[$vetCampi[$i]]."' onclick='test_click(this.innerHTML);' id='f' value=".$row[$vetCampi[$i]]." style='color: black;'>".$row[$vetCampi[$i]]."</a>";
                       echo " ⓡ";
                           }else {
                             echo $row[$vetCampi[$i]];

                           }
                        echo "</td>";
                    }
                       
                    try {
                        $hostname = "localhost";
                        $dbname = "carnevale";
                        $user = "root";
                        $pass = "";
                        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
                      

                   if (isset($_GET['val'])&& $_GET['val']!='N/A' ) {
                    $masch=$_GET['val'];
                        
           $sql4 = " SELECT * FROM riparazione WHERE codiceMaschera='$masch' AND  dataFineRiparazione IS NULL;
           ";
          
             $stmt4 = $conn->prepare($sql4);
             $stmt4->execute();
             while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
                $note=$row4['note'];
              
                $dataInizioRiparazione=$row4['dataInizioRiparazione'];
           
                $dataFineRiparazione=$row4['dataFineRiparazione'];
              
             }  

             ?>
          <script type="text/javascript">
function test_click(masc){
var mar="<?php echo $masch?>";
if(masc==mar){
       var dataF="<?php echo $dataFineRiparazione?>";
    if (dataF=="") {
       dataF="N/A";
    }
  
    var message = "<?php echo "note: ".$note." " ?>";
    var message2 = "<?php echo "data inizio riparazione: ".$dataInizioRiparazione." " ?>";
    var message3 = "data fine riparazione: "+dataF;
    alert("informazioni riparazione: \n"+message+" \n"+message2+" \n"+message3);
    return true;
}
 
}
</script>
 <?php
                   }
                       
            
                    
                    
        }catch (PDOException $e) {
            echo "Errore nella query....<br/>";
            echo $e->getMessage() . "<br/>";
            die();
        } finally {
            $conn = null;
        }

                }
            }
        }
        echo "</tr>";
    }
}



?>

          