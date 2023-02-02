<?php
    if(isset($_POST['codMaschera'])){
    include '../conn.php';
    $sql = "UPDATE maschera set riparazione = 'si' where codMaschera like '$_POST[codMaschera]'";
    $conn->query($sql);
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/NAVBAR2.css">
    <link rel="stylesheet" href="../css/navBar.css">
    <title>Document</title>
</head>

<body>
    <?php
    include 'navbarRiparazione.php';
    ?>
    <div class="container" id="FormUpdate">
        <h1 style="text-align: center;">SEGNALAZIONE MASCHERA ROTTA</h1>
        <form action="updateRiparazione.php" method="post" name="form" style="text-align:center">
            <br>
            <div class="form-row">
                <div class="form-group col-sm-4 offset-4">
                    <label for="maschere">Codice Maschera:</label>
                    <select id="maschera" name="codMaschera" class="form-control">
                        <?php
                        try {
                            include "../conn.php";
                            $sql = "SELECT codMaschera , descrizione FROM maschera where riparazione ='no'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codMaschera'] . '>' . $row['codMaschera'].' '.$row['descrizione'].'</option>';
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
                    <input type="submit" value="Segnala" class="form-control" id="registrazione">
                </div>
            </div>
        </form>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>