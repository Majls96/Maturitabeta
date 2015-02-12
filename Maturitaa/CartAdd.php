<?php

session_start();

$cart = $_GET['id'];
$_SESSION['cart'] = $_SESSION['cart'] . $cart . ';';
//echo $_SESSION['cart'];
header('Location:index.php?page=cart')
?>