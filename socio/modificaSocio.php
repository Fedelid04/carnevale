<?php
  include "../controlloRuolo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/formStyle.css">
</head>

<body>
  <section class="home-section">

    <div class="home-content">
      <i class='bx bx-menu'></i>
      <div>
        <?php
        $codSocio = $_GET['codSocio'];
        $hostname = "localhost";
        $dbname = "carnevale";
        $user = "root";
        $pass = "";
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);

        ?>

        <?php

        $hostname = "localhost";
        $dbname = "carnevale";
        $user = "root";
        $pass = "";
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);


        try {


          $codSocio = $_GET['codSocio'];

          $sql = "SELECT * FROM socio WHERE codSocio='$codSocio'";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cd = $row['codSocio'];
            $no = $row['nome'];
            $co = $row['cognome'];
            $numCiv = $row['Civico'];

            $cf = $row['cf'];
            $indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ = $row['indirizzo'];

            $citta = $row['citta'];

            $provincia = $row['provincia'];

            $email = $row['email'];

            $cell = $row['cell'];

            $nTessera = $row['nTessera'];

            $carica = $row['carica'];

            $nMaschera = $row['nMaschera'];

            $dataIscrizione = $row['dataIscrizione'];

            $dataEvento = $row['dataEvento'];

            $annoPagato = $row['anniPagati'];

            $staff = $row['staff'];

            $note = $row['note'];
          }

          $sql = "SELECT * FROM sociminorenni
       WHERE codSocio ='$codSocio' LIMIT 1";

          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $totale = $stmt->rowCount();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $cf2 = $row['cf2Genitore2'];
          }

          $sql = "SELECT * FROM manichini
      WHERE codSocio = '$codSocio'  LIMIT 1";

          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $manichino = $stmt->rowCount();


          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $nMascheraM = $row['nMaschera'];

            $dataIscrizioneM = $row['dataIscrizione'];

            $dataEventoM = $row['dataPrimoEvento'];

            $noteM = $row['note'];
          }
        } catch (PDOException $e) {
          echo "Errore nella query....<br/>";
          echo $e->getMessage() . "<br/>";
          die();
        } finally {
          $conn = null;
        }



        ?>



        <div style=" height: 720px; ">

          <?php
          $codSocio = $_GET['codSocio'];

          echo '<form action="cambioSocio.php?codSocio=' . $codSocio . '"method="post">';
          ?>

          <fieldset class="fieldsetSocioRegistrazione" style="height: 630px; transform: translateX(80px); width: 1176px; position:relative; right:11.5%;">
            <?php
            if (isset($_GET['errore'])) {
              $errore = $_GET['errore'];

              if ($errore == 1) {
                echo "<br><div class='errore' style=' width: 1000px;'>codice socio già registrato </div><br>";
              } elseif ($errore == 2) {
                echo "<br><div class='errore' style=' width: 1000px;'>numero tessera già registrato </div><br>";
              } elseif ($errore == 3) {
                echo "<br><div class='errore' style=' width: 1000px;'>cf già registrato </div><br>";
              } elseif ($errore == 4) {
                echo "<br><div class='errore' style=' width: 1000px;'>email già registrata </div><br>";
              } elseif ($errore == 5) {
                echo "<br><div class='errore' style=' width: 1000px;'>numero cell. già registrato </div><br>";
              }
            }
            ?>

            <legend style=" font-weight: 400; color:black; background:white; width:490px;">credenziali socio nuove
            </legend>


            <?php
            if ($manichino == 1) {

            ?>

              <label for="maschera"> maschera:</label>

              <select id="maschera" name="maschera">

                <option value=" "> </option>
                <?php

                try {
                  echo ' <option value="" disabled selected>' . $nMascheraM . '</option>
 
<option value="nessuna"> nessuna </option>';

                  $hostname = "localhost";
                  $dbname = "carnevale";
                  $user = "root";
                  $pass = "";
                  $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);



                  $sql = "SELECT nMaschera FROM maschera WHERE riparazione='no' AND nMaschera NOT IN(SELECT nMaschera FROM socio WHERE nMaschera IS NOT NULL)  ";
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
              <?php
              echo '<label for="dataIscrizione" style="float: left; transform: translateX(70px);">data iscrizione:<br> (' . $dataIscrizioneM . ')</label>';



              date_default_timezone_get();
              $date = date('Y-m-d', time());

              echo '<input type="date" id="dataIscrizione" name="dataIscrizione" placeholder=' . $dataIscrizioneM . '
   
     min="1920-01-01" max=' . $date . ' style="transform: translateX(-25px);" >';

              ?>

              </select>


              <label for="dataEvento">data evento:</label>

              <select id="dataEvento" name="dataEvento">


                <?php

                try {

                  echo ' <option value="" disabled selected>' . $dataEventoM . '</option>
 
<option value="nessuna"> nessuna </option>';

                  $hostname = "localhost";
                  $dbname = "carnevale";
                  $user = "root";
                  $pass = "";
                  $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);



                  $sql = "SELECT dataEvento,descrizione FROM evento";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();


                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo ' <option value=' . $row['dataEvento'] . '>' . $row['dataEvento'] . ' nome: ' . $row['descrizione'] . '</option>';
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

              <label for="note">note:</label>
              <br>
              <br>

            <?php
              echo '
<textArea id="note" placeholder=' . $noteM . ' name="note" maxlength="150"  rows="4" cols="155">
</textArea>
  <br> 
  <br> ';

              /*echo' <div><input type="submit" value="cambia" class="submit" id="inviaEmail"
              style="position:relative; left:0px; top:36px;">
              </div>          
              <br>
              <div> <input type="reset" name="cancella" value="Annulla" style="position: relative;
              bottom: 42px;
              left: 41%;"> </div>';*/
            } else {

              echo '<input type="text" id="nome" placeholder="nome: ' . $no . '" name="nome" maxlength="50" >';
              echo ' <input type="text" id="cognome" placeholder="cognome: ' . $co . '" name="cognome" maxlength="50" >
            <input type="text" id="cf" placeholder="cf: ' . $cf . '" name="cf" minlength="16" >';
              /* echo '<div><input type="submit" value="cambia" class="submit" id="inviaEmail"
              style="position:relative; left:0px; top:430px;">
              </div>          
              <br>
              
              <div> <input type="reset" name="cancella" value="Annulla" style="position: relative;
              top: 352px;
              left: 37%;"> </div>';*/



              if ($totale == 1) {
                echo '  <input type="text" id="cf2" placeholder="cf2: ' . $cf2 . '" name="cf2" minlength="16" >';
              }




              echo '<input type="text" id="indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀" placeholder="indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀: ' . $indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ . '" name="indirizzo⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀" >
            <input type="text" id="numCiv" placeholder="num.Civ: ' . $numCiv . '" name="numCiv" maxlength="50" >           
            <input type="text" id="citta" placeholder= "città: ' . $citta . '" name="citta" >
          
            <input type="text" id="provincia" placeholder=" provincia: ' . $provincia . '" name="provincia" maxlength="50" >
            <input type="email" id="email" placeholder="email: ' . $email . '" name="email" maxlength="50" >
            <input type="text" id="cell" placeholder="cell: ' . $cell . '" name="cell" maxlength="13" >
 
            <input type="text" id="nTessera" placeholder=" numero tessera:' . $nTessera . ' (es 1,2,3 ecc..)" name="nTessera" maxlength="50" >
            ';
            ?>

              <br>
              <br>

              <label for="carica" style="float: left; transform: translateX(70px);">carica:</label>

              <select id="carica" name="carica">


                <option value=" "> </option>
                <?php
                echo ' <option value="" disabled selected>' . $carica . '</option>';
                try {
                  $hostname = "localhost";
                  $dbname = "carnevale";
                  $user = "root";
                  $pass = "";
                  $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
                  $sql = "SELECT carica FROM cariche";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();


                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo ' <option value=' . $row['carica'] . '>' . $row['carica'] . '</option>';
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
              <label for="maschera"> maschera:</label>

              <select id="maschera" name="maschera">

                <option value=" "> </option>
                <?php

                try {
                  echo ' <option value="" disabled selected>' . $nMaschera . '</option>
 
<option value="nessuna"> nessuna </option>';

                  $hostname = "localhost";
                  $dbname = "carnevale";
                  $user = "root";
                  $pass = "";
                  $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);



                  $sql = "SELECT nMaschera FROM maschera WHERE riparazione='no' AND nMaschera NOT IN(SELECT nMaschera FROM socio WHERE nMaschera IS NOT NULL)  ";
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
              <?php
              echo '<label for="dataIscrizione" style="float: left; transform: translateX(70px);">data iscrizione:<br> (' . $dataIscrizione . ')</label>';



              date_default_timezone_get();
              $date = date('Y-m-d', time());

              echo '<input type="date" id="dataIscrizione" name="dataIscrizione" placeholder=' . $dataIscrizione . '
   
     min="1920-01-01" max=' . $date . ' style="transform: translateX(-25px);" >';

              ?>

              </select>


              <label for="dataEvento">data evento:</label>

              <select id="dataEvento" name="dataEvento">


                <option value=" "> </option>
                <?php

                try {

                  echo ' <option value="" disabled selected>' . $dataEvento . '</option>
 
<option value="nessuna"> nessuna </option>';

                  $hostname = "localhost";
                  $dbname = "carnevale";
                  $user = "root";
                  $pass = "";
                  $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);



                  $sql = "SELECT dataEvento,descrizione FROM evento";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();


                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo ' <option value=' . $row['dataEvento'] . '>' . $row['dataEvento'] . ' nome: ' . $row['descrizione'] . '</option>';
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


              <label for="annoPagato" style="float: left; transform: translateX(70px);">ultimo anno pagato:</label>

              <?php

              date_default_timezone_get();
              $date = date('Y', time());

              echo '<input type="number" style="transform: translateX(-80px);"  name="annoPagato" id="annoPagato" placeholder=' . $annoPagato . ' name="annopagato" maxlength="50"  max=' . $date . ' >';

              ?>


              <label for="staff">staff:</label>

              <select id="staff" name="staff" style=" transform: translateX(-20px);">

                <option value=" "> </option>
                <?php
                echo '<option value="" disabled selected>' . $staff . '</option>';
                ?>
                <option value="si"> si </option>
                <option value="no"> no </option>
              </select>

              <br>
              <br>
              <label for="note">note:</label>
              <br>
              <br>

            <?php
              echo '
<textArea id="note" placeholder=' . $note . ' name="note" maxlength="150"  rows="4" cols="155">
</textArea>
  <br> 
  <br>   ';
            }



            if ($manichino == 1) {
              echo ' <div><input type="submit" value="cambia" class="submit" id="inviaEmail"
           style="position:relative; left:0px; top:36px;">
         </div>          
         <br>
         
         <div> <input type="reset" name="cancella" value="Annulla" style="position: relative;
         bottom: 42px;
         left: 41%;"> </div>';
            } else {

              echo '<div><input type="submit" value="cambia" class="submit" id="inviaEmail"
          style="position:relative; left:0px; top:0px;">
        </div>          
        <br>
        
        <div> <input type="reset" name="cancella" value="Annulla" style="position: relative;
        bottom: 71px;
        left: 41%;"> </div>';
              if ($totale == 1) {
                echo '<div><input type="submit" value="cambia" class="submit" id="inviaEmail"
          style="position:relative; left:0px; top:14px;">
        </div>          
        <br>
        
        <div> <input type="reset" name="cancella" value="Annulla" style="position: relative;
        bottom: 92px;
        left: 41%;"> </div>';
              }
            }
            ?>
          </fieldset>
          </form>
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