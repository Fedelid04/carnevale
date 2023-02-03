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

     <title>report Socio</title>
 </head>

 <body>
     <div class='flexContainer'>
         <section class='navbar'>
             <div class='home'><a class=''>REPORT SOCIO</a></div>
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

                        $sql = "SELECT * FROM socio";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='" . $row['nome'] . " " . $row['cognome'] . " " . $row['codSocio'] . "' class='opzione cliente " . $row['codSocio'] . "' href='reportSocio.php?";
                            echo "codSocio=";
                            echo $row['codSocio'];
                            echo "&&nome=" . $row['nome'] . "&&cognome=" . $row['cognome'] . "'>";
                            echo $row['nome'] . ' ' . $row['cognome'] . ' ' . $row['codSocio'];

                            echo "</a></li>";
                        }
                        ?>
                 </ul>
             </div>

             <a class='reportino' href="reportsocio.php"><button class='bottone'>TORNA AL REPORT</button></a>
             <a class='logout' href="home.php"><button class='bottone'>HOME</button></a>

         </section>

         <?php


            try {
                include  "../conn.php";

                if (isset($_GET['codSocio'])) {

                    $codSocio = $_GET['codSocio'];

                    $sql = "SELECT *
        FROM socio
        WHERE socio.codSocio = '$codSocio';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $carica = $row['codCarica'];
                        $nMaschera = $row['codMaschera'];
                        $staff = $row['staff'];
                        $figurante = $row['figurante'];
                    }

                    $totale = $stmt->rowCount();
                    if ($totale == 0) {
                        echo "<div class='contatto'> nessuna attività con" . $codSocio . " </div>";
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





         <section class='tabelleLog'>
             <section class="container">

                 <?php
                    include("../stampaCampi.php");

                    try {
                        include  "../conn.php";

                        if (isset($_GET['codSocio'])) {

                            $codSocio = $_GET['codSocio'];
                            $sql = "SELECT socio.cf, socio.indirizzo, socio.civico,
                    socio.citta, socio.provincia, socio.email, socio.cell, socio.nTessera, socio.carica, 
                    socio.nMaschera, socio.dataIscrizione, socio.dataEvento, socio.anniPagati, socio.staff,
                    socio.note, socio.figurante
                    FROM socio
                    WHERE socio.codSocio = '$codSocio';";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            $totale = $stmt->rowCount();
                            if ($totale == 0) {
                                echo "<div class='contatto'> nessuna attività con" . $codSocio . " </div>";
                            } else {
                                $codSocio = $_GET['codSocio'];
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $nome = $_GET['nome'];

                                $cognome = $_GET['cognome'];
                                if ($figurante == "si") {
                                    $fig = "<mark style=' background: lightgreen; border-radius:20px; '>figurante: si </mark>";
                                } else {
                                    $fig = "<mark style=' background: indianred; border-radius:20px; '>figurante: no </mark>";
                                }

                                if ($staff == "si") {
                                    $sta = "<mark style=' background: lightgreen; border-radius:20px; '>staff: si </mark>";
                                } else {
                                    $sta = "<mark style=' background: indianred; border-radius:20px; '>staff: no </mark>";
                                }

                                echo "<div class='nomeSocieta'> " . $nome . " " . $cognome . " (" . $codSocio . ")</div>";
                                echo "
                    <div class='infoSocio'> carica: " . $carica . "<br> numero di Maschera:
                    " . $nMaschera . "<br>" . $sta . "  " . $fig . "<br> ultimo anno pagato: " . $annoPagato . "</div>
                   ";



                                echo '<div class="spostamentoReport">';
                                echo "<div class='nomeS'> informazioni socio</div>";

                                echo "<div class='reportList'>";

                                creaTabella2($sql, $stmt, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]);

                                echo "</div>";
                                echo "</div>";



                                $sql = "SELECT tessera.codSocio, tessera.attivita, tessera.tipo, tessera.nTessera
                    FROM tessera
                    WHERE tessera.codSocio = '$codSocio';";

                                $stmt = $conn->prepare($sql);
                                $stmt->execute();

                                $totale = $stmt->rowCount();

                                if ($totale == 0) {
                                    echo "<div class='contatto'> nessuna tessera" . $codSocio . " </div>";
                                } else {


                                    echo '<div class="spostamentoReport">';
                                    echo "<div class='nomeT'> informazioni tessera </div>";
                                    echo "<div class='reportListTessera'>";

                                    creaTabella($sql, $stmt, [0, 1, 2, 3]);

                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                        } else {
                            $sql = "SELECT socio.codSocio, socio.nome, socio.cognome, socio.cf, socio.indirizzo, socio.civico,
                    socio.citta, socio.provincia, socio.email, socio.cell, socio.nTessera, socio.carica, 
                    socio.nMaschera, socio.dataIscrizione, socio.dataEvento, socio.anniPagati, socio.staff,
                    socio.note, tessera.nTessera, tessera.attivita
                    FROM tessera NATURAL JOIN socio;
                    ";


                            $totale = $stmt->rowCount();
                            if ($totale == 0) {
                                echo "<div class='nomeSocieta' style='width:600px'> nessuna attività con i dati richiesti  </div>";
                            } else {

                                $stmt = $conn->prepare($sql);
                                $stmt->execute();


                                echo '<div class="spostamentoReport">';
                                echo "<div class='reportList'>
                    ";

                                creaTabella($sql, $stmt, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]);
                                echo "</div>";
                                echo "</div>";







                                echo "<div style='transform: translateY(610px)'>";
                                echo "<div class='nomeSocieta' style='background: darkgreen;
                    width: 200px;
                    position: relative;
                    left: 70%;
                    bottom: 10px;'>";
                                echo "<a href='download.php?scelta=1'>scarica file .xls <i class='bx bx-download'></i></a>";
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

 </body>

 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

 </html>