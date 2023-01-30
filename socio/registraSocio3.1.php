<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrazione Socio</title>
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
    <div class="container">
        <h3 style="text-align: center;">REGISTRAZIONE</h3>
        <form action="register3.php" method="post" name="form">
            <div class="form-row">
                <div class="form-group col-md-2 mx-auto">
                    <label for="tipologiaSocio">tipo socio:
                    </label>
                    <select id="tipologiaSocio" name="tipologiaSocio" class="form-control" onchange="location=this.value">
                        <option value="" default></option>
                        <option value="registraSocio.php">adulto</option>
                        <option value="registraSocio2.php">minorenne</option>
                        <option value="registraSocio3.1.php">manichino</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 offset-md-2 ">
                    <label for="codiceSocio">codice manichino:</label>
                    <br>

                    <input type="text" id="codiceSocio " class="form-control" placeholder="codice manichino (es. MC1, MC2 ecc..)" name="codiceSocio" minlength="3" required>

                </div>
                <div class="form-group col-md-3 offset-md-2">
                    <label for="">Num tessera</label>
                    <input name="nTessera" type="number" id="nTessera" placeholder="num tessera (es 1,2,3 ecc..)" name="nTessera" maxlength="50" class="form-control" required>
                </div>





            </div>
            <div class="form-row">


                <div class="form-group col-md-2 offset-md-3">
                    <label for="inputState">Num maschera</label>
                    <select name="maschera" id="inputState" class="form-control">
                        <option value='nessuna'> nessuna</option>
                        <?php
                        include "../conn.php";
                        $sql = "SELECT nMaschera FROM maschera WHERE riparazione='no' AND nMaschera NOT IN(SELECT nMaschera FROM socio WHERE nMaschera IS NOT NULL)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option>" . $row['nMaschera'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-2 offset-md-2">
                    <label for="dataIscrizione">data iscrizione:</label>

                    <?php

                    date_default_timezone_get();
                    $date = date('Y-m-d', time());

                    echo '<input type="date" id="dataIscrizione" name="dataIscrizione" placeholder="data di iscrizione"
          min="1920-01-01" max=' . $date . ' required class=form-control>';
                    ?>
                </div>
            </div>

            <div class="form-row">


                <div class="form-group col-md-2 offset-md-3">

                    <label for="dataEvento"> primo evento:</label>
                    <select id="dataEvento" name="dataEvento" class="form-control">
                        <option value='nessuna'>nessuna</option>
                        <?php

                        try {
                            include "../conn.php";
                            $sql = "SELECT dataEvento,descrizione,codiceEvento FROM evento";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codiceEvento'] . '>' . $row['dataEvento'] . ' nome: ' . $row['descrizione'] . '</option>';
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

                <div class="form-group col-md-2 offset-md-2">
                    <label for="note">note:</label>
                    <textArea class="form-control" id="note" name="note" required rows="1">
                    </textArea>
                </div>
            </div>

            <div class="form_row">
                <div class="form-group col-md-2 mx-auto">
                    <br>
                    <label></label>
                    <input class="form-control" type="reset" name="cancella" value="Annulla">
                </div>
                <div class="form-group col-md-2 mx-auto">

                    <label></label>
                    <input type="submit" value="registra" class="form-control" id="registrazione">
                </div>
            </div>
        </form>
    </div>

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


    <script src="//code.jquery.com/jquery.js"></script>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>



</body>

</html>