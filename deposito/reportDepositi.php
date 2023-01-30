
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/logStyle.css">

         
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
    <title>report Depositi</title>
</head>

<body>
    <div class='flexContainer'>
        <section class='navbar'>
            <div class='home'><a>REPORT DEPOSITI</a></div>
            <hr>
            </hr>    
            <div class='ricerca'>
                    <span class='clienti'>cerca:</span>
                    <input type='text' name='searchBar' class='searchBar' id="textClienti">
                    <div class="lente">
                        <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
                    </div>
</div>
            <!-- Scrittura procedurale clienti da database -->
            <div class='listaClienti'>
                <ul id='clientiElenco'>
                    <?php
                    include "../conn.php";

                    $sql = "SELECT * FROM deposito";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='".$row['deposito']." ".$row['citta']."' class='opzione cliente " . $row['deposito'] . "' href='reportDepositi.php?";
                        echo "deposito=";
                        echo $row['deposito'];
                        echo "&&descrizione=".$row['descrizione']."&&citta=".$row['citta']."'>";
                        echo  $row['deposito'].' '.$row['citta'];
                       echo "</a>";

                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </div> 

                

            <a class='reportino' href="reportdepositi.php"><button class='bottone'>TORNA AL REPORT</button></a>
            <a class='logout' href="../home.php"><button class='bottone'>HOME</button></a>
          
        </section>



        <section class='tabelleLog'>
        <section class="container">
           
            <?php
            include("../stampaCampi.php");

            try {
                $hostname = "localhost";
                $dbname = "carnevale";
                $user = "root";
                $pass = "";
                $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);

                if (isset($_GET['deposito'])) {

                    $deposito = $_GET['deposito'];
                
                    $sql = "SELECT deposito.deposito, deposito.citta, deposito.descrizione, deposito.dataInizioNoleggio, deposito.dataFineNoleggio
                    FROM deposito
                    WHERE deposito.deposito = '$deposito';";
                    
                       $stmt = $conn->prepare($sql);
                       $stmt->execute();


                    $totale= $stmt->rowCount();
                  
                    if($totale==0){
                        echo '<div class="spostamentoReport">';
                        echo "<div class='nomeSocieta'>report: informazioni deposito </div>";
                        echo "<div class='nomeS' style='width: 320px;'> nessuna attività con".$deposito." </div>";
                        echo '</div>';

                    }else{

                    $deposito = $_GET['deposito'];
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $descrizone=$_GET['descrizione'];
                    $citta=$_GET['citta'];
    
               
                   
                    echo "<div class='nomeSocieta'>report: ".$descrizone." (".$deposito.")</div>";
                    echo "<div class='infoSocio'>";

                 try {
                    $hostname = "localhost";
                    $dbname = "carnevale";
                    $user = "root";
                    $pass = "";
                    $conn2 = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
                    
                   
                
                    $sql2 = "SELECT * from deposito WHERE deposito='$deposito';";
                    $stmt2 = $conn2->prepare($sql2);
                    $stmt2->execute();
                    
                    
                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        $costo= $row2['costoMese'];
                        $dataInizo= $row2['dataInizioNoleggio'];
                        $dataFine= $row2['dataFineNoleggio'];
                    }
                    
                    } catch (PDOException $e) {
                    echo "Errore nella query....<br/>";
                    echo $e->getMessage() . "<br/>";
                    die();
                    } finally {
                    $conn2 = null;
                    }

                    $diff = strtotime($dataFine) - strtotime($dataInizo);
  
                  //differenza giorni
                $giorni=abs(round($diff / 86400));

                if($giorni==0){
                    echo  "costo: ".$costo." euro al mese";
                    echo  "<br><mark style=' background: indianred; border-radius:20px; '> giorni di affitto: ".$giorni." </mark> ";
                    $costoGiorno= $costo /30;
                    $costoTot= $costoGiorno*$giorni;
                    echo "<br> costo totale dell'affito:<mark style=' background: indianred; border-radius:20px; '> N/A euro </mark>";
                       

                }elseif($dataFine==NULL){
                    echo  "costo: ".$costo." euro al mese";
                    echo  "<br><mark style=' background: indianred; border-radius:20px; '> giorni di affitto: N/A </mark> ";
                    $costoGiorno= $costo /30;
                    $costoTot= $costoGiorno*$giorni;
                    echo "<br> costo totale dell'affito:<mark style=' background: indianred; border-radius:20px; '> N/A euro </mark>";
                       

                }else{
                    echo  "costo: ".$costo." euro al mese";
                    echo  "<br><mark style=' background: lightgreen; border-radius:20px; '> giorni di affitto: ".$giorni." </mark>";
                    $costoGiorno= $costo /30;
                    $costoTot= $costoGiorno*$giorni;
                    echo "<br> costo totale dell'affito: <mark style=' background: lightgreen; border-radius:20px; '>".$costoTot." euro </mark>";
                       

                }
           
                    echo"</div>";
                    echo '<div class="spostamentoReport">';
                    echo "<div class='nomeS' style='width: 300px;'>report: informazioni deposito</div>";
                 
                    echo "<div class='reportList' >";
                  
                    creaTabella2($sql, $stmt, [0, 1, 2, 3, 4]);
                  
                    echo "</div>";
                    echo "</div>";


                 
                    $sql = "SELECT maschera.nMaschera, maschera.descrizione, maschera.deposito FROM maschera
                    WHERE maschera.deposito = '$deposito';";
                    
                       $stmt = $conn->prepare($sql);
                       $stmt->execute();

                       $totale= $stmt->rowCount();

                       if ($totale==0) {
                        echo '<div class="spostamentoReport">';
                        echo "<div class='nomeT'>report: informazioni maschera </div>";
                        echo "<div class='nomeT'> nessuna maschera utilizzata </div>";
                        echo '</div>';
                       } else {

                 
                    echo '<div class="spostamentoReport">';
                    echo "<div class='nomeT'>report: informazioni maschera </div>";
                    echo "<div class='reportListSocio' style='width: 400px;'>";
                    
                    creaTabella($sql, $stmt, [0, 1, 2]);
                  
                    echo "</div>";
                    echo "</div>";
                    
                       }
                       


                }

                } else {
                    $sql = "SELECT deposito.deposito, deposito.citta, deposito.descrizione FROM deposito;
                    ";

                    
                    $totale= $stmt->rowCount();
                    if($totale==0){
                        echo "<div class='nomeSocieta' style='width:600px'> nessuna attività con i dati richiesti  </div>";

                   }else {

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                  
                    echo '<div class="spostamentoReport">';
                    echo "<div class='reportList' style='left: 18%; top:20px;'>";
                    creaTabella($sql, $stmt,[0, 1, 2]);
                    echo "</div>";
                    echo "</div>";

                   
                    echo "<div style='transform: translateY(610px)'>";
                    echo "<div class='nomeSocieta' style='background: darkgreen;
                    width: 200px;
                    position: relative;
                    left: 70%;
                    bottom: 10px;'>";
                    echo "<a href='download.php?scelta=5'>scarica file .xls <i class='bx bx-download'></i></a>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            } catch (PDOException $e) {
                echo "Errore nella query....<br/>";
                echo $e->getMessage() . "<br/>";
                die();
            } finally {
                $conn = null;
            }
            ?>
            </section>
            </section>

    </div>
    <hr>
    </hr>
</body>
  
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
        
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function () {
    $('#table').dataTable({
        "order": [[2, 'desc']],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/it-IT.json"
        }
    });
});


let clienti = document.getElementsByClassName('cliente');
let searchBar = document.getElementById('textClienti');
let lista = document.getElementById('clientiElenco');
let listaBackup = lista;
let search = searchBar.value;

searchBar.addEventListener("input", () => {
    let search = searchBar.value;
    let str = "";
    let entrato = false;

    for (let i = 0; i < clienti.length; i++) {
        let cliente = clienti[i].textContent;
        cliente = cliente.toLowerCase();
        search = search.toLowerCase();
        let id = clienti[i].id;
        let classes = clienti[i].classList.item(clienti[i].classList.length - 1);
        if (cliente.startsWith(search)) {
            entrato = true;
            str += "<li><ion-icon name='caret-forward'></ion-icon><a id='" + id + "' class='opzione cliente " + classes + "' href='reportSocio.php?page=" + id + "&idCliente=" + classes + "'>" + id + "</a></li>";
        } else {
            str += "<li><a id='" + id + "' class='vuoto cliente " + classes + "' href='reportSocio.php?page=" + id + "&idCliente=" + classes + "'>" + id + "</a></li>";
        }
    }
    // se non si è trovato alcun risultato
    if (!entrato) {
        str += "<li class='noresult'>Nessun Risultato</li>";
    }
    lista.innerHTML = str;
});
</script>
  
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>