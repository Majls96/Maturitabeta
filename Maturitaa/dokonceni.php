<?php

session_start();

if (isset($_POST["adresa"]) && isset($_POST["mesto"]) && isset($_POST["psc"])) {

    $db = mysqli_connect("localhost", "root", "", "mydb");

    $adresa = $_POST["adresa"];
    $mesto = $_POST["mesto"];
    $psc = $_POST["psc"];

    $err = 0;

    if (strlen($adresa) != 0) {
        
    } else {
        $err++;
    }
    if (strlen($mesto) != 0) {
        
    } else {
        $err++;
    }
    if (intval($psc) != 0) {
        
    } else {
        $err++;
    }

    if ($err == 0) {

        $result = mysqli_query($db, "UPDATE `uzivatel` SET `Adress`='" . $adresa . "',`City`='" . $mesto . "',`PSC`='" . $psc . "' WHERE ID='" . $_SESSION['user_id'] . "' ");
        if ($result === true) {
            header("Location: index.php");
        }
    }
}
?>
