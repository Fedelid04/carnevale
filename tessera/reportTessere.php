
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
  
   
    <title>report Tessere</title>
</head>

<body>
    <div class='flexContainer'>
        <section class='navbar'>
            <div class='home'><a>REPORT TESSERE</a></div>
            <hr>
            </hr>    
            <div class='ricerca'>
                    <span class='clienti'>cerca:</span>
                    <input type='text' name='searchBar' class='searchBar' id="textClienti">
                    <div class="lente">
                        <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
                    </div>
            </div>
                        <div class='nuovoCliente' style="transform: translateX(66px);" >
                <a href='gestionePagamenti.php'><button style=" position: relative; right:40%;">gestione pagamenti</button></a>
            </div>
            <!-- Scrittura procedurale clienti da database -->
            <div class='listaClienti'>
                <ul id='clientiElenco'>
                    <?php
                    include "../conn.php";

                    $sql = "SELECT * FROM tessera";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='" . $row['nTessera'] . " " . $row['tipo'] . " " . $row['codSocio'] . "' class='opzione cliente " . $row['nTessera'] . "' href='reportTessere.php?";
                        echo "nTessera=";
                        echo $row['nTessera'];
                        echo "&&tipo=".$row['tipo']."&&codSocio=".$row['codSocio']."&&attivita=".$row['attivita']."'>";
                        echo $row['nTessera'].' '.$row['tipo'].' '.$row['codSocio'];
                       
                      
                        if($row['attivita']=="si"){
                            echo ' 🟢 ';
                        }else if($row['attivita']=="no"){
                            echo ' 🔴 ';
                        }else {
                            echo ' 🟠 ';
                        }
                        

                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </div>            


            <a class='reportino' href="reporttessere.php"><button class='bottone'>TORNA AL REPORT</button></a>
            <a class='logout' href="home.php"><button class='bottone'>HOME</button></a>
          
        </section>



        <section class='tabelleLog'>
        <section class="container">
           
            <?php
            include("../stampaCampi.php");

            try {
                include "../conn.php";

                if (isset($_GET['nTessera'])) {

                    $nTessera = $_GET['nTessera'];
                
                    $sql = "SELECT tessera.codSocio, tessera.attivita, tessera.tipo, tessera.nTessera
                    FROM tessera
                    WHERE tessera.nTessera = '$nTessera';";
                    
                       $stmt = $conn->prepare($sql);
                       $stmt->execute();


                    $totale= $stmt->rowCount();
                  
                    if($totale==0){
                        echo '<div class="spostamentoReport">';
                        echo "<div class='nomeSocieta'>report: informazioni tessera </div>";
                        echo "<div class='nomeS' style='width: 320px;'> nessuna attività con tessera n.".$nTessera." </div>";
                        echo '</div>';

                    }else{

                    $nTessera = $_GET['nTessera'];
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $codSocio=$_GET['codSocio'];
    
               
                   
                    echo "<div class='nomeSocieta'>report: numero tessera: ".$nTessera."</div>";
                    echo '<div class="spostamentoReport">';
                    echo "<div class='nomeS' style='width: 300px;'>report: informazioni tessera</div>";
                 
                    echo "<div class='reportList'>";
                  
                    creaTabella2($sql, $stmt, [0, 1, 2, 3]);
                  
                    echo "</div>";
                    echo "</div>";


                 
                    $sql = "SELECT socio.nome, socio.cognome, socio.codSocio, socio.nTessera
                    FROM socio
                    WHERE socio.nTessera = '$nTessera';";
                    
                       $stmt = $conn->prepare($sql);
                       $stmt->execute();

                       $totale= $stmt->rowCount();

                       if ($totale==0) {
                        echo '<div class="spostamentoReport">';
                        echo "<div class='nomeS' style='transform: translateY(-20px);'> nessun Socio".$codSocio." </div>";
                        echo '</div>';
                       } else {

                 
                    echo '<div class="spostamentoReport">';
                    echo "<div class='nomeT'>report: informazioni socio </div>";
                    echo "<div class='reportlisttessera'>";
                    
                    creaTabella($sql, $stmt, [0, 1, 2, 3]);
                  
                    echo "</div>";
                    echo "</div>";
                    
                       }
                       


                }

                } else {
                    $sql = "SELECT socio.codSocio, socio.nome, socio.cognome, socio.nTessera, socio.carica, socio.anniPagati, socio.staff,
                     tessera.attivita
                    FROM tessera NATURAL JOIN socio;
                    ";

                    
                    $totale= $stmt->rowCount();
                    if($totale==0){
                        echo "<div class='nomeSocieta' style='width:600px'> nessuna attività con i dati richiesti  </div>";

                   }else {

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                
                    echo '<div class="spostamentoReport">';
                    echo "<div class='reportList' style='left: 1%; top:20px;'>";
                    creaTabella($sql, $stmt,[0, 1, 2, 3, 4, 5, 6, 7]);
                    echo "</div>";
                    echo "</div>";

                  
                    echo "<div style='transform: translateY(610px)'>";
                    echo "<div class='nomeSocieta' style='
                    transform: translateX(640px); background: darkgreen; width: 200px; position:absolute; top: -20px;'>";
                    echo "<a href='download.php?scelta=3'>scarica file .xls <i class='bx bx-download'></i></a>";
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
        "order": [[3, 'desc']],
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