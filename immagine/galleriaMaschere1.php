<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrazione Socio</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Galleria.css">
</head>

<body>
    <div class="container-fluid">
        <button class="buttonsocioG">
            <a href="aggiungiImmagine.php"> aggiungi </a></button>
        <button class="buttonsocioG">
            <a href="eliminaImmagine.php"> elimina </a></button>
        <div class="container" id=Galleria>
            <h3>GALLERIA FOTO</h3>
            <?php
            try {
                include "../conn.php";
                $sql = "SELECT * FROM galleria";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $totale = $stmt->rowCount();
                echo "<div class=row>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<br>';
                    echo '<div class="col-sm-4 project">
                            <img onclick=on("../uploads/'.$row['immagine'] .'") class="project__image" id="image" src="../uploads/' . $row['immagine'] . '" />
                            <div id="col-sm-4" >
                            numero maschera: ' . $row['nMaschera'] . '
                            </div>
                            </div>
                            ';
                }
                echo "</div>";
            } catch (PDOException $e) {
                echo "Errore nella query....<br/>";
                echo $e->getMessage() . "<br/>";
                die();
            } finally {
                $conn = null;
            }
            ?>
            <div id="overlay">
                <img alt="" id="overlay__inner">
                <button class="close" onclick=off()>chiudi X</button>
            </div>
        </div>
    </div>
    <script>
        function on(srcImage) {
            document.getElementById("overlay__inner").src=srcImage;
            overlay.style.display="block";
            
        }

        function off() {
            overlay.style.display="none";
        }
    </script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>