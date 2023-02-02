<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/NAVBAR2.css">
    <title>Document</title>
</head>

<body>
    <?php
    include 'navbarSocio.php';
    ?>
    <?php
    include "../conn.php";
    $codSocio = $_POST['codiceSocio'];
    $sql = "SELECT * FROM socio where codSocio='$codSocio'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nome = $row['nome'];
        $cognome = $row['cognome'];
        $cf = $row['cf'];
        $telefono = $row['cell'];
        $staff = $row['staff'];
        $figurante = $row['figurante'];
        $citta = $row['citta'];
        $provincia = $row['provincia'];
        $indirizzo = $row['via'];
        $dataIscrizione = $row['dataIscrizione'];
        $codCarica = $row['codCarica'];
    }
    ?>
    <div class="container" id="FormUpdate">
        <h3 style="text-align: center;">Modifica Socio</h3>
        <form action="cambioSocio.php?codSocio=<?= $codSocio ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder=<?php echo $nome?>>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Cognome</label>
                    <input name="cognome" type="text" class="form-control" placeholder=<?php echo $cognome ?>>
                </div>
                <div class="form-group col-md-2">
                    <label for="">CF</label>
                    <input name="cf" type="text" class="form-control" placeholder=<?php echo $cf ?>>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Telefono</label>
                    <input name="cell" type="number" class="form-control" placeholder=<?php echo $telefono ?>>
                </div>
                <div class="form-group col-md-2">
                    <label for="staff">staff:</label>
                    <select class="form-control" id="staff" name="staff" required placeholder=<?php echo $staff ?>>
                        <option value="no">no</option>
                        <option value="si">si</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="figurante">figurante:</label>
                    <select class="form-control" id="figurante" name="figurante" required=<?php echo $figurante ?> required onchange=mask()>
                        <option value="no">no</option>
                        <option value="si">si</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">Città</label>
                    <input name="citta" type="text" class="form-control" placeholder=<?php echo $citta ?>>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Indirizzo</label>
                    <input name="indirizzo" type="text" class="form-control" placeholder=<?php echo $indirizzo ?>>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Provincia</label>
                    <input name="provincia" type="text" class="form-control" placeholder=<?php echo $provincia ?>>
                </div>
                <div class="form-group col-md-2">
                    <label for="dataIscrizione">data iscrizione:</label>

                    <?php

                    date_default_timezone_get();
                    $date = date('Y-m-d', time());

                    echo '<input type="date" id="dataIscrizione" name="dataIscrizione" placeholder="data di iscrizione"
                    min="1920-01-01" max=' . $date . '  class=form-control placeholder=' . $dataIscrizione . '>';
                    ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Carica</label>
                    <select name="carica" id="inputState" class="form-control" placeholder=<?php echo $codCarica ?>>
                        <?php
                        include "../conn.php";
                        $sql = "SELECT * FROM carica";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=$row[codCarica]>" . $row['tipoCarica'] . "</option>";
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
                            echo "<option>" . $row['codMaschera'] . "</option>";
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
    <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>