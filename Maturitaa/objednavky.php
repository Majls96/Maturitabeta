<div class="objednavky">
<?php
require 'dbconect.php';

$query = "SELECT * FROM `order` WHERE `Uzivatel_ID`='" . $_SESSION["user_id"] . "'";
$result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)):
        //print_r($row);
        if ($row["stav"] == 0) {
            echo 'Zpracovava se';
        } else {
            echo 'Objednavka je zpracovana';
        }
        ?>
        <div class="desc"><?php echo $row["Adress"] ?></div>

        <?php
    endwhile;

?>
</div>