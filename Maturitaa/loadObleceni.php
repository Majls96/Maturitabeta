<?php
require 'dbconect.php';
$category = $_POST["category"];
$query = "SELECT ProductName, Price, product.ID AS productid FROM `product` JOIN Category AS c ON(c.ID=product.Category) WHERE c.Name='" . $category . "'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)):
    //print_r($row);
    ?>

    <div class="img">

        <a target="_blank" href="Cart.php">
            <img src="image/adida.jpg" alt="Klematis" width="110" height="90">
        </a>
        <div class="desc"><?php echo $row["ProductName"] ?></div>
        <div class="desc"><?php echo $row["Price"] . ' Kč' ?></div>

        <a href=<?php echo 'CartAdd.php?id=' . $row['productid'] ?> style="color: black">Pridat</a>
    </div>
    <?php
endwhile;
?>
