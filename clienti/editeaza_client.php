<!DOCTYPE html>
<HTML>
    <head>
        <title>Editare date client</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        input[type=text] {width:350px;}
        span {display: inline-block; width:110px; text-align:right;}
        #date_client input {margin-bottom:15px;}
        </style> 
    </head>
    <BODY>



    <?php
        include '../webparts/conector.php';
        $id = $_GET['id'];
    ?>
        
    <form id="date_client" action="update_client.php?id=<?php echo $id; ?>" method="post">

        <?php
            $sql = "SELECT * FROM clienti WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<span> Nume client: </span> <input type="text" name="nume_client" value = "' . $row["nume"] . '"> <br />' . "\r\n" .
                        '<span> Reg. Com.: </span> <input type="text" name="reg_com_client" value = "' . $row["reg_com"] . '"> <br />' . "\r\n" .
                        '<span> TVA: </span> <input type="text" name="tva_client" value = "' . $row["tva"] . '"> <br />' . "\r\n" .
                        '<span> CIF: </span> <input type="text" name="cod_fiscal_client" value = "' . $row["cif"] . '"> <br />' . "\r\n" .
                        '<span> Adresa: </span> <input type="text" name="adresa_client" value = "' . $row["adresa"] . '"> <br />' . "\r\n" .
                        '<span> Banca: </span> <input type="text" name="banca_client" value = "' . $row["banca"] . '"> <br />' . "\r\n" .
                        '<span> Cont bancar: </span> <input type="text" name="cont_bancar_client" value = "' . $row["cont_bancar"] . '"> <br />'
                        ;
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();

        ?>

        <input type="submit" value="Actualizeaza">
        
        
    </form>

    </BODY>
</HTML>
