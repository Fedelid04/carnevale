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

    <title>report Eventi</title>
</head>

<body>
    <div class='flexContainer'>
        <section class='navbar'>
            <div class='home'><a>REPORT EVENTI</a></div>
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

                    $sql = "SELECT * FROM evento";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='" . $row['dataEvento'] . " " . $row['descrizione'] . "' class='opzione cliente " . $row['codiceEvento'] . "' href='reportEventi.php?";
                        echo "codiceEvento=";
                        echo $row['codiceEvento'];
                        echo "&&descrizione=" . $row['descrizione'] . "&&dataEvento=" . $row['dataEvento'] . "'>";
                        echo $row['dataEvento'] . ' ' . $row['descrizione'];
                        echo "</a>";

                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </div>




            <a class='reportino' href="reporteventi.php"><button class='bottone'>TORNA AL REPORT</button></a>
            <a class='logout' href="home.php"><button class='bottone'>HOME</button></a>


        </section>



        <section class='tabelleLog'>
            <section class="container">

                <?php
                include("../stampaCampi.php");

                try {
                    include "../conn.php";

                    if (isset($_GET['codiceEvento'])) {

                        $codiceEvento = $_GET['codiceEvento'];

                        $sql = "SELECT evento.codiceEvento, evento.descrizione, evento.dataEvento, evento.incassoEvento, evento.provinciaEvento, 
                    evento.comuneEvento, evento.cittaEvento
                    FROM evento
                    WHERE evento.codiceEvento = '$codiceEvento';";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        $totale = $stmt->rowCount();

                        if ($totale == 0) {
                            echo '<div class="spostamentoReport">';
                            echo "<div class='nomeSocieta'>report: informazioni evento </div>";
                            echo "<div class='nomeS' style='width: 320px;'> nessuna attività con" . $codiceEvento . " </div>";
                            echo '</div>';
                        } else {

                            $codiceEvento = $_GET['codiceEvento'];
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $descrizone = $_GET['descrizione'];
                            $dataEvento = $_GET['dataEvento'];



                            echo "<div class='nomeSocieta'>report: " . $descrizone . " (" . $codiceEvento . ")</div>";
                            echo '<div class="spostamentoReport">';
                            echo "<div class='nomeS' style='width: 300px;'>report: informazioni evento</div>";

                            echo "<div class='reportList'>";

                            creaTabella2($sql, $stmt, [0, 1, 2, 3, 4, 5, 6]);

                            echo "</div>";
                            echo "</div>";



                            $sql = "SELECT partecipazioneevento.codSocio, partecipazioneevento.dataEvento, partecipazioneevento.mascheraBase, partecipazioneevento.mascheraRecupero
                    FROM  partecipazioneevento
                    WHERE partecipazioneevento.codiceEvento = '$codiceEvento';";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            $totale = $stmt->rowCount();

                            if ($totale == 0) {
                                echo '<div class="spostamentoReport">';
                                echo "<div class='nomeT'>report: informazioni socio </div>";
                                echo "<div class='nomeT'> nessun Socio ha partecipato </div>";
                                echo '</div>';
                            } else {


                                echo '<div class="spostamentoReport">';
                                echo "<div class='nomeT'>report: informazioni socio </div>";
                                echo "<div class='reportListSocio'>";

                                creaTabella($sql, $stmt, [0, 1, 2, 3]);

                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    } else {
                        $sql = "SELECT socio.codSocio, socio.nome, socio.cognome, socio.nTessera, socio.carica, socio.anniPagati, socio.staff,
                     evento.codiceEvento, evento.descrizione, evento.dataEvento, evento.incassoEvento, evento.provinciaEvento, 
                    evento.comuneEvento, evento.cittaEvento
                    FROM socio NATURAL JOIN evento;
                    ";


                        $totale = $stmt->rowCount();
                        if ($totale == 0) {
                            echo "<div class='nomeSocieta' style='width:600px'> nessuna attività con i dati richiesti  </div>";
                        } else {

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            echo '<div class="spostamentoReport">';
                            echo "<div class='reportList'>";
                            creaTabella($sql, $stmt, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
                            echo "</div>";
                            echo "</div>";


                            echo "<div style='transform: translateY(610px)'>";
                            echo "<div class='nomeSocieta' style='background: darkgreen;
                    width: 200px;
                    position: relative;
                    left: 70%;
                    bottom: 10px;'>";
                            echo "<a href='download.php?scelta=4'>scarica file .xls <i class='bx bx-download'></i></a>";
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