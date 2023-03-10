<html lang="en">

<head>
    <title>Elimina Socio</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/NAVBAR2.css">
</head>

<body>
    <?php
    include 'navbarSocio.php';
    ?>
    <div class="container" id="FormElimina">
        <form action="eliminaSocio.php" method="post">
            <div class="form-group col-md-6 auto">
                <h1>Elimina Socio</h1>
                <label for="inputState">Codice Socio</label>
                <select name="codiceSocio" class="form-control">
                    <?php
                    include "../conn.php";
                    $sql = "SELECT * FROM socio where eliminato='no'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option>" . $row['codSocio'] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Elimina" class="form-control" id="registrazione">
            </div>
    </div>
    </form>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>