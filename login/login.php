<?php
session_start();
include '../conn.php';
if (isset($_POST['usr']) && isset($_POST['pwd'])) { //controlla se l'utente ha fatto il login
    $_SESSION['usr'] = $_POST['usr'];
    $_SESSION['pwd'] = $_POST['pwd'];
    try{
        $sql = "SELECT * from login where codSocio LIKE '".$_SESSION['usr']."'
        AND PASSWORD like '".hash('sha256', $_SESSION['pwd'])."';"; //query per selezionare l'utente
        $stmt = $conn->query($sql);
        foreach ($stmt as $row) {
            $usr = $row['codSocio'];
            $pwd = $row['PASSWORD'];            
        }
    } catch (Exception $e){
        echo $e->getMessage();
    }
    if(isset($usr)){   //se la query ha trovato l'utente reindirizzo l'utente verso home.php
        header('location: ../home.php');
    }else { //se la query non ha trovato l'utente messaggio di errore
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
    </head>
    <body>
        <!--Form login-->
        <form action="login.php" method="POST">
            <label>Inserire Codice Socio:</label>
            <input type="text" name="usr" required>
            <label>Password:</label>
            <input type="password" name="pwd" required>
            <input type="submit" value="Login">            
        </form>
    </body>
</html>