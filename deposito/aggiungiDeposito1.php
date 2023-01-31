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
        <h3 style="text-align: center;">AGGIUNGI DEPOSITO</h3>
        <form action="registerDeposito.php" method="post" name="form" id="form" class="">
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label for="codiceDeposito">codice deposito:</label>
                    <input class="form-control" type="text" id="codiceDeposito" placeholder="codice deposito (es DEP1,DEP2 ecc..)" name="codiceDeposito" maxlength="50" required>
                </div>
                <div class="form-group col-sm-2">
                    <label for="citta">citta deposito:</label>
                    <input type="text" id="citta" placeholder="citta" name="citta" maxlength="50" required class="form-control">
                </div>
                <div class="form-group col-sm-2">
                    <label for="citta">costo deposito (mensile):</label>
                    <input class="form-control" type="number" id="costo" placeholder="costo mensile" name="costo" maxlength="50" required>

                </div>
                <div class="form-group col-md-2">
                    <?php
                    date_default_timezone_get();
                    $date = date('Y-m-d', time());
                    ?>
                    <label>Data inizio noleggio</label>

                    <input class="form-control" type="date" required id="dataIniziale" name="dataIniziale" placeholder="data" min="1920-01-01" <?php echo 'max=' . $date . '' ?> required>


                </div>
                <div class="form-group col-md-2">
                    <label for="dataF">data fine noleggio:</label>
                    <input class="form-control" type="date" id="dataFinale" name="dataFinale" placeholder="data" min="1920-01-01">
                </div>
                <div class="form-group col-md-2">
                    <label for="descrizione"> descrizione:</label> <br>
                    <textArea id="descrizione" placeholder="descrizione" name="descrizione"  required rows="1" class="form-control">
                    </textArea>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-2 offset-md-2">
                    <label>‎</label>
                    <input class="form-control" type="reset" name="cancella" value="Annulla">
                </div>
                <div class="form-group col-md-2 offset-md-1">
                    <label for="">‎</label>
                    <input type="submit" value="registra" class="form-control" id="registrazione">
                </div>
            </div>

            <div class="container-fluid" style="text-align:center">
                <script>
                    let arrow = document.querySelectorAll(".arrow");
                    for (var i = 0; i < arrow.length; i++) {
                        arrow[i].addEventListener("click", (e) => {
                            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                            arrowParent.classList.toggle("showMenu");
                        });
                    }
                    let sidebar = document.querySelector(".sidebar");
                    let sidebarBtn = document.querySelector(".bx-menu");
                    console.log(sidebarBtn);
                    sidebarBtn.addEventListener("click", () => {
                        sidebar.classList.toggle("close");
                    });
                </script>

</body>

</html>