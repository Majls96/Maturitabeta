
<?php
//session_start();
if (!isset($_SESSION['user_id'])) {
    echo '<br>Pro dokonceni ojednavky se prosim registrujte nebo prihlaste <a href="index.php?page=profile">ZDE</a>';
} else {
    //echo 'jste prihlasen';
}
?>

<div class="cart">

    <?php
    $cart = $_SESSION['cart'];
    require 'dbconect.php';
    $pieces = explode(";", $cart);
    //echo $pieces[0];
    unset($pieces[count($pieces) - 1]);
    $kc = ' Kc';
    $sum = 0;
    foreach ($pieces as $id) {
        $query = "SELECT * FROM `product` WHERE ID ='" . $id . "'";
        $result = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($result);
        //   echo $data['ID'];
        echo ' ';
        echo $data['ProductName'];
        echo ' ';
        //echo $data['Category'];
        echo ' ';
        echo $data['Price'];
        echo ' Kc';
        echo ' ';
        echo '<a href="deleteProduct.php?id=' . $data['ID'] . '"><img src="image/delete.gif"/></a>';


        echo '<br>';
        $sum = $sum + $data['Price'];
    }echo 'Finalni cena' . $sum . $kc;
    ?>
<?php if (isset($_SESSION['user_id'])) { ?>
        <form method="post" action="index.php?page=objednavka">

            <p class="submit"><input class="subbutt" type="submit" name="" value="Odeslat"></p>

        </form>
    <?php
    }
        ?>

        <a href="index.php?page=objednavky">Objednavky</a>
</div>


