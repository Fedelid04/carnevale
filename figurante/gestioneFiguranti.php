<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/formStyle.css">
</head>

<body>

  <section class="home-section">

    <div class="home-content">
      <i class='bx bx-menu'></i>



      <div style="transform: translateX(90px);">
        <form action="registerFigurante1.php" method="post" name="form" id="form" class="" style="transform: translateY(320px); width:1200px;">
          <?php
          /*echo '<a href="impostazioniFigurante.php" style="
border-radius: 20px;
padding: 0 10px;
min-width: 10vw;
min-height: 4.5vh;
background-color: rgba(28, 206, 250, 0);
color: black;
border: 4px solid black;
transition: .4s;
text-decoration: none;
font-size: 1.3em;
font-weight: 400;
text-transform: uppercase;
transform: translateX(370px);
transition: background-color .4s, color .4s;
letter-spacing: 2px;
curser: pointer;
">IMPOSTAZIONI FIGURANTE</a>';*/
          ?>
          <fieldset class="fieldsetSocioRegistrazione" style="width: 1120px;transform: translateX(-155px);
    position: relative;
    bottom: 45px;">

            <?php
            if (isset($_GET['errore'])) {
              $errore = $_GET['errore'];

              if ($errore == 1) {
                echo "<br><div class='errore' style=' width: 600px;'>figurante già registrato </div><br>";
              } elseif ($errore == 2) {
                echo "<br><div class='errore' style=' width: 600px;'>maschera di recupero occupata </div><br>";
              }
            }
            ?>
            <h1>AGGIUNGI FIGURANTE</h1>
            <hr style="transform: translateY(15px); color:white; height:3px;">
            <br>

            <label for="codSocio">codice socio:</label>

            <select id="codSocio" name="codSocio" required style="transform: translateX(10px);">

              <?php

              try {
                include "../conn.php";



                $sql = "SELECT codSocio FROM socio WHERE figurante='no'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo ' <option value=' . $row['codSocio'] . '>' . $row['codSocio'] . '</option>';
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
            <br>
            <br>

            <label for="recupero">maschera secondaria:</label>

            <select id="recupero" name="recupero">

              <?php

              try {
                include "../conn.php";

                $sql = "SELECT nMaschera FROM maschera WHERE riparazione='no' AND  nMaschera NOT IN(SELECT mascheraRecupero FROM figuranti); ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo ' <option value=' . $row['nMaschera'] . '>' . $row['nMaschera'] . '</option>';
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

            <br>
            <br>

            <label for="uscita">uscita:</label>

            <select id="uscita" name="uscita" required style="transform: translateX(38px);">
              <option value="si"> si </option>
              <option value="no"> no </option>
            </select>
            <br>
            <br>

            <label for="uscitaEsterna">uscita esterna:</label>

            <select id="uscitaEsterna" name="uscitaEsterna" required style="transform: translateX(0px);">
              <option value="si"> si </option>
              <option value="no"> no </option>
            </select>
            <br>
            <br>
            <div><input style="margin-bottom:5px; left:0%; bottom:0px;" type="submit" value="registra" class='submit' id="registrazione">
              <br>
              <input type="reset" name="cancella" value="Annulla">
            </div>

          </fieldset>

        </form>

      </div>
    </div>





    </div>
  </section>
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