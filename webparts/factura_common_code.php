<!-- FEJLEC -->

<table id="antet">
    <tr>
        <td style="width:37%; padding-right:15px;">
        
            <?php
                $sql = "SELECT * FROM cine_sunt WHERE id=1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                <b>Furnizor</b>:<br>
                <?php echo $row["nume"] ?> <br>
                <b>Nr ORC</b>: 
                <?php echo $row["reg_com"] ?> <br>
                <b>CIF</b>: 
                <?php echo $row["cif"] ?> <br>
                <b>Sediu</b>: 
                <?php echo $row["adresa"] ?> <br>
                <b>Cota TVA</b>: 
                <?php echo $row["tva"] ?> <br>
                <b>Banca</b>: 
                <?php echo $row["banca"] ?> <br>
                <b>Cont bancar</b>:<br>
                <?php echo $row["cont_bancar"] ?>
            <?php
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </td>
        
        <?php
            // A kovetkezo ket valtozo 3 lekerdezesben szerepel. A lista_facturi.php-bol kapja a GET ertekeket.

            $numar_factura = $_GET["numar_factura"];
            $nume = $_GET["nume"];

            // A szamla 3 lekerdezest tartalmaz:
            // 1. fejlecbe valo adatok egy resze: Furnizor, datum, szeria, aviz. Csak az elso sort veszi at az adatbazisbol (LIMIT 1).
            // 2. A kliens adatai. Ezt a clienti tabalazatbol veszi.
            // 3. termekek. Ugyanaz a lekerdezes, de most korlatozas nelkul (hogy a while ciklus behozhassa az osszes sort)

            $sql = "SELECT * FROM facturi WHERE numar_factura=? LIMIT 1";
            $stmt = $conn->prepare($sql); //prepare statement. Muszaly, mikor valtozo van a lekerdezesben
            $stmt->bind_param("s", $numar_factura); //az s betu variable string, majd utana a valtozo. Ahany s betu, annyi valtozo
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            while($row = $result->fetch_assoc())
                {   //ezt le kell zarni a kliens tablazat utan
        ?>
        
        <td id="date_factura">
            <h1>Factură</h1>
            <b>Serie și număr</b>: <?php echo $row["serie"]; ?> <?php echo $numar_factura; ?><br>
            <b>Data</b>: <?php echo substr($row["data"], -2, 2) . '-' . substr($row["data"], -5, 2) . '-' . substr($row["data"], 0, 4) ; ?><br> <!--Megforditottam a datumot, amit a MySQL-bol vettem-->
            <b>Nr aviz</b>: <?php echo $row["aviz"]; ?><br>
        </td>

<?php
    }
?>

        <?php

            $myArray = [];   //array that will hold the values you get from database for later use. Se also array_push($myArray, $row) and fetch_row functions!

            $sql = "SELECT * FROM clienti WHERE nume = ? LIMIT 1";
            $stmt = $conn->prepare($sql); //prepare statement. Muszaly, amikor valtozo van a lekerdezesben. Ez esetben a fajl felso reszen meghatarozott $nume valtozot hasznaljuk.
            $stmt->bind_param("s", $nume); //az s betu variable string, majd utana a valtozo. Ahany s betu, annyi valtozo
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            while($row = $result->fetch_row())
                {   
                    array_push($myArray, $row);
                }

            $cumparator = $myArray[0][1];
            $orc =  $myArray[0][2];
            $codfiscal = $myArray[0][4];
            $adresa_sediu = $myArray[0][5];
            $nume_banca = $myArray[0][6];
            $nr_cont_bancar = $myArray[0][7];
        ?>
        
        
        <td style="width:35%;">
            <b>Cumpărător</b>:<br>
            <?php echo $cumparator ?><br>
            <b>Nr Orc</b>: <?php echo $orc; ?><br>
            <b>CIF</b>: <?php echo $codfiscal ?><br>
            <b>Sediu</b>:<br>
            <?php echo $adresa_sediu ?><br>
            <b>Banca</b>:<br>
            <?php echo $nume_banca ?><br>
            <b>Cont bancar</b>:<br>
            <?php echo $nr_cont_bancar ?><br>
        </td>
    </tr>
</table>




<!-- TERMEKLISTA -->

<div id="div_prod">
    <table id="produse">
        <tr id="prod_header">
            <td>Nr crt</td>
            <td>Denumirea produselor sau a serviciilor</td>
            <td>UM</td>
            <td>Cant</td>
            <td>P.U. (lei)</td>
            <td>Valoarea (lei)</td>
        </tr>

        <?php
        $sql = "SELECT * FROM facturi WHERE numar_factura=?";
        $stmt = $conn->prepare($sql); //prepare statement. Muszaly, mikor valtozo van a lekerdezesben
        $stmt->bind_param("s", $numar_factura); //az s betu variable string, majd utana a valtozo. Ahany s betu, annyi valtozo
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        while($row = $result->fetch_assoc())
            {   //ezt le kell zarni a kliens tablazat utan

            echo
                '<tr>' . 
                    '<td class="center">' . $row["nr_crt"] . '</td>' . "\r\n" .
                    '<td>' . $row["prod"] . '</td>' . "\r\n" .
                    '<td class="center">' . $row["um"] . '</td>' . "\r\n" .
                    '<td class="right">' . number_format($row["cant"], 2, ',', '.') . '</td>' . "\r\n" . //Tizedeseket vesszovel valasztja el
                    '<td class="right">' . number_format($row["pret"], 2, ',', '.') . '</td>' . "\r\n" .
                    '<td class="right">' . number_format($row["valoare"], 2, ',', '.') . '</td>' . "\r\n" .
                '</tr>'
                ;
            }
        ?>

        <!-- S most kiszamoljuk a totalt -->
        <?php
        $sql = "SELECT SUM(valoare) AS total FROM facturi WHERE numar_factura=?";
        $stmt = $conn->prepare($sql); //prepare statement. Muszaly, mikor valtozo van a lekerdezesben
        $stmt->bind_param("s", $numar_factura); //az s betu variable string, majd utana a valtozo. Ahany s betu, annyi valtozo
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        while($row = $result->fetch_assoc())
            {   //ezt le kell zarni a kliens tablazat utan
        ?>

        <tr id="total">
            <td colspan="5" style="text-align:right; font-weight:bold; padding-right:20px;">TOTAL</td>
            <td style="font-weight:bold; text-align:right;"> <?php echo number_format($row["total"], 2, ',', '.'); ?>  </td>
        </tr>

        <?php
            }
        ?>

    </table>
</div>

<div id="metoda_plata">
    <span>
        Plata cu <?php echo $plata ?>
    </span>
</div>


<!-- LABLEC -->

<table id="footer">
    <tr>
        <td id="foot_sem">Semnatura si stampila furnizorului</td>
        <td id="foot_delegat" style="font-size:12px;">
            Nume delegat ................................................................................<br>
            CI .................................... Eliberat de ...........................................<br>
            Mijloc de transport ........................................................................<br>
            Data ...................................... Semnatura .....................................<br>
        </td>
        <td id="foot_primire">Semnatura de primire</td>
    </tr>
</table> 
