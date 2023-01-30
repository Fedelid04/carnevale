<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/formStyle.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar close">

    <div class="logo-details">
      <i class='bx bx-mask'>
        <h6 style="color: white; font-size: x-small; position: relative; bottom: 32px;">HOME</h6>
      </i>
      <span class="logo_name">
        carnevale

      </span>


    </div>

    <ul class="nav-links">

      <li>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">sezione soci</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-street-view'></i>
            <span class="link_name">sezione soci</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione soci</a></li>
          <li><a href="registraSocio.php">registrazione socio</a></li>
          <li><a href="impostazioniSocio.php">modifica socio</a></li>
          <li><a href="SocioElimina.php">elimina socio</a></li>
          <li><a href="reportSocio.php">report socio</a></li>

        </ul>
      </li>


      <br>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-group'></i>
            <span class="link_name">sezione figuranti</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione figuranti</a></li>
          <li><a href="gestioneFiguranti.php">aggiungi figurante </a></li>
          <li><a href="impostazioniFigurante.php">modifica figurante</a></li>
          <li><a href="figuranteElimina.php">elimina figurante</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-line-chart'></i>
            <span class="link_name">sezione report</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione report</a></li>
          <li><a href="reportSocio.php">report soci </a></li>
          <li><a href="reportTessere.php">report tessere</a></li>
          <li><a href="reportCariche.php">report cariche </a></li>
          <li><a href="reportMaschere.php">report maschere</a></li>
          <li><a href="reportEventi.php">report eventi </a></li>
          <li><a href="reportDepositi.php">report depositi</a></li>

        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-id-card'></i>
            <span class="link_name">sezione tessere</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione tessera</a></li>
          <li><a href="reporttessere.php">report tessera</a></li>
          <li><a href="aggiungitessera.php">aggiungi tessera</a></li>
          <li><a href="tesseraelimina.php">elimina tessera</a></li>
          <li><a href="gestionepagamenti.php">gestione pagamento tessera</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-face-mask'></i>
            <span class="link_name">sezione maschere</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione maschere</a></li>
          <li><a href="reportMaschere.php">report maschere</a></li>
          <li><a href="aggiungiMaschera.php">aggiungi maschera</a></li>
          <li><a href="mascheraElimina.php">elimina maschera</a></li>
          <li><a href="gestioneRiparazioni.php">gestione riparazione maschera</a></li>
          <li><a href="aggiungiSarta.php">aggiungi sarta</a></li>
          <li><a href="SartaElimina.php">elimina sarta</a></li>
          <li><a href="impostazioniMaschera.php">modifica maschera</a></li>
          <li><a href="aggiungiImmagine.php">aggiungi immagine</a></li>
          <li><a href="galleriaMaschere.php">galleria maschere</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-briefcase-alt'></i>
            <span class="link_name">sezione cariche</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione cariche</a></li>
          <li><a href="reportCariche.php">report cariche</a></li>
          <li><a href="aggiungiCarica.php">aggiungi carica</a></li>
          <li><a href="CaricaElimina.php">elimina carica</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-calendar-event'></i>
            <span class="link_name">sezione eventi</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione eventi</a></li>
          <li><a href="reportEventi.php">report eventi</a></li>
          <li><a href="aggiungiEvento.php">aggiungi evento</a></li>
          <li><a href="aggiungiPartecipazione.php">aggiungi partecipazione evento</a></li>
          <li><a href="tabellaGenerale.php">gestione eventi</a></li>
          <li><a href="EventoElimina.php">elimina evento</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-building-house'></i>
            <span class="link_name">sezione depositi</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione depositi</a></li>
          <li><a href="reportDepositi.php">report depositi</a></li>
          <li><a href="aggiungiDeposito.php">aggiungi deposito</a></li>
          <li><a href="DepositoElimina.php">elimina deposito</a></li>
        </ul>
      </li>


      </li>

      <li>

      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <span class="text">
        <h3 style="width: 600px; font-family:serif; font-size:40px;">DIREZIONE CARNEVALE</h3>
      </span>
      <button class="buttonsocioG" style="position: relative; left: 67.5%; top:20px;">
        <a href="galleriaMaschere.php"> Galleria <i class='bx bxs-file-image'></i> </a></button>


      <div style="transform: translateY(410px);">
        <form method="post" name="form" id="form" class=""
          style="height: 500px; color:black; transform: translateY(300px);">

          <fieldset class="fieldsetGalleria">

            <legend style=" font-weight: 500; color:black; background:white; width:400px;"> ANTEPRIMA FOTO
            </legend>

            <section id="portfolio">


              <?php

              try {
                $hostname = "localhost";
                $dbname = "carnevale";
                $user = "root";
                $pass = "";
                $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);



                $sql = "SELECT * FROM galleria";
                $stmt = $conn->prepare($sql);
                $stmt->execute();


                $totale = $stmt->rowCount();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<br>';
                  echo '<div class="project" style="height:180px;">
    <img class="project__image" src="uploads/' . $row['immagine'] . '" />
    <div class="grid__overlay" >
     numero maschera: ' . $row['nMaschera'] . '
    </div>
  </div>';

                }

              } catch (PDOException $e) {
                echo "Errore nella query....<br/>";
                echo $e->getMessage() . "<br/>";
                die();
              } finally {
                $conn = null;
              }

              ?>


              <div class="overlay">
                <div class="overlay__inner">
                  <button class="close">chiudi X</button>
                  <img>
                </div>
              </div>
            </section>
          </fieldset>

        </form>
        <div class="" style="transform: translateX(-75px);
    width: 597px;
    height: 620px;">

          <fieldset style=" width: 200px;
    height: 488px;
    box-shadow: 1px 3px 20px 3px#b4b5bb;
    background-color: rgba(123, 127, 144, 0.336);
    position: relative;
    bottom: 258.5px;
    right: -105%;">
            <legend style=" font-weight: 500; color:black; background:white; width:200px;"> REPORT</legend>
            <div style="height:510px; border-radius:40px;">

              <button class="report" style="position:relative; margin:7%; bottom:15px;"><a href="reporteventi.php">
                  Eventi </a></button>
              <button class="report" style="position:relative; margin:7%; bottom:15px;"><a href="reportTessere.php">
                  Tessere </a></button>
              <button class="report" style="position:relative; margin:7%; bottom:15px;"><a href="reportSocio.php"> Socio
                </a></button>
              <button class="report" style="position:relative; margin:7%; bottom:15px; right:9%;"><a
                  href="reportMaschere.php"> Maschere </a></button>
              <button class="report" style="position:relative; margin:7%; bottom:15px; right:4%;"><a
                  href="reportDepositi.php"> Depositi </a></button>
              <button class="report" style="position:relative; margin:7%; bottom:15px;right:3%"><a
                  href="reportCariche.php"> Cariche </a> </button>


            </div>
            <div>
          </fieldset>
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