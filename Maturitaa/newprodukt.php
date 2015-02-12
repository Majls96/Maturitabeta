<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">




    </head>

    <body>
        <div class="cart">
            <form action="" method="POST"  enctype="multipart/form-data">
                Name:  <br/><input id="name"  type="text" name="name"/><br/>
                Category:<br/><input id="jmeno"  type="text" name="category"/><br/>
                Price: <br/><input id="price"  type="number" name="price"/><br/>
                Info:<br/><input id="info"  type="text" name="info"/><br/>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="ODESLAT">


            </form>

            <h3>Přidat produkt</h3>
            <?php
            if (isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["price"]) && isset($_POST["info"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
// Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
// Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
// Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                require 'dbconect.php';
                $name = $_POST["name"];
                $category = $_POST["category"];
                $price = $_POST["price"];
                $info = $_POST["info"];



                $script = "INSERT INTO `mydb`.`product` (`ID`, `Name`, `Category`, `Price`, `Info`) VALUES ('NULL', '" . $name . "', '" . $category . "','" . $price . "', '" . $info . "')";
                echo $script;


                $result = mysqli_query($db, $script);
                if ($result === true) {
                    echo '<br>produkt pridan</br>';
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
            <br>
            <a href="index.php">Zpet na stranku</a>
        </div>
    </body>
</html>
