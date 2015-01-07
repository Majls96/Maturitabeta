<?php
session_start();



$db = mysqli_connect("localhost", "root", "", "mydb");
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$salt = "#$%^&*@#$%^&*";
$query = "SELECT ID AS id, Jmeno FROM uzivatel WHERE Email LIKE('" . $mail . "') AND Password LIKE('" . sha1($pass . $salt) . "') ";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_row($result);
if ($row !== NULL) {
    $_SESSION['user_id'] = $row[0];
    //echo $_SESSION['user_id'];
   header("Location: index.php");
} else {
    echo 'spatne jmeno nebo heslo';
}
//header("location: index.php");
?>
