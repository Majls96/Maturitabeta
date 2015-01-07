<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/navigation.js"></script>
     
      
       
    </head>

    <body>
               <form action="" method="POST">
            Name:  <br/><input id="name"  type="text" name="name"/><br/>
            Category:<br/><input id="jmeno"  type="text" name="category"/><br/>
            Price: <br/><input id="price"  type="number" name="price"/><br/>
            Info:<br/><input id="info"  type="text" name="info"/><br/>
            <input type="submit" value="ODESLAT">


        </form>

        <h3>Přidat produkt</h3>
        <?php
        if (isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["price"]) && isset($_POST["info"])) {

            $db = mysqli_connect("localhost", "root", "", "mydb");

            $name = $_POST["name"];
            $category = $_POST["category"];
            $price = $_POST["price"];
            $info = $_POST["info"];






            $result = mysqli_query($db, "INSERT INTO `mydb`.`product` (`ID`, `Name`, `Category`, `Price`, `Info`) VALUES ('', '".$name."', '".$category."','".$price."', '".$info."');");
            if ($result === true) {
                echo '<br>produkt prida</br>';
            } else {
                echo '<br>produkt nepridan</br>';
            }
        }
        ?>

 
             <?php
     
        echo '</br><h1>category</h1>';
        echo '</br>Jackets';
        echo '</br>Hoodies';
        echo '</br>tshirts';
        echo '</br>trouseres';
        echo '</br>shorts';
        echo '</br>shoes';
        echo '</br>training';
        echo '</br>accessories';
        
     
        ?>
    </body>
</html>
