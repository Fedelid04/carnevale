<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/formStyle2.css">

    <link href="./bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container" id="anteprima">
        <h3>ANTEPRIMA FOTO </h3>
        <?php
        try {
            include  "conn.php";
            $sql = "SELECT * FROM galleria";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $totale = $stmt->rowCount();
            echo "<div class=row>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<br>';
                echo '<div class="col-sm-4">
                            <img class="project__image" src="uploads/' . $row['immagine'] . '" />
                            <div id="col-sm-4" >
                            numero maschera: ' . $row['nMaschera'] . '
                            </div>
                            </div>';
            }
            echo "</div>";
        } catch (PDOException $e) {
            echo "Errore nella query....<br/>";
            echo $e->getMessage() . "<br/>";
            die();
        } finally {
            $conn = null;
        }

        ?>
    </div>
    <div class="sidebarclose" id="sidebar">
        <div class="logo-details">
            <i class='bx bx-mask'>
                <h6 style="color: white; font-size: x-small; position: relative; bottom: 32px;">HOME</h6>
            </i>
        </div>
        <div class="sidebarclose">
            <div class="container-fluid" style="position: relative; right: 15px; top: 50px">
                <div class="row">
                    <div class="auto bg-dark ">
                        <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi-bootstrap fs-1"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <h5 style="text-align: center;">Sezione soci</h5>
                                <!--<a class="dropdown-item" href="#">sezione soci</a>-->
                                <a class="dropdown-item" href="./socio/registraSocio.php">registrazione socio</a>
                                <a class="dropdown-item" href="./socio/impostazioniSocio.php">modifica socio</a>
                                <a class="dropdown-item" href="./socio/SocioElimina.php">elimina socio</a>
                                <a class="dropdown-item" href="./socio/reportSocio.php">report socio</a>

                            </div>
                            <br>
                            <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto
                            text-center align-items-center">
                                <li class="nav-item">

                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <h5 style="text-align: center;">Sezione figuranti</h5>
                                        <!--<a class="dropdown-item" href="#">sezione figuranti</a>-->
                                        <a class="dropdown-item" href="./figurante/gestioneFiguranti1.php">aggiungi figurante</a>
                                        <a class="dropdown-item" href="./figurante/impostazioniFigurante.php">modifica figurante</a>
                                        <a class="dropdown-item" href="./figurante/figuranteElimina.php">elimina figurante</a>
                                    </div>




                                </li>
                                <br>
                                <li>
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bi bi-person"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z" />
                                        </svg>

                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <h5 style="text-align: center;">Sezione Report</h5>
                                        <a class="dropdown-item" href="./socio/reportSocio.php">report soci </a>
                                        <a class="dropdown-item" href="./tessera/reportTessere.php">report tessere</a>
                                        <a class="dropdown-item" href="./carica/reportCariche.php">report cariche </a>
                                        <a class="dropdown-item" href="./maschera/reportMaschere.php">report maschere</a>
                                        <a class="dropdown-item" href="./evento/reportEventi.php">report eventi </a>
                                        <a class="dropdown-item" href="./deposito/reportDepositi.php">report depositi</a>
                                    </div>
                                </li>
                                <br>
                                <li>
                                    <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bi-table fs-1"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <h5 style="text-align: center;">Sezione tessera</h5>
                                        <a class="dropdown-item" href="./tessera/reporttessere.php">report tessera</a>
                                        <a class="dropdown-item" href="./tessera/aggiungitessera.php">aggiungi tessera</a>
                                        <a class="dropdown-item" href="./tessera/tesseraelimina.php">elimina tessera</a>
                                        <a class="dropdown-item" href="./pagamento/gestionepagamenti.php">gestione pagamento
                                            tessera</a>
                                    </div>
                                </li>
                                <br>

                                <li><a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <i class="bi-heart fs-1"></i>
                                        <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 512 512" xml:space="preserve">
                                            <style type="text/css">
                                                <![CDATA[
                                                .st0 {
                                                    fill: #000000;
                                                }
                                                ]]>
                                            </style>
                                            <g>
                                                <path class="st0" d="M485.016,220.691c12.422-8.422,22.188-57.266,7.797-87.016c-26.859,28.125-80.109,49.859-142,72.922
                                                                c-64.656,24.078-71.531,41.859-94.813,42.172c-23.297-0.313-30.156-18.094-94.813-42.172c-61.891-23.063-115.141-44.797-142-72.922
                                                                c-14.406,29.75-4.625,78.594,7.781,87.016C13.484,214.332,0,210.051,0,210.051s3.813,68.172,33.25,106.563
                                                                c24.953,32.547,86.984,72.906,145.828,58.828c62.219-14.875,62.344-41.406,76.922-41.266c14.563-0.141,14.688,26.391,76.906,41.266
                                                                c58.844,14.078,120.875-26.281,145.844-58.828C508.156,278.223,512,210.051,512,210.051S498.5,214.332,485.016,220.691z
                                                                M131.438,318.848c-25.109-11.641-46.063-37.422-43.188-73.891c12.813,5.078,48.844,9.406,69.094,17.281
                                                                c23,8.953,46.031,23.984,48.922,41.25C205.313,317.879,170.75,337.066,131.438,318.848z M380.563,318.848
                                                                c-39.344,18.219-73.875-0.969-74.828-15.359c2.891-17.266,25.891-32.297,48.922-41.25c20.25-7.875,56.281-12.203,69.094-17.281
                                                                C426.625,281.426,405.656,307.207,380.563,318.848z" />
                                            </g>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <h5 style="text-align: center;">Sezione maschere</h5>
                                        <a class="dropdown-item" href="./maschera/reportMaschere.php">report maschere</a>
                                        <a class="dropdown-item" href="./maschera/aggiungiMaschera.php">aggiungi maschera</a>
                                        <a class="dropdown-item" href="./maschera/mascheraElimina.php">elimina maschera</a>
                                        <a class="dropdown-item" href="./riparazione/gestioneRiparazioni.php">gestione riparazione
                                            maschera</a>
                                        <a class="dropdown-item" href="./sarta/aggiungiSarta.php">aggiungi sarta</a>
                                        <a class="dropdown-item" href="./sarta/SartaElimina.php">elimina sarta</a>
                                        <a class="dropdown-item" href="./maschera/impostazioniMaschera.php">modifica maschera</a>
                                        <a class="dropdown-item" href="./immagine/aggiungiImmagine.php">aggiungi immagine</a>
                                        <a class="dropdown-item" href="./immagine/galleriaMaschere.php">galleria maschere</a>
                                    </div>
                                </li>

                                <br>
                                <li><a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bi-people fs-1"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <h5 style="text-align: center;">Sezione eventi</h5>
                                        <a class="dropdown-item" href="./evento/reportEventi.php">report eventi</a>
                                        <a class="dropdown-item" href="./evento/aggiungiEvento.php">aggiungi evento</a>
                                        <a class="dropdown-item" href="./partecipazione/aggiungiPartecipazione.php">aggiungi partecipazione evento</a>
                                        <a class="dropdown-item" href="tabellaGenerale.php">gestione eventi</a>
                                        <a class="dropdown-item" href="./evento/EventoElimina.php">elimina evento</a>

                                    </div>
                                </li>
                                <br>
                                <li>
                                    <!--  <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip"
                                    data-bs-placement="right" data-bs-original-title="Calendar">-->
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                                <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                                <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                            </svg>

                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <h5 style="text-align: center;">Sezione depositi</h5>
                                            <a class="dropdown-item" href="./deposito/reportDepositi.php">report depositi</a>
                                            <a class="dropdown-item" href="./deposito/aggiungiDeposito1.php">aggiungi deposito</a>
                                            <a class="dropdown-item" href="./deposito/DepositoElimina.php">elimina deposito</a>
                                        </div>



                                    </div>
                                </li>
                                <br>
                                <li>
                                    <button>
                                        <a href="./immagine/galleriaMaschere.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                            </svg>
                                        </a>
                                    </button>

                                </li>
                            </ul>

                        </div>

                    </div>
                    <script src="//code.jquery.com/jquery.js"></script>
                    <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>