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

    <title>gestione immagini maschere</title>
</head>

<body>
    <div class='flexContainer'>
        <section class='navbar'>
            <div class='home'><a class='opzione' href="eliminaImmagine.php"> GALLERIA MASCHERE</a></div>
            <hr>
            </hr>
            <div class='ricerca'>
                <span class='clienti'>lista maschere <br> con immagine</span>
                <input type='text' name='searchBar' class='searchBar' id="textClienti">
                <div class="lente">
                    <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
                </div>
            </div>
            <div class='nuovoCliente'>
                <a href='galleriaMaschere.php'><button>galleria</button></a>
            </div>
            <!-- Scrittura procedurale clienti da database -->
            <div class='listaClienti'>
                <ul id='clientiElenco'>
                    <?php
                    include "../conn.php";

                    $sql = "SELECT * FROM galleria";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><ion-icon name='arrow-forward-outline'></ion-icon><a id='" . $row['nMaschera'] . "' class='opzione cliente " . $row['nMaschera'] . "' href='eliminaImmagine.php?";
                        echo "nMaschera=";
                        echo $row['nMaschera'];
                        echo "&&immagine=" . $row['immagine'] . "'>";
                        echo 'numero maschera: ';
                        echo $row['nMaschera'];
                        echo "</a>";

                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div style=" transform: translateY(20px);">
                <ul class="sub-menu">

                    <a style="font-size:30px; color:white;" href="reportMaschere.php">
                        <i class='fas fa-arrow-alt-circle-left' style='font-size:48px; transform: translateX(133px);'></i></a>

                    <a style="font-size:30px; color:white;" href="reportEventi.php">
                        <i class='fas fa-arrow-alt-circle-right' style='font-size:48px; transform: translateX(163px);'></i></a>
                </ul>
            </div>



            <a class='logout' href="home.php"><button class='bottone'>HOME</button></a>

        </section>



        <section class='tabelleLog'>
            <section class="container">

                <?php
                include("stampaCampi.php");
                if (!(isset($_GET['nMaschera']))) {

                    try {
                        include "../conn.php";

                        if (isset($_GET['codiceCarica'])) {

                            $codiceCarica = $_GET['codiceCarica'];
                            $sql = "SELECT cariche.carica, cariche.codiceCarica
            FROM cariche
            WHERE cariche.codiceCarica = '$codiceCarica';";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            $totale = $stmt->rowCount();
                            if ($totale == 0) {
                                echo "<div class='contatto'> nessuna attività con" . $codiceCarica . " </div>";
                            } else {
                                $codiceCarica = $_GET['codiceCarica'];
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $carica = $_GET['carica'];



                                echo "<div class='nomeSocieta'>report: " . $carica . " (" . $codiceCarica . ")</div>";
                                echo '<div class="spostamentoReport">';
                                echo "<div class='nomeS'>report: informazioni carica</div>";

                                echo "<div class='reportList'>";

                                creaTabella($sql, $stmt, [0, 1]);

                                echo "</div>";
                                echo "</div>";



                                $sql = "SELECT socio.nome, socio.cognome, socio.codiceSocio, socio.numeroTessera
            FROM socio
            WHERE socio.carica = '$carica';";

                                $stmt = $conn->prepare($sql);
                                $stmt->execute();

                                $totale = $stmt->rowCount();

                                if ($totale == 0) {
                                    echo '<div class="spostamentoReport">';
                                    echo "<div class='nomeT'>report: informazioni socio </div>";
                                    echo "<div class='nomeT' style='width: 420px'> nessun socio con carica " . $carica . " </div>";
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


                            echo '<form action="eliminaImm.php"
method="post"
enctype="multipart/form-data"  name="form" id="form" class="" style=" transform: translateY(50px); height: 1530px; color:black; z-index: 100; position:absolute;">

<fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 1515px; color:black;  transform: translateX(20px);">';



                            if (isset($_GET['error'])) {
                                echo "<br><div class='errore' style=' width: 1000px;'>" . $_GET['error'] . " </div><br>";
                            }




                            echo '  <h1>elimina immagine</h1>
<hr style="transform: translateY(15px); color:black; height:3px;">
<br> <br>';


                            echo ' <br><label for="nMaschera" >  numero maschera:</label>

<select id="nMaschera" style="transform: translateX(-40px);" name="nMaschera" required >
';

                            try {
                                include "../conn.php";



                                $sql = "SELECT * from galleria";
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




                            echo ' 
  <br><br><div><input type="submit" value="elimina " name="submit" class="submit" id="registrazione" style=" transform: translateY(-10px); font-size:20px; height: 30px;"> </div>

';


                            echo '  
<a style="color:deepskyblue; font-size:25px; background:white; border-radius:5px;" href="aggiungiImmagine.php">registra</a>  ';



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
                } else {

                    echo '<form action="#"
method="post"
enctype="multipart/form-data"  name="form" id="form" class="" style=" transform: translateY(0px); height: 1530px; color:black; z-index: 100; position:absolute;">

<fieldset class="fieldsetSocioRegistrazione" style="width: 1050px; height: 1515px; color:black;  transform: translateX(20px);">';

                    try {
                        include "../conn.php";

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


                            $nMaschera = $_GET['nMaschera'];

                            echo '<div style="transform: translateY(-70px);">';
                            echo '<div class="spostamentoReport">';
                            echo "<div class='nomeS' style='width: 400px;'>immagine maschera: numero " . $nMaschera . "</div>";


                            $sql = "SELECT immagine FROM galleria WHERE nMaschera = '$nMaschera';";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                echo ' <br><br><br> <div class="alb">';


                                echo '<img src="uploads/' . $row['immagine'] . '">';
                                echo "</div>";
                            }

                            echo "</div>";

                            echo "</div>";
                        }
                    } catch (PDOException $e) {
                        echo "Errore nella query....<br/>";
                        echo $e->getMessage() . "<br/>";
                        die();
                    } finally {
                        $conn = null;
                    }




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
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>