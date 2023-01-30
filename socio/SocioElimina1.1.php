<html lang="en">

<head>
    <title>Elimina Socio</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/formStyle2.css">
</head>

<body>
    <div class="container-fluid">
        <a href="../home.php" class="btn btn-info" role="button">Link Button</a>
    </div>
    <div class="container" id="FormElimina">
        <h1>Elimina Socio</h1>
        <form action="eliminaSocio.php" method="post">
            <label for="inputState">Elimina</label>
            <select name="codiceSocio" class="form-control">
                <?php
                include "../conn.php";
                $sql = "SELECT  * FROM socio";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>" . $row['codSocio'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Elimina" class="form-control" id="registrazione">
    </div>
    
    </form>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>