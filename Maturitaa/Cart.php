
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

            $(".bar td").click(function() {
                var id = $(this).attr("id");
                $(".incontent").load("loadObleceni.php", {"category": id});


            });
        });
    </script>

    <body>


        <div class="container">
            <div class="nav">
                <div class="logo"><a href="index.php"><img src="image/Mywaylogo.png"/></a></div>
                <div class="navigation">
                    <table>
                        <tr align="center">
                            <td id="homee"><a href="index.php">HOME</a></td>
                            <td id="profilee">PROFILE</td>
                            <td id="course"><a href="Course.php">COURSE</a></td>
                            <td id="contact"><a href="Contact.php">CONTACT</a></td>
                            <td id="cart"><a href="Cart.php">CART</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="contentnav">    
                <div class="slideshow">
                    <?php echo 'tady bude kosik';
                    ?>
                </div>

                <div class="course"></div>
                <div class="contact"></div>
                <div class="cart"></div>
            </div>
            <div class="slideswip">
                <table class="tabswip">

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
                    <?php
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>
