<html>
    <head>

        <link rel="stylesheet" type="text/css" href="style.css"/>


    </head>
    <div class="profile">

        <?php
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == "1"):
            ?>
            <a href = "index.php?page=newprodukt">Novy produkt</a>
            <?php
        endif;
        ?>


        <?php
// echo "user id je ".$_SESSION['user_id'];
        if (!isset($_SESSION['user_id'])):
            ?>

            <div class="regist">
                <form method="post" action="registrace.php">
                    <h1>Register</h1>
                    <p><input class="inputdesg" type="name" name="name" value="" placeholder="Jmeno"></p>
                    <div id="result" style="color: red;height: -1px"></div>
                    <p><input class="inputdesg" id="password" type="password" name="pass" value="" placeholder="Password"></p>
                    <div id="result2" style="color: red;height: -1px"></div>
                    <p><input class="inputdesg" id="passrep" type="password" name="passrep" value="" placeholder="Password repeat"></p>
                    <div id="mailerror1" style="color: red;height: -1px"></div>
                    <p><input id="mailresult" class="inputdesg"  type="mail" name="mail" value="" placeholder="mail"></p>

                    <p class="submit"><input class="subbut" type="submit" name="" value="Registrovat"></p>
                </form>
            </div>
            <div class="login">
                <form method="POST" action="prihlaseni.php">
                    <h1>Login</h1>
                    <p><input class="inputdesg" id="mail" type="text" name="mail" placeholder="User Name"/></p>
                    <p><input class="inputdesg" type="password" name="pass" placeholder="Heslo"/></p>
                    <input class="subbut" type="submit" value="Odeslat"/>
                </form>
            </div>
        <?php endif; ?>

        <?php
        // $db = mysqli_connect("localhost", "root", "", "mydb");
        ?> 
        <?php if (!isset($_SESSION['user_id'])) { ?>
        <?php } else { ?>
            <a href = "odhlaseni.php">Logout</a >
        <?php } ?>

        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 1): ?>
            <?php
            $query = "SELECT * FROM `uzivatel` WHERE ID LIKE ('" . $_SESSION['user_id'] . "')  ";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_row($result);
            echo 'Vitejte ' . $row[1];
            echo '</br>' . $row[6];
            echo '</br>' . $row[7];
            echo '</br>' . $row[8];
            //      echo '</br>' . $row[9];



            if ($row[7] == NULL):
                ?>
                <div>
                    <div class="regist">
                        <form method="post" action="dokonceni.php">
                            <p>Profil Dokonceni</p>
                            <p><input class="inputdesg" type="adresa" name="adresa" value="" placeholder="Adresa"></p>
                            <p><input class="inputdesg"  type="mesto" name="mesto" value="" placeholder="Mesto"></p>
                            <p><input class="inputdesg"  type="psc" name="psc" value="" placeholder="PSC"></p>

                            <p class="submit"><input class="subbut" type="submit" name="" value="Odeslat"></p>
                        </form>
                    </div>

                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
    <script>

        $(document).ready(function() {
            $("#mailresult").keyup(function() {
                var data = "email=" + $("#mailresult").val();

                $.getJSON('checkmail.php?' + data, function(result) {
                    if (result["isTaken"] === true)
                    {
                        $('#mailerror1').css('color', 'red');

                        $("#mailerror1").text("Email je jiz pouzity");
                    } else {

                        $('#mailerror1').css('color', 'greenyellow');
                        $("#mailerror1").text("Email muzete pouzit");
                    }

                });

            });

        });
    </script>
    <script type="text/javascript" src="js/profile.js"></script>
</html>
