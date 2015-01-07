<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
        <script type="text/javascript" src="js/navigation.js"></script>
        <script type="text/javascript" src="js/profile.js"></script>
    </head>
    <style>
        div.img {
            margin: 5px;
            padding: 5px;
            border: 1px solid #0000ff;
            height: auto;
            width: auto;
            float: left;
            text-align: center;
        }

        div.img img {
            display: inline;
            margin: 5px;
            border: 1px solid #ffffff;
        }

        div.img a:hover img {
            border:1px solid #0000ff;
        }

        div.desc {
            text-align: center;
            font-weight: normal;
            width: 120px;
            margin: 5px;
        }

    </style>

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
            $(".bar td").click(function() {
                var id = $(this).attr("id");
                $(".incontent").load("loadObleceni.php", {"category": id});


            });
            /* $("#swip2").click(function() {
             
             alert("ahoj");
             });*/
        });
    </script>
    <body>


        <div class="container">
            <div class="nav">
                <div class="logo"><a href="index.php"><img src="image/Mywaylogo.png"/></a></div>
                <div class="navigation">
                    <table>
                        <tr align="center">
                            <td id="home"><a class="text" href="#">HOME</a></td>
                            <td id="profile"><a class="text" href="#">PROFILE</a></td>
                            <td id="course"><a class="text" href="Course.php">COURSE</a></td>
                            <td id="contact"><a class="text" href="Contact.php">CONTACT</a></td>
                            <td id="cart"><a class="text" href="Cart.php">CART</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="contentnav">
                <div class="slideshow">
                    <img class="jedna"src="image/nikelogo.jpg"/>

                    <img src="image/usain.jpg"/>
                    <img src="image/adida.jpg"/>
                </div>
                <div class="profile">
                    
                    <?php
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id']  == 1):
                        ?>
                        <a href = "newprodukt.php">Novy produkt</a>
                    <?php 
                    
                    endif;
                   
                    ?>
                        

                    <?php
                    // echo "user id je ".$_SESSION['user_id'];
                    if (!isset($_SESSION['user_id'])):
                        ?>

                        <div class="regist">
                            <form method="post" action="registrace.php">
                                <p>Register</p>
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
                                <p>Login</p>
                                <p><input class="inputdesg" id="mail" type="text" name="mail" placeholder="User Name"/></p>
                                <p><input class="inputdesg" type="password" name="pass" placeholder="Heslo"/></p>
                                <input class="subbut" type="submit" value="Odeslat"/>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php
                    $db = mysqli_connect("localhost", "root", "", "mydb");
                    ?>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href = "odhlaseni.php">Logout</a >

                        <?php
                        $query = "SELECT * FROM `uzivatel` WHERE ID LIKE ('" . $_SESSION['user_id'] . "')  ";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_row($result);
                        echo 'Vitejte ' . $row[1];
                        echo '</br>' . $row[6];
                        echo '</br>' . $row[7];
                        echo '</br>' . $row[8];
                        echo '</br>' . $row[9];



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

                <div class="course"></div>
                <div class="contact"></div>
                <div class="cart"></div>
            </div>
            <div class="slideswip">
                <table class="tabswip">
                    <tr>
                        <td><div id="swip1" class="swip1"></div></td>
                        <td><div id="swip2" class="swip2"></div></td>
                        <td><div id="swip3" class="swip3"></div></td>
                    </tr>
                </table>
                <div class="bla"></div>
            </div>
            <div class="cont-bar">
                <div class="bar" align="center">
                    <table>
                        <tr align="center">
                        <ul>
                            <td class="slidedown" id="jackets">JACKETS</td>
                            <td class="slidedown" id="hoodies">HOODIES</td>
                            <td class="slidedown" id="tshirts">T-SHIRTS</td>
                            <td class="slidedown" id="trousers">TROUSERS</td>
                            <td class="slidedown" id="shorts">SHORTS</td>
                            <td class="slidedown" id="shoes">SHOES</td>
                            <td class="slidedown" id="training">TRAINING</td>
                            <td class="slidedown" id="accessories">ACCESSORIES</td>
                            </tr>
                    </table>
                    <img class="slidedown" src="image/1.png"/>
                </div>
            </div>
            <div class="content">

                <div class="incontent">



                </div>
            </div>
        </div>

    </body>
</html>
