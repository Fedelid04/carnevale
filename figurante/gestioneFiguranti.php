<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrazione Socio</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navBar.css">
    
</head>

<body>
    <?php
    include 'navbarFigurante.php';
    ?>
    <div class="container" id="FormRegistra">
        <?php
        if (isset($_GET['errore'])) {
            $errore = $_GET['errore'];
            if ($errore == 1) {
                echo '<script>alert("Figurante già registrato")</script>';
            }
        }
        ?>
        <h1 style="text-align: center;">AGGIUNGI FIGURANTE</h1>
        <form action="registerFigurante.php" method="post" name="form" id="form" class="">
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label for="codSocio">codice socio:</label>
                    <select id="codSocio" name="codSocio" class="form-control" required>
                        <?php
                        try {
                            include "../conn.php";
                            $sql = "SELECT codSocio FROM socio where figurante='si' and eliminato='no'";
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

                <div class="form-group col-md-2" id="SceltaMaschera">
                    <label for="">Scegli Maschera:</label>
                    <select id="mascheraFigurante" name="mascheraFigurante" required class="form-control">
                        <?php
                        include '../conn.php';
                        $sql = "SELECT * from maschera;";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['codMaschera'] . '">' . $row['codMaschera'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-2" id="SceltaMaschera">
                    <label for="">Maschera Riserva:</label>
                    <select id="mascheraFigurante" name="mascheraRiserva" required class="form-control">
                        <?php
                        include '../conn.php';
                        $sql = "SELECT * from maschera;";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['codMaschera'] . '">' . $row['codMaschera'] . '</option>';
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
                </div>
                <script src="//code.jquery.com/jquery.js"></script>
                <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>

</body>

</html>