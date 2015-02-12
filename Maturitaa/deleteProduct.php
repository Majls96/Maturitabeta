<?php
session_start();

if (isset($_SESSION['cart'])) {
    echo$_SESSION['cart'];
    $_SESSION['cart'] = preg_replace("/".$_GET['id'].';/', "", $_SESSION['cart'],1);
   header('Location: index.php?page=cart');
    echo$_SESSION['cart'];
    
}
?>
