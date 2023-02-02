<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="navbar" class="banner-alto">
        <section class="top-nav">
            <div class="btn-group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <h5 style="text-align: center;">Sezione soci</h5>
                    <a class="dropdown-item" href="../socio/reportSocio.php">report socio</a>
                    <a class="dropdown-item" href="../socio/registraSocio.php">registrazione socio</a>
                    <a class="dropdown-item" href="../socio/impostazioniSocio.php">modifica socio</a>
                    <a class="dropdown-item" href="../socio/SocioElimina.php">elimina socio</a>
                </div>
            </div>
            <div class="btn-group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <h5 style="text-align: center;">Sezione figuranti</h5>
                    <a class="dropdown-item" href="../figurante/gestioneFiguranti.php">aggiungi figurante</a>
                    <a class="dropdown-item" href="../figurante/impostazioniFigurante.php">modifica figurante</a>
                    <a class="dropdown-item" href="../figurante/figuranteElimina.php">elimina figurante</a>
                </div>
                </li>
            </div>
            <div class="btn-group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z" />
                    </svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <h5 style="text-align: center;">Sezione Report</h5>
                    <a class="dropdown-item" href="../socio/reportSocio.php">report soci </a>
                    <a class="dropdown-item" href="reportTessere.php">report tessere</a>
                    <a class="dropdown-item" href="../carica/reportCariche.php">report cariche </a>
                    <a class="dropdown-item" href="../maschera/reportMaschere.php">report maschere</a>
                    <a class="dropdown-item" href="../evento/reportEventi.php">report eventi </a>
                    <a class="dropdown-item" href="../deposito/reportDepositi.php">report depositi</a>
                </div>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                    </svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <h5 style="text-align: center;">Sezione tessera</h5>
                    <a class="dropdown-item" href="reporttessere.php">report tessera</a>
                    <a class="dropdown-item" href="segnalazioneTessera.php">segnalazione Perdita Tessera</a>
                    <a class="dropdown-item" href="../pagamento/gestionepagamenti.php">gestione pagamento tessera</a>
                </div>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a class="dropdown-item" href="../maschera/reportMaschere.php">report maschere</a>
                    <a class="dropdown-item" href="segnalazione.php">Segnalazione riparazione</a>
                    <?php
                    if ($_SESSION['tipoCarica'] != "generica") {
                        echo '<a class="dropdown-item" href="./maschera/aggiungiMaschera.php">aggiungi maschera</a>
                                            <a class="dropdown-item" href="../maschera/mascheraElimina.php">elimina maschera</a>
                                            <a class="dropdown-item" href="../gestioneRiparazioni.php">gestione riparazione
                                            maschera</a>
                                            <a class="dropdown-item" href="../sarta/aggiungiSarta.php">aggiungi sarta</a>
                                            <a class="dropdown-item" href="../sarta/SartaElimina.php">elimina sarta</a>
                                            <a class="dropdown-item" href="../maschera/impostazioniMaschera.php">modifica maschera</a>
                                            <a class="dropdown-item" href="../immagine/aggiungiImmagine.php">aggiungi immagine</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3-event" viewBox="0 0 16 16">
                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                        <path d="M12 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <h5 style="text-align: center;">Sezione eventi</h5>
                    <a class="dropdown-item" href="./evento/reportEventi.php">report eventi</a>
                    <?php
                    if ($_SESSION['tipoCarica'] != "generica") {
                        echo '<a class="dropdown-item" href="./evento/aggiungiEvento.php">aggiungi evento</a>
                                        <a class="dropdown-item" href="../partecipazione/aggiungiPartecipazione.php">aggiungi partecipazione evento</a>
                                        <a class="dropdown-item" href="../tabellaGenerale.php">gestione eventi</a>
                                        <a class="dropdown-item" href="../evento/EventoElimina.php">elimina evento</a>';
                    }
                    ?>
                </div>
            </div>
        </section> 
        <div class="btn-group">
            <a href="../home.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg>
            </a>
        </div>
    </section>
</body>

</html>