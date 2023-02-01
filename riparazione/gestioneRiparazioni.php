<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="table-responsive-md" <div class="row">
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
                            echo '<td style="background-color:lime;"></td>';
                        } else {
                            echo '<td style="background-color:red;"></td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../boostrap-4.0.0-dist/js/boostrap.bundle.min.js"></script>
</body>

</html>