<?php

if (isset($_POST["adresa"]) && isset($_POST["mesto"]) && isset($_POST["psc"])) {
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
        echo '<br>';
        echo $adresa;
        echo '<br>';
        echo $mesto;
        echo '<br>';
        echo $psc;
        echo '<br>';

        $query = "INSERT INTO `mydb`.`order` (`ID`, `Adress`, `City`, `PSC`, `Uzivatel_ID`) VALUES ('NULL', '" . $adresa . "', '" . $mesto . "', '" . $psc . "', '" . $_SESSION['user_id'] . "'); ";
        //   echo $query;
        mysqli_query($db, $query);
        $cart = $_SESSION['cart'];

        //  printf('ID cart je %d:', mysqli_insert_id($db));
        $orderId = mysqli_insert_id($db);
        $pieces = explode(";", $cart);
        //echo $pieces[0];
        unset($pieces[count($pieces) - 1]);
        $kc = 'Kc';
        $sum = 0;
        foreach ($pieces as $id) {

            $query = "INSERT INTO `mydb`.`product_in_order` (`ID`, `Order_ID`, `Product_ID`) VALUES (NULL, '" . $orderId . "', '" . $id . "');";

            mysqli_query($db, $query);
        }
    }
}
?>
