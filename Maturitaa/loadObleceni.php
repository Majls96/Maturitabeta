<?php
$db = mysqli_connect("localhost", "root", "", "mydb");
$category = $_POST["category"];
$query = "SELECT * FROM `product` WHERE Category='" . $category . "'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)):
    ?>
    <div class="img">

        <a target="_blank" href="klematis_big.htm">
            <img src="image/adida.jpg" alt="Klematis" width="110" height="90">
        </a>
        <div class="desc"><?php echo $row["Name"] ?></div>
        <div class="desc"><?php echo $row["Price"].' Kč' ?></div>
    </div>
    <?php
endwhile;
?>
