
<!DOCTYPE html>

<html>

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title></title>
        <script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
        <script type="text/javascript" src="js/navigation.js"></script>
        <script type="text/javascript" src="js/profile.js"></script>

    </head>

    <script>
        $(document).ready(function() {
            $('#password').blur(function() {
                $('#result').html(checkLength($('#password').val()))
            })


            $("#passrep").blur(function() {
                var passwordInput = $("#password").val();
                var passwordAgain = $('#passrep').val();
                $('#result2').html(passwordsSame(passwordInput, passwordAgain));
            })



            $('#mail').focusout(function() {
                var mail = $("#mail").val();
                $.post('checkEmail.php', {mail: mail}, function(data) {
                    $("#resultt").html(data);
                });


            });
        });
        function checkLength(password) {
            if (password.length < 5) {
                return 'Moc kratke heslo'
            }
            else {
                return ""
            }
        }

        function passwordsSame(pass1, pass2) {
            if (pass1 == pass2) {
                return "";
            }
            else {
                return "Hesla se neshodují"
            }


        }


    </script>   




    <body>

        <?php
        if (isset($_POST["name"]) && isset($_POST["pass"]) && isset($_POST["passrep"]) && isset($_POST["mail"])) {

            require 'dbconect.php';
            $pass = $_POST["pass"];
            $name = $_POST["name"];
            $mail = $_POST["mail"];

            $err = 0;

            function random_string($len = "10") {
                $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $generate = '';
                for ($i = 0; $i < $len; $i++) {
                    $generate .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
                }

                return $generate;
            }

            if (strlen($name) > 5) {
                echo '<br>Jmeno je v poradku</br>';
            } else {
                $err++;
                echo '<br>Jmeno je kratke</br>';
            }

            if (strlen($pass) > 5) {

                if ($pass == $_POST["passrep"]) {

                    echo "<br>Heslo je spravne</br>";
                } else {
                    $err++;
                    echo "<br>Hesla nejsou stejna</br>";
                }
            } else {
                $err++;
                echo "<br>Kratke heslo</br>";
            }
            if (checkEmail($mail)) {
                echo '<br>Mail je v poradku</br> ';
            } else {
                $err++;
                echo '<br>  Mail neni v poradku</br>';
            }
            $genepass = random_string(20);
            if ($err == 0) {
                $salt = "#$%^&*@#$%^&*";
                $result = mysqli_query($db, "INSERT INTO uzivatel (ID,  Jmeno,Email, Password,Aktivace,Img,Adress,City,PSC) VALUES ('','" . $name . "','" . $mail . "', '" . sha1($pass . $salt) . "','" . $genepass . "', NULL, NULL, NULL,NULL)");
                if ($result === true) {
                    echo '<br>Uzivatel pridan</br>';
                    header("Location: index.php");
                }
            }
        }

        function checkEmail($mail) {
            if (preg_match("/^[^@]+@[^@]+\.[a-z]+$/", $mail) == 1) {
                return true;
            } else {
                return false;
            }
        }
        ?>









    </body>


</html>




















































