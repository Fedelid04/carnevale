<?php
session_start();
include '../conn.php';
if (isset($_POST['usr']) && isset($_POST['pwd'])) { //controlla se l'utente ha fatto il login
    $_SESSION['usr'] = $_POST['usr'];
    $sql = "SELECT * FROM tessera where codSocio='$_SESSION[usr]' and attiva like 'si'";
    $stmt = $conn->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['tessera'] = $row['codTessera'];
    }
    $_SESSION['pwd'] = $_POST['pwd'];
    $user = $_SESSION['usr'];
    $pass = $_SESSION['pwd'];
    $pass = hash('sha256', $pass);
    try {
        $sql = "SELECT * from login where codSocio LIKE '" . $user . "'
        AND psw like '$pass';"; //query per selezionare l'utente
        $stmt = $conn->query($sql);
        foreach ($stmt as $row) {
            $usr = $row['codSocio'];
            $pwd = $row['psw'];
        }
        $sql = "SELECT * FROM carica join socio using (codCarica) where socio.codSocio like '$_POST[usr]'"; //query per ottenere il ruolo dell'utente
        $stmt = $conn->query($sql);
        foreach ($stmt as $row) {
            $_SESSION['tipoCarica'] = $row['codCarica'];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    if (isset($usr)) { //se la query ha trovato l'utente reindirizzo l'utente verso home.php
        header('location: ../home.php');
    } else { //se la query non ha trovato l'utente messaggio di errore
        echo '<script>alert("Errore nel login")</script>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/loginStyle.css">
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">

</head>

<body>
    <!--Form login-->
    <div class="container">
        <h3 style="text-align: center;">LOGIN</h3>
        <form action="login.php" method="POST" id="FormLogin">
            <div class="form-row">
                <div class="form-group col-sm-6 mx-auto">
                    <label>Inserire Codice Socio:</label>
                    <input class="form-control" type="text" name="usr" required>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-sm-6 mx-auto">
                    <label>Password:</label>
                    <input class="form-control" type="password" name="pwd" required>
                    <br>
                    <input class="form-control" type="submit" value="Login">
                </div>
            </div>
        </form>
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>