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


    <title>report Maschere</title>
</head>

<body>
    <div class='flexContainer'>
        <section class='navbar'>
            <div class='home'><a>REPORT MASCHERE</a></div>
            <hr>
            </hr>
            <div class='ricerca'>
                <span class='clienti'>cerca:</span>
                <input type='text' name='searchBar' class='searchBar' id="textClienti">
                <div class="lente">
                    <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
                </div>
            </div>
            <div class='nuovoCliente' style="transform: translateX(66px);">
                <a href='gestioneRiparazioni.php'><button style=" position: relative; right:38%;">gestione riparazioni</button></a>
            </div>

            <!-- Scrittura procedurale clienti da database -->
            <div class='listaClienti'>
                <ul id='clientiElenco'>
                    <?php
                    include "../conn.php";

                    $sql = "SELECT * FROM maschera";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='" . $row['nMaschera'] . " " . $row['descrizione'] . " stato: " . $row['riparazione'] . "' class='opzione cliente " . $row['nMaschera'] . "' href='reportMaschere.php?";
                        echo "nMaschera=";
                        echo $row['nMaschera'];
                        echo "&&descrizione=" . $row['descrizione'] . "&&deposito=" . $row['deposito'] . "'>";
                        echo $row['nMaschera'] . ' ' . $row['descrizione'];
                        echo ' stato: ';
                        if ($row['riparazione'] == 'no') {
                            echo ' 🟢 ';
                        } else if ($row['riparazione'] == "si") {
                            echo ' 🔴 ';
                        } else {
                            echo ' 🟠 ';
                        }
                        echo "</a>";

                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </div>


            <a class='reportino' href="reportmaschere.php"><button class='bottone'>TORNA AL REPORT</button></a>
            <a class='logout' href="home.php"><button class='bottone'>HOME</button></a>

        </section>



        <section class='tabelleLog'>
            <section class="container">

                <?php
                include("../stampaCampi.php");

                try {
                    include  "../conn.php";

                    if (isset($_GET['nMaschera'])) {

                        $nMaschera = $_GET['nMaschera'];

                        $sql = "SELECT maschera.nMaschera, maschera.deposito, maschera.codiceSarta, maschera.riparazione, maschera.descrizione
                    FROM maschera
                    WHERE maschera.nMaschera = '$nMaschera';";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        $totale = $stmt->rowCount();

                        if ($totale == 0) {
                            echo '<div class="spostamentoReport">';
                            echo "<div class='nomeSocieta'>report: informazioni maschera </div>";
                            echo "<div class='nomeS' style='width: 320px;'> nessuna attività con" . $nMaschera . " </div>";
                            echo '</div>';
                        } else {

                            $deposito = $_GET['deposito'];
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $descrizone = $_GET['descrizione'];
                            $nMaschera = $_GET['nMaschera'];


                            $sql2 = "SELECT immagine FROM galleria WHERE nMaschera = '$nMaschera';";

                            $stmt2 = $conn->prepare($sql2);
                            $stmt2->execute();
                            $totale2 = $stmt2->rowCount();


                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {


                                $imm = $row2['immagine'];
                            }




                            echo "<div class='nomeSocieta'>report: " . $descrizone . " (" . $nMaschera . ")</div>";
                            echo '<div class="spostamentoReport">';
                            echo "<div class='nomeS' style='width: 300px;'>report: informazioni maschera</div>";

                            echo "<div class='reportList'>";

                            creaTabella2($sql, $stmt, [0, 1, 2, 3, 4]);

                            echo "</div>";
                            echo "</div>";




                            $sql = "SELECT deposito.deposito, deposito.citta, deposito.descrizione, deposito.costoMese
                    FROM deposito
                    WHERE deposito.deposito = '$deposito';";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            $totale = $stmt->rowCount();

                            if ($totale == 0) {
                                echo '<div class="spostamentoReport">';
                                echo "<div class='nomeT'>report: informazioni deposito </div>";
                                echo "<div class='nomeT'> nessun deposito </div>";
                                echo '</div>';
                            } else {


                                echo '<div class="spostamentoReport">';
                                echo "<div class='nomeT'>report: informazioni deposito </div>";
                                echo "<div class='reportListSocio' style='width: 400px;'>";

                                creaTabella($sql, $stmt, [0, 1, 2, 3]);

                                echo "</div>";
                                echo "</div>";
                            }



                            $sql = "SELECT figuranti.codSocio, figuranti.uscita, figuranti.mascheraBase, figuranti.mascheraRecupero
                    FROM figuranti
                    WHERE figuranti.mascheraBase = '$nMaschera' OR figuranti.mascheraRecupero='$nMaschera';";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            $totale = $stmt->rowCount();

                            if ($totale == 0) {
                                echo '<div class="spostamentoReport2">';
                                echo "<div class='nomeT'>report: informazioni figurante </div>";
                                echo "<div class='nomeT'> nessun figurante </div>";
                                echo '</div>';
                            } else {


                                echo '<div class="spostamentoReport">';
                                echo '<div style="transform: translateY(-590%);">';
                                echo "<div class='nomeT'>report: informazioni figurante </div>";

                                echo "<div class='reportListSocio' style='width: 500px;'>";

                                creaTabella($sql, $stmt, [0, 1, 2, 3]);

                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }

                            echo '<div style="transform: translateY(60%);">';
                            echo '<div style="transform: translateX(60%);">';
                            if ($totale2 == 0) {
                                echo '<div style="background: white; font-size:25px; border-radius:20px; width:300px; text-align:center;">nessuna immagine</div>';
                            } else {

                                echo "  <img src='uploads/" . $imm . "' style='height: 320px; width: 330px; border-radius:20px; '>";
                            }


                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        $sql = " SELECT maschera.nMaschera, maschera.deposito, maschera.descrizione, maschera.codiceSarta, maschera.riparazione
                    FROM maschera;
                    ";


                        $totale = $stmt->rowCount();
                        if ($totale == 0) {
                            echo "<div class='nomeSocieta' style='width:600px'> nessuna attività con i dati richiesti  </div>";
                        } else {

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            echo '<div class="spostamentoReport">';

                            echo "<div class='reportList' style='left: 11%; top:20px;'>";
                            creaTabella($sql, $stmt, [0, 1, 2, 3, 4]);

                            echo "</div>";

                            echo "</div>";

                            echo "<div style='transform: translateY(610px)'>";
                            echo "<div class='nomeSocieta' style='
                    transform: translateX(540px); background: darkgreen; width: 200px; position:absolute; top: -20px;'>";
                            echo "<a href='download.php?scelta=6'>scarica file .xls <i class='bx bx-download'></i></a>";
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