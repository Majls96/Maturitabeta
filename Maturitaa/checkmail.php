<?php

$db = mysqli_connect("localhost", "root", "", "mydb");
$mail = $_GET["email"];
$query = mysqli_query($db, "SELECT Email FROM uzivatel WHERE Email LIKE('" . $mail . "')");
$row = mysqli_fetch_row($query);
$num = $query-> num_rows;
if (mysqli_num_rows($query) == 0 ) {
    
    echo json_encode(array('isTaken'=>false));
} else {
  echo json_encode(array('isTaken'=>true));
  
}
?>