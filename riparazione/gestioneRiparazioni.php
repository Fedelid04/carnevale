<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php
        include 'navbarRiparazione.php';
    ?>
    <div class="container">
        <h1>DA RIPARARE</h1>
        <div class="table-responsive-sm" class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Colore</th>
                        <th scope="col">Riparazione</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../conn.php';
                    $sql = "SELECT * from maschera where eliminato = 'no'";
                    $stmt = $conn->query($sql);
                    foreach ($stmt as $row) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['codMaschera'] . '</th>';
                        echo '<td>' . $row['descrizione'] . '</td>';
                        echo '<td style="background-color:' . $row['colore'] . ';"></td>';
                        if ($row['riparazione'] === 'si') {
                            echo '<td style="background-color:lime;" ></td>';
                        } else {
                            echo '<td style="background-color:red;" ></td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <h1>IN CORSO DI RIPARAZIONE</h1>
        <div class="table-responsive-md" class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Maschera</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Inizio Riparazione</th>
                        <th scope="col">Note</th>
                        <th scope="col">Fine Riparazione</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../conn.php';
                    $sql = "SELECT * from riparazione join sarta using(codSarta)";
                    $stmt = $conn->query($sql);
                    foreach ($stmt as $row) {
                        echo '<tr>';
                        if (empty($row['fineRiparazione'])) {
                            echo '<th scope="row">' . $row['codMaschera'] . '</th>';
                            echo '<td>' . $row['nome'] . '</td>';
                            echo '<td> ' . $row['cognome'] . '</td>';
                            echo '<td> ' . $row['inizioRiparazione'] . '</td>';
                            echo '<td> ' . $row['note'] . "</td>";
                            echo '<td>';
                            echo '<form method="post" action="eliminaRiparazione.php">';
                            echo '<input type="hidden" name="codMaschera" value=' . $row['codMaschera'] . ">";
                            echo '<input type=submit value=FineRiparazione>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <form method="post" id="form" action="aggiungiRiparazione.php">
            <h1>Aggiungi Riparazione</h1>
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label>Maschera da riparare:</label>
                    <select name="MascheraRiparazione" class="form-control">
                        <?php
                        include '../conn.php';
                        $sql = "SELECT * from maschera where eliminato = 'no' and riparazione = 'si'";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=" . $row['codMaschera'] . ">" . $row['codMaschera'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <label>Sarto:</label>
                    <select name="SartaRiparazione" class="form-control" required>
                        <?php
                        include '../conn.php';
                        $sql = "SELECT * from sarta";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=".$row['codSarta'].">".$row['codSarta']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <label>Note:</label>
                    <input class="form-control" type="text" name="note" required>
                </div>
                <div class="form-group col-sm-2">
                    <br>
                    <label for=""></label>
                    <input class="form-control" type="submit" value="Ripara">
                </div>
            </div>
        </form>
        <?php
            if(isset($_GET['errore'])){
            $errore = $_GET['errore'];
            if($errore==1){
                echo '<script>alert("Maschera già in riparazione");</script>';
            }
            }
        ?>
    </div>
    <script>
        function Mostra(){
            document.getElementById('form').style.display="block";
        }
    </script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../boostrap-4.0.0-dist/js/boostrap.bundle.min.js"></script>
</body>

</html>