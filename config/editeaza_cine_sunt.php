<!DOCTYPE html>
<HTML>
    <head>
        <title>Datele mele</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webparts/style.css">
        <style>
            #topmenu, h1 {margin-left:10px;}
            h1 {text-align:left;}
            input[type=text] {width:350px;}
            span {display: inline-block; width:110px; text-align:right;}
            #datele_mele input {margin-bottom:15px;}
        </style> 
    </head>
    
    <BODY>

    <h1> Editează datele mele </h1>

    <?php include '../webparts/topmenu.html';?>
    
    
    
    
    <?php
        include '../webparts/conector.php';
        $id = 1;
    ?>
        
    <form id="datele_mele" action="update_cine_sunt.php?id=<?php echo $id; ?>" method="post">

        <?php
            $sql = "SELECT * FROM cine_sunt WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<span> Nume firmă: </span> <input type="text" name="nume_cine_sunt" value = "' . $row["nume"] . '"> <br />' . "\r\n" .
                        '<span> Reg. Com.: </span> <input type="text" name="reg_com_cine_sunt" value = "' . $row["reg_com"] . '"> <br />' . "\r\n" .
                        '<span> TVA: </span> <input type="text" name="tva_cine_sunt" value = "' . $row["tva"] . '"> <br />' . "\r\n" .
                        '<span> CIF: </span> <input type="text" name="cod_fiscal_cine_sunt" value = "' . $row["cif"] . '"> <br />' . "\r\n" .
                        '<span> Adresa: </span> <input type="text" name="adresa_cine_sunt" value = "' . $row["adresa"] . '"> <br />' . "\r\n" .
                        '<span> Banca: </span> <input type="text" name="banca_cine_sunt" value = "' . $row["banca"] . '"> <br />' . "\r\n" .
                        '<span> Cont bancar: </span> <input type="text" name="cont_bancar_cine_sunt" value = "' . $row["cont_bancar"] . '"> <br />'
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
