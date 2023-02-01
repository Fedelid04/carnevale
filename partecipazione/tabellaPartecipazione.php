
<?php

$data = $_POST['dataEvento'];
echo $data;

if (isset($_POST['submit'])) { //to run PHP script on submit

    // Loop to store and display values of individual checked checkbox.
    foreach ($_POST['check[]'] as $selected) {
        echo $selected . "</br>";
    }
}

return $selected;









?>