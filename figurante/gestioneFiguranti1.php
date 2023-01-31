<?php
  include "../controlloRuolo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrazione Socio</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formStyle2.css">
</head>

<body>
    <div class="container-fluid">
        <a href="../home.php" class="btn btn-info" role="button">Home</a>
    </div>
    <div class="container">
        <h3 style="text-align: center;">AGGIUNGI FIGURANTE</h3>
        <form action="registerFigurante1.php" method="post" name="form" id="form" class="">
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label for="codSocio">codice socio:</label>
                    <select id="codSocio" name="codSocio" class="form-control" required>

                        <?php

                        try {
                            include "../conn.php";



                            $sql = "SELECT codSocio FROM socio WHERE figurante='no'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codSocio'] . '>' . $row['codSocio'] . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo "Errore nella query....<br/>";
                            echo $e->getMessage() . "<br/>";
                            die();
                        } finally {
                            $conn = null;
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <label for="recupero">maschera secondaria:</label>

                    <select class="form-control" name="recupero">

                        <?php

                        try {
                            include "../conn.php";

                            $sql = "SELECT nMaschera FROM maschera WHERE riparazione='no' AND  nMaschera NOT IN(SELECT mascheraRecupero FROM figuranti); ";
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

                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <label for="uscita">uscita:</label>
                    <select class="form-control" id="uscita" name="uscita" required>
                        <option value="si"> si </option>
                        <option value="no"> no </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="uscitaEsterna">uscita esterna:</label>
                    <select class="form-control" id="uscitaEsterna" name="uscitaEsterna" required>
                        <option value="si"> si </option>
                        <option value="no"> no </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                <label>‎</label>
                    <input class="form-control" type="reset" name="cancella" value="Annulla">
                </div>
                <div class="form-group col-md-2">
                    <label for="">‎</label>
                    <input type="submit" value="registra" class="form-control" id="registrazione">
                </div>
                <div class="container-fluid" style="text-align:center">
                <?php
                if (isset($_GET['errore'])) {
                    $errore = $_GET['errore'];

                    if ($errore == 1) {
                        echo "<br><div class='errore'>figurante già registrato </div><br>";
                    } elseif ($errore == 2) {
                        echo "<br><div class='errore'>maschera di recupero occupata </div><br>";
                    }
                }
                ?>
                </div>
                <script src="//code.jquery.com/jquery.js"></script>
                <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
                
</body>

</html>