<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/formStyle2.css">

    <link href="./bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include './navBar.html';
    ?>

    <div class="container" id="anteprima">
        <h3>ANTEPRIMA FOTO </h3>
        <?php
        try {
            include "conn.php";
            $sql = "SELECT * FROM galleria";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $totale = $stmt->rowCount();
            echo "<div class=row>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<br>';
                echo '<div class="col-sm-4">
                            <img class="project__image" src="uploads/' . $row['immagine'] . '" />
                            <div id="col-sm-4" >
                            numero maschera: ' . $row['nMaschera'] . '
                            </div>
                            </div>';
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
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>