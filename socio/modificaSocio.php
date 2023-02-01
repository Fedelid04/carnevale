<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/navBar.css">
    <title>Document</title>
</head>

<body>
    <?php
    $codSocio = $_POST['codiceSocio'];
    ?>
    <div class="container" id="FormUpdate">
        <h3 style="text-align: center;">Modifica Socio</h3>
        <form action="cambioSocio.php?codSocio=<?=$codSocio?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Cognome</label>
                    <input name="cognome" type="text" class="form-control" placeholder="Cognome">
                </div>
                <div class="form-group col-md-2">
                    <label for="">CF</label>
                    <input name="cf" type="text" class="form-control" placeholder="Codice Fiscale">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Telefono</label>
                    <input name="cell" type="number" class="form-control" placeholder="Telefono">
                </div>
                <div class="form-group col-md-2">
                    <label for="staff">staff:</label>
                    <select class="form-control" id="staff" name="staff" required>
                    <option value="no">no</option>    
                    <option value="si">si</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="figurante">figurante:</label>
                    <select class="form-control" id="figurante" name="figurante" required onchange=mask()>
                        <option value="no">no</option>
                        <option value="si">si</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">Città</label>
                    <input name="citta" type="text" class="form-control" placeholder="Arezzo">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Indirizzo</label>
                    <input name="indirizzo" type="text" class="form-control" placeholder="Indirizzo">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Provincia</label>
                    <input name="provincia" type="text" class="form-control" placeholder="Arezzo">
                </div>
                <div class="form-group col-md-2">
                    <label for="dataIscrizione">data iscrizione:</label>

                    <?php

                    date_default_timezone_get();
                    $date = date('Y-m-d', time());

                    echo '<input type="date" id="dataIscrizione" name="dataIscrizione" placeholder="data di iscrizione"
                    min="1920-01-01" max=' . $date . '  class=form-control>';
                    ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="dataEvento">Data evento:</label>
                    <select id="dataEvento" name="dataEvento" class="form-control">
                        <option value='nessuna'>nessuna</option>
                        <?php
                        try {
                            include "../conn.php";
                            $sql = "SELECT * FROM evento";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codEvento'] . '>' . $row['dataEvento'] . ' nome: ' . $row['descrizione'] . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo "Errore nella query....<br/>";
                            echo $e->getMessage() . "<br/>";
                            die();
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Carica</label>
                    <select name="carica" id="inputState" class="form-control">
                        <?php
                        include "../conn.php";
                        $sql = "SELECT * FROM carica";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option>" . $row['tipoCarica'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2" style="display:none;" id="SceltaMaschera">
                    <label for="inputState">Maschera</label>
                    <select name="maschera" id="inputState" class="form-control">
                        <?php
                        include "../conn.php";
                        $sql = "SELECT codMaschera FROM maschera WHERE riparazione='no' AND codMaschera NOT IN(SELECT codMaschera FROM figurante WHERE codMaschera IS NOT NULL)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option>" . $row['nMaschera'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <br>
                    <label for=""></label>
                    <input class="form-control" type="reset" name="cancella" value="Annulla">
                </div>
                <div class="form-group col-md-2">
                    <br>
                    <label for=""></label>
                    <input type="submit" value="Modifica" class="form-control" id="Modifica">
                </div>
            </div>
        </form>
    </div>
    <script>
        function mask() {
            if (document.getElementById("figurante").value == "si") {
                document.getElementById("SceltaMaschera").style.display = "block";
            }
            if (document.getElementById("figurante").value == "no") {
                document.getElementById("SceltaMaschera").style.display = "none";
            }
        }
    </script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>