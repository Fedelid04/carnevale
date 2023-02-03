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
    include 'navbarTessera.php';
    ?>
    <div class="container" id="FormUpdate">
        <form action="nuovaTessera.php" method="post">
            <h1>INSERISCI NUOVA TESSERA</h1>
            <div class="form-row">
                <div class="form-group col-md-2 mx-auto">
                    <label for="">codice Tessera:</label>
                    <input type="text" name="codTessera" class="form-control" placeholder="numtessera">
                </div>
                <div class="form-group col-md-2 mx-auto">
                    <br>
                    <input class="form-control" type="submit" value="Segnala">
                </div>
            </div>
        </form>
        <?php
        if (isset($_GET['errore'])) {
            $errore = $_GET['errore'];
            if ($errore == 1) {
                echo '<script>alert("Tessera già registrata")</script>';
            }
        }
        ?>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>