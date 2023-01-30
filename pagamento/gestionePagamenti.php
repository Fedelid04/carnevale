<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/logStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <title>report pagamenti</title>
</head>

<body>
    <div class='flexContainer'>
        <section class='navbar'>
            <div class='home'><a class='opzione' href="gestionePagamenti.php">GESTIONE PAGAMENTI</a></div>
            <hr>
            </hr>
            <div class='ricerca'>
                <span class='clienti'>lista pagamenti</span>
                <input type='text' name='searchBar' class='searchBar' id="textClienti">
                <div class="lente">
                    <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
                </div>
            </div>

            <!-- Scrittura procedurale clienti da database -->
            <div class='listaClienti'>
                <ul id='clientiElenco' style="overflow: auto;">
                    <?php
                    include  "../conn.php";

                    $sql = "SELECT * FROM socio";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='socio: " . $row['codSocio'] . " tessera: " . $row['nTessera'] . "' class='opzione cliente " . $row['codSocio'] . "' href='gestionePagamenti.php?";
                        echo "codSocio=";
                        echo $row['codSocio'];
                        echo "&&nTessera=" . $row['nTessera'] . "'>";
                        echo 'socio:' . $row['codSocio'] . ' tessera:' . $row['nTessera'];
                        /*      if($row['attivita']=="no"){
                        echo ' stato:';
                       
                            echo ' 🔴 ';
                      
                        echo "</a></li>";
                        }else {
                            echo ' stato:';
                            echo ' 🟢 ';
                          
                        } */
                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div style=" transform: translateY(20px);">
                <ul class="sub-menu">
                    <a style="font-size:30px; color:white; " href="reportTessere.php">
                        <i class='fas fa-arrow-alt-circle-left' style='font-size:48px; transform: translateX(133px);'></i></a>

                    <a style="font-size:30px; color:white; " href="reportSocio.php">
                        <i class='fas fa-arrow-alt-circle-right' style='font-size:48px; transform: translateX(163px);'></i></a>
                </ul>
            </div>



            <a class='logout' href="home.php" style="width: 360px;"><button class='bottone'>HOME</button></a>




        </section>



        <section class='tabelleLog' style="overflow:hidden;">
            <section class="container">

                <?php
                include("../stampaCampi.php");



                if (isset($_GET['codSocio'])) {

                    try {
                        include  "conn.php";
                        $nTessera = $_GET['nTessera'];
                        $codSocio = $_GET['codSocio'];


                        $sql = "SELECT pagamentotessera.codSocio, pagamentotessera.nTessera, pagamentotessera.annoPagato, pagamentotessera.quota,  pagamentotessera.numeroRicevuta
                            FROM pagamentotessera
                            WHERE pagamentotessera.nTessera = '$nTessera' AND pagamentotessera.codSocio='$codSocio';";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        $totale = $stmt->rowCount();

                        if ($totale == 0) {
                            echo '<div class="spostamentoReport">';
                            echo "<div class='nomeSocieta'>report: informazioni pagamento </div>";
                            echo "<div class='nomeS' style='width: 320px;'> nessuna attività con tessera n." . $nTessera . " </div>";
                            echo '</div>';
                        } else {
                            $codSocio = $_GET['codSocio'];
                            $nTessera = $_GET['nTessera'];
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $codSocio = $_GET['codSocio'];



                            echo "<div class='nomeSocieta'>pagamento: " . $nTessera . " (socio " . $codSocio . ")</div>";
                            echo '<div class="spostamentoReport">';
                            echo "<div class='nomeS' style='width: 300px;'>report: informazioni pagamento</div>";

                            echo "<div class='reportList'>";

                            creaTabella($sql, $stmt, [0, 1, 2, 3, 4]);

                            echo "</div>";
                            echo "</div>";



                            include  "conn.php";

                            $sql = "SELECT attivita FROM tessera WHERE nTessera='$nTessera'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                if ($row['attivita'] == "si") {
                                    $fig = "<mark style=' background: lightgreen; border-radius:20px; '>attività: si 🟢</mark>";
                                } else {
                                    $fig = "<mark style=' background: indianred; border-radius:20px; '>attivià: no  🔴</mark>";
                                }


                                echo "
                                 <div class='infoSocio' style='height: 30px; '>" . $fig . "</div>
                                ";
                            }
                        }
                    } catch (PDOException $e) {
                        echo "Errore nella query....<br/>";
                        echo $e->getMessage() . "<br/>";
                        die();
                    } finally {
                        $conn = null;
                    }
                } else {




                    echo '<form action="aggiungiPagamento.php" method="post" name="form" id="form" class="" style="height: 410px; color:black; z-index: 100; position:absolute;">

        <fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 450px; color:black;  transform: translateX(7%);">';


                    if (isset($_GET['errore'])) {
                        $errore = $_GET['errore'];

                        if ($errore == 1) {
                            echo "<div class='errore' style=' width: 900px;'>pagamento già registrato </div>";
                        }
                        if ($errore == 2) {
                            echo "<div class='errore' style='font-size:20px; width: 900px;'>anno pagato non puo' essere minore della data di iscrizione </div>";
                        }
                        if ($errore == 4) {
                            echo "<div class='errore' style='font-size:20px; width: 900px;'>codice socio e tessera non corrispondono </div>";
                        }
                        if ($errore == 5) {
                            echo "<div class='errore' style='font-size:20px; width: 900px;'>numero ricevuta già registrato</div>";
                        }
                    }



                    echo '  <h1>aggiungi pagamento</h1>
     <hr style="transform: translateY(15px); color:black; height:3px;">
     <br>';


                    echo ' <label for="codSocio" >  codice socio:</label>
 
   <select id="codSocio" style="transform: translateX(-5%);" name="codSocio" required >
   <option value=""> </option>';

                    try {
                        include  "conn.php";


                        $sql = "SELECT * from socio";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo ' <option value=' . $row['codSocio'] . '>' . $row['codSocio'] . ' nome: ' . $row['codSocio'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo "Errore nella query....<br/>";
                        echo $e->getMessage() . "<br/>";
                        die();
                    } finally {
                        $conn = null;
                    }


                    echo ' </select>';



                    echo '<br> <label for="nTessera" >  numero tessera:</label>
  
   <select id="nTessera" style="transform: translateX(-10%);" name="nTessera" required>
   <option value=""> </option>';

                    try {
                        include  "../conn.php";



                        $sql = "SELECT nTessera from socio;";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo ' <option value=' . $row['nTessera'] . '>' . $row['nTessera'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo "Errore nella query....<br/>";
                        echo $e->getMessage() . "<br/>";
                        die();
                    } finally {
                        $conn = null;
                    }


                    echo ' </select>';


                    echo ' <br><br>   <label for="annnoP">anno pagato:</label>
   ';

                    date_default_timezone_get();
                    $date = date('Y', time());

                    echo '<input type="number" required id="annnoP" name="annnoP" placeholder="anno"
 
 min="1920" max=' . $date . ' style="height: 25px;transform: translateX(15%);" required >';

                    echo ' <br>  
 ';
                    echo ' <br>  
 ';
                    echo '<label for="quota">quota:</label>
 ';
                    echo '<input type="number" id="quota" name="quota" min="10" max="2099" step="1" style="transform: translateX(35%);" required />';

                    echo '<br>';
                    echo '<br>';

                    echo '<label for="ricevuta">numero di ricevuta: </label>';

                    echo '<input type="text" id="ricevuta" name="ricevuta" required />';


                    echo '
  <div><input type="submit" value="registra" class="submit" id="registrazione" style=" transform: translateY(-10px); font-size:20px; height: 30px;"></div>
</fieldset>
  </form> ';



                    echo '<form action="eliminaPagamento.php" method="post" name="form" id="form" class="" style="height: 200px; color:black; transform: translateY(470px);">
          
                 
  <fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 270px; color:black;">';

                    if (isset($_GET['errore'])) {
                        $errore = $_GET['errore'];

                        if ($errore == 3) {
                            echo "<div class='errore' style=' width: 900px;'>pagamento non esiste </div>";
                        }
                    }


                    echo '  <h1>elimina pagamento</h1>
 <hr style="transform: translateY(15px); color:black; height:3px;">
 <br>';


                    echo ' <label for="annoP" >  anno del pagamento:</label>
  
 <select id="annoP" style="transform: translateX(-20%);" name="annoP" >
 <option value=""> </option>';

                    try {
                        include  "../conn.php";



                        $sql = "SELECT DISTINCT annoPagato FROM pagamentotessera ORDER BY annoPagato";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo ' <option value=' . $row['annoPagato'] . '>' . $row['annoPagato'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo "Errore nella query....<br/>";
                        echo $e->getMessage() . "<br/>";
                        die();
                    } finally {
                        $conn = null;
                    }


                    echo ' </select>';


                    echo '<br><br> <label for="nTessera" >  numero Tessera:</label>
  
   <select id="nTessera" style="transform: translateX(-13%);" name="nTessera" >
   <option value=""> </option>';

                    try {
                        include  "../conn.php";



                        $sql = "SELECT DISTINCT nTessera from pagamentotessera";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo ' <option value=' . $row['nTessera'] . '>' . $row['nTessera'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo "Errore nella query....<br/>";
                        echo $e->getMessage() . "<br/>";
                        die();
                    } finally {
                        $conn = null;
                    }


                    echo ' </select>

  
   
 <div><input type="submit" value="elimina" class="submit" id="registrazione" style=" transform: translateY(-10px); font-size:20px; height: 30px;"></div>
 ';


                    echo '</fieldset>
  </form> ';
                }

                ?>
            </section>
        </section>

    </div>
    <hr>
    </hr>
</body>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function() {
        $('#table').dataTable({
            "order": [
                [3, 'desc']
            ],
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