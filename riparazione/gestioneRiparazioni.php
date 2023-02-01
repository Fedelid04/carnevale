
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/logStyle.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


    <title>report riparazioni</title>
</head>

<body>
    <div class='flexContainer'>
        <section class='navbar'>
            <div class='home'><a class='opzione' href="gestioneRiparazioni.php">GESTIONE RIPARAZIONI</a></div>
            <hr>
            </hr>
            <div class='ricerca'>
                <span class='clienti'>lista riparazioni</span>
                <input type='text' name='searchBar' class='searchBar' id="textClienti">
                <div class="lente">
                    <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
                </div>
            </div>
            <div class='nuovoCliente' style="transform: translateX(66px);">
                <a href='aggiungiSarta.php'><button style="width: 320px;">aggiungi sarta</button></a>
            </div>
            <!-- Scrittura procedurale clienti da database -->
            <div class='listaClienti'>
                <ul id='clientiElenco' style="overflow: auto;">
                    <?php
                    include "../conn.php";

                    $sql = "SELECT * FROM riparazione ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='masc." . $row['codiceMaschera'] . " sarta:" . $row['codiceSarta'] . "' class='opzione cliente " . $row['codiceMaschera'] . "' href='gestioneRiparazioni.php?";
                        echo "codiceMaschera=";
                        echo $row['codiceMaschera'];
                        echo "&&codiceSarta=" . $row['codiceSarta'] . "&&dataInizio=" . $row['dataInizioRiparazione'] . "&&dataFine=" . $row['dataFineRiparazione'] . " &&note=" . $row['note'] . "'>";
                        echo 'masc.' . $row['codiceMaschera'] . ' sarta:' . $row['codiceSarta'];
                        echo ' stato:';
                        if ($row['dataFineRiparazione'] == "") {
                            echo ' 🔴 ';
                        } else {
                            echo ' 🟢 ';
                        }


                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div style=" transform: translateY(20px);">
                <ul class="sub-menu">
                    <a style="font-size:30px; color:white; " href="reportMaschere.php">
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

                try {
                    include  "../conn.php";

                    if (isset($_GET['codiceMaschera'])) {

                        $nMaschera = $_GET['codiceMaschera'];
                        $dataFine = $_GET['dataFine'];
                        $dataInizio = $_GET['dataInizio'];
                        $note = $_GET['note'];
                        $codiceSarta = $_GET['codiceSarta'];


                        echo '<form action="cambioRiparazione.php?codiceV=' . $nMaschera . '&&sartaV=' . $codiceSarta . '&&dataIV=' . $dataInizio . '&&dataFV=' . $dataFine . '&&noteV=' . $note . '" method="post" name="form" id="form" class="" style="height: 430px; color:black; z-index: 100; position:absolute;">
         
                  <fieldset class="fieldsetSocioRegistrazione" style="width: 580px; height: 415px; color:black;  transform: translateX(20px);">';


                        if (isset($_GET['errore'])) {
                            $errore = $_GET['errore'];

                            if ($errore == 1) {
                                echo "<br><div class='errore' style=' width: 450px;'>codice socio già registrato </div><br>";
                            }
                        }



                        echo '  <h1>modifica riparazione</h1>
               <hr style="transform: translateY(15px); color:black; height:3px;">
               <br>';


                        echo ' <label for="codiceSarta" >  codice sarta:</label>
          
             <select id="codiceSarta" style="transform: translateX(-40px);" name="codiceSarta" >
             <option value=""> </option>';

                        try {
                            include  "../conn.php";



                            $sql = "SELECT * from sarta";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codiceSarta'] . '>' . $row['codiceSarta'] . ' nome: ' . $row['nomeSarta'] . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo "Errore nella query....<br/>";
                            echo $e->getMessage() . "<br/>";
                            die();
                        } finally {
                            $conn = null;
                        }


                        echo ' </select>';

                        echo '<label for="codiceMaschera" >  codice maschera:</label>
 
            <select id="codiceMaschera" style="transform: translateX(-40px);" name="codiceMaschera" >
            <option value=""> </option>';

                        try {
                            include  "../conn.php";



                            $sql = "SELECT * from maschera WHERE riparazione='no';";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['nMaschera'] . '>' . $row['nMaschera'] . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo "Errore nella query....<br/>";
                            echo $e->getMessage() . "<br/>";
                            die();
                        } finally {
                            $conn = null;
                        }


                        echo ' </select>';


                        echo ' <br><br>   <label for="dataI">data inizio riparazione:</label>
             ';

                        date_default_timezone_get();
                        $date = date('Y-m-d', time());

                        echo '<input type="date" id="dataI" name="dataI" placeholder="data" 
         
         min="1920-01-01" max=' . $date . ' style="height: 25px;" >';

                        echo ' <br>   <label for="dataF">data fine riparazione:</label>
         ';

                        echo '<input type="date" id="dataF" name="dataF" placeholder="data" 
      
      min="1920-01-01"  style="height: 25px;">';

                        echo '<br><br>   <label for="note">note:</label>
 
      <textArea id="note" style="transform: translateX(75px);" placeholder="note" name="note" maxlength="150"   rows="2" cols="30">
      </textArea>
      <div><input type="submit" value="registra" class="submit" id="registrazione" style=" transform: translateY(-10px); font-size:20px; height: 30px;"></div>
      ';



                        echo '</fieldset>
            </form> ';


                        echo '<div style=" transform: translateY(0px);">

          
            <fieldset class="fieldsetSocioRegistrazione" style="width: 450px; height: 415px; color:black;  transform: translateX(620px);">';

                        try {
                            include "../conn.php";


                            $sarta = $_GET['codiceSarta'];
                            $dataI = $_GET['dataInizio'];
                            $dataF = $_GET['dataFine'];
                            $n = $_GET['note'];

                            if ($dataF == " " || $dataF == NULL) {
                                $dataF = NULL;
                            }


                            $sql = "SELECT * from riparazione WHERE codiceMaschera='$nMaschera' AND codiceSarta='$sarta' AND dataInizioRiparazione='$dataI'
                AND note='$n';";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                echo ' <p>numero maschera:</p>';
                                echo ' <p>' . $row['codiceMaschera'] . '</p>';
                                echo ' <p>codice sarta:</p>';
                                echo ' <p>' . $row['codiceSarta'] . '</p>';
                                echo ' <p>data inizio riparazione:</p>';
                                echo ' <p>' . date("d-m-Y", strtotime($row['dataInizioRiparazione'])) . '</p>';
                                echo ' <p>data fine riparazione:</p>';
                                $fine = $row['dataFineRiparazione'];
                                if ($fine == "" || $fine == NULL) {
                                    echo ' <p style="color:darkred;"> N/A </p>';
                                } else {
                                    echo ' <p>' . date("d-m-Y", strtotime($row['dataFineRiparazione'])) . '</p>';
                                }

                                echo ' <p>note:</p>';
                                echo ' <p>' . $row['note'] . '</p>';
                            }

                            if ($sarta == '') {

                                echo ' <p>nessuna sarta: informazioni non disponibili</p>';
                            }
                        } catch (PDOException $e) {
                            echo "Errore nella query....<br/>";
                            echo $e->getMessage() . "<br/>";
                            die();
                        } finally {
                            $conn = null;
                        }

                        echo '</fieldset>
           
            </div> ';










                        if ($_GET['dataFine'] == " ") {

                            echo '<form action="" method="post" name="form" id="form" class="" style="height: 1100px; color:black; transform: translateY(0px);">
         
                
                   <fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 290px; color:black;">';
                            $dataInizio = $_GET['dataInizio'];
                            $date = new DateTime($dataInizio);
                            $now = new DateTime();

                            echo '<p style="float: right; background:white; font-size: 40px; width: 600px; border-radius:20px; border: solid 3px black;">';
                            echo $date->diff($now)->format("%d giorni, %h ore e %i minuti");
                            echo '</p>';

                            $interval = $date->diff($now);

                            if ($interval->format('%a') > 0) {
                                $hour1 = $interval->format('%a') * 24;
                            }
                            if ($interval->format('%h') > 0) {
                                $hour2 = $interval->format('%h');
                            }
                            echo '<p style="float: right; font-size: 20px; width: 400px; border-radius:20px; border: solid 1px black;">';
                            if (isset($hour1)) {
                                echo $hour1 + $hour2;
                            } else {
                                echo $hour2;
                            }


                            echo ' ore dalla commissione</p>';

                            echo '<p style="float: right; transform: translateY(30px); background:cornsilk; font-size: 40px; width: 600px; border-radius:20px; border: solid 3px black;">';
                            try {
                                include "../conn.php";


                                $sarta = $_GET['codiceSarta'];
                                $sql = "SELECT * from sarta WHERE codiceSarta='$sarta';";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();


                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $costo = $row['costoOra'];
                                }
                            } catch (PDOException $e) {
                                echo "Errore nella query....<br/>";
                                echo $e->getMessage() . "<br/>";
                                die();
                            } finally {
                                $conn = null;
                            }

                            if ($sarta == '') {
                                $costo = "non disponibili";
                            }
                            echo  "costo:" . $costo . " euro all'ora";
                            echo '</p>';

                            date_default_timezone_get();
                            $dateOra = date('d-m-Y', time());

                            $dI = date("d-m-Y", strtotime($dataInizio));
                            echo ' <div style="transform:translateY(-50px);"><br>
                   
                   <p style="float:left; color:green;">data inizio: ' . $dI . '</p>
                   <br> <br><br>
                   <p style="float:left; color:darkred;">data fine: non determinata</p>
                   <br> <br>
                   <p style="float:left"> data di oggi: ' . $dateOra . '</p></div>
                   ';
                            echo '</fieldset>
                 </form> ';
                        } else {


                            echo '<form action="" method="post" name="form" id="form" class="" style="height: 1100px; color:black; transform: translateY(0px);">
         
                
                   <fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 290px; color:black;">';



                            $dataInizio = $_GET['dataInizio'];
                            $dataFine = $_GET['dataFine'];

                            $date = new DateTime($dataInizio);
                            $now = new DateTime($dataFine);

                            echo '<p style="float: right; background:white; font-size: 40px; width: 600px; border-radius:20px; border: solid 3px black;">';
                            echo $date->diff($now)->format("%d giorni, %h ore e %i minuti");
                            echo '</p>';

                            $interval = $date->diff($now);

                            if ($interval->format('%a') > 0) {
                                $hour1 = $interval->format('%a') * 24;
                            }
                            if ($interval->format('%h') > 0) {
                                $hour2 = $interval->format('%h');
                            }

                            echo '<p style="float: right; font-size: 20px; width: 400px; border-radius:20px; border: solid 1px black;">';
                            if (isset($hour1) && isset($hour2)) {
                                echo $hour2 + $hour1;
                            } else if (isset($hour2)) {
                                echo $hour2;
                            } else if (isset($hour1)) {
                                echo $hour1;
                            }


                            echo ' ore dalla commissione</p>';

                            echo '<p style="float: right; transform: translateY(30px); background:cornsilk; font-size: 40px; width: 600px; border-radius:20px; border: solid 3px black;">';
                            try {
                                include "../conn.php";


                                $sarta = $_GET['codiceSarta'];
                                $sql = "SELECT * from sarta WHERE codiceSarta='$sarta';";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();


                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $costo = $row['costoOra'];
                                }
                            } catch (PDOException $e) {
                                echo "Errore nella query....<br/>";
                                echo $e->getMessage() . "<br/>";
                                die();
                            } finally {
                                $conn = null;
                            }


                            echo  "costo:" . $costo . " euro all'ora";
                            echo '</p>';

                            date_default_timezone_get();
                            $dateOra = date('d-m-Y', time());
                            $dI = date("d-m-Y", strtotime($dataInizio));
                            $df = date("d-m-Y", strtotime($dataFine));
                            echo ' <div style="transform:translateY(-50px);"><br>
                   <p style="float:left; color:green;">data inizio: ' . $dI . '</p>
                   <br> <br><br>
                   <p style="float:left; color:darkred;">data fine: ' . $df . '</p>
                   <br> <br>
                   <p style="float:left"> data di oggi: ' . $dateOra . '</p></div>
                   ';
                            echo '</fieldset>
                 </form> ';
                        }
                    } else {



                        echo '<form action="aggiungiRiparazione.php" method="post" name="form" id="form" class="" style="height: 430px; color:black; z-index: 100; position:absolute;">

       <fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 415px; color:black;  transform: translateX(20px);">';


                        if (isset($_GET['errore'])) {
                            $errore = $_GET['errore'];

                            if ($errore == 1) {
                                echo "<div class='errore' style=' width: 900px;'>codice maschera già registrato </div>";
                            }
                        }



                        echo '  <h1>aggiungi riparazione</h1>
    <hr style="transform: translateY(15px); color:black; height:3px;">
    <br>';


                        echo ' <label for="codiceSarta" >  codice sarta:</label>

  <select id="codiceSarta" style="transform: translateX(-40px);" name="codiceSarta" required >
  <option value=""> </option>';

                        try {
                            include  "../conn.php";



                            $sql = "SELECT * from sarta";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codiceSarta'] . '>' . $row['codiceSarta'] . ' nome: ' . $row['nomeSarta'] . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo "Errore nella query....<br/>";
                            echo $e->getMessage() . "<br/>";
                            die();
                        } finally {
                            $conn = null;
                        }


                        echo ' </select>';



                        echo '<br> <label for="codiceMaschera" >  codice maschera:</label>
 
  <select id="codiceMaschera" style="transform: translateX(-40px);" name="codiceMaschera" required>
  <option value=""> </option>';

                        try {
                            include  "../conn.php";



                            $sql = "SELECT * from maschera WHERE riparazione='no';";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['nMaschera'] . '>' . $row['nMaschera'] . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo "Errore nella query....<br/>";
                            echo $e->getMessage() . "<br/>";
                            die();
                        } finally {
                            $conn = null;
                        }


                        echo ' </select>';


                        echo ' <br><br>   <label for="dataI">data inizio riparazione:</label>
  ';

                        date_default_timezone_get();
                        $date = date('Y-m-d', time());

                        echo '<input type="date" required id="dataI" name="dataI" placeholder="data"

min="1920-01-01" max=' . $date . ' style="height: 25px;" >';

                        echo ' <br>   <label for="dataF">data fine riparazione:</label>
';

                        echo '<input type="date" id="dataF" name="dataF" placeholder="data"

min="1920-01-01"  style="height: 25px;">';

                        echo '<br><br>   <label for="note">note:</label>

<textArea required id="note" style="transform: translateX(75px);" placeholder="note" name="note" maxlength="150" required  rows="2" cols="30">
</textArea>
<div><input type="submit" value="registra" class="submit" id="registrazione" style=" transform: translateY(-10px); font-size:20px; height: 30px;"></div>
';



                        echo '</fieldset>
 </form> ';




                        echo '<form action="eliminaRiparazione.php" method="post" name="form" id="form" class="" style="height: 1100px; color:black; transform: translateY(430px);">
         
                
 <fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 290px; color:black;">';



                        echo '  <h1>elimina riparazione</h1>
<hr style="transform: translateY(15px); color:black; height:3px;">
<br>';


                        echo '<br> <label for="codiceMaschera" >  codice maschera:</label>
 
  <select id="codiceMaschera" style="transform: translateX(-40px);" name="codiceMaschera" >
  <option value=""> </option>';

                        try {
                            include  "../conn.php";



                            $sql = "SELECT * from maschera WHERE riparazione='si';";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['nMaschera'] . '>' . $row['nMaschera'] . '</option>';
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