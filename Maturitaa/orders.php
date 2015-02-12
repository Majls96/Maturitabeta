<style>

    .h33{
        
    }
    .tablet{
       border-right: 100px;
    }
    

</style>
<div class="orders">
    <?php
    require 'dbconect.php';

    $query = "SELECT * FROM `order` WHERE 1";
    $result = mysqli_query($db, $query);
    $table = "<table class='tablet'>
                <tr><td><h3 class='h33'>Cislo objednavky</h3></td><td><h3>Adresa</h3></td><td><h3>Mesto</h3></td><td><h3>PSC</h3></td><td><h3>Uzivatel</h3></td><td><h3>Stav</h3></td></tr>";
    while ($row = mysqli_fetch_array($result)) {
        //  echo "Cislo objednavky : " . $row[0];
        //echo "Adresa objednavky : " . $row[1];
        //echo " Mesto objednavky : " . $row[2];
        //echo " PSC objednavky : " . $row[3];
        //echo " Uzivatel ID  : " . $row[4];
        //echo " Stav objednavky";
        /*if ($row["stav"] == 0) {
            $row[5] = 'zpracovava se';
        } else {
            $row[5] = 'Objednavka je hotova';
        }*/
        echo '</br>';
        $table = $table . "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td><select name='stav'><option>select..</option><option value='0'>neobjednano</option><option value='1'>objednano</option></select></td></tr>";
    }

    $table = $table . "</table>";
    echo $table;
    ?>

</div>