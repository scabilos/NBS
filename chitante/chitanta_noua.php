<!DOCTYPE html>
<html>
    <head>
        <title>Chitanta noua</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webparts/style.css">
        <style>
            h1, #topmenu {text-align:left; margin-left:10px;}
            #date_client input {margin-bottom:15px;}
            #nc {margin-left:25px;}
            #rc {margin-left:35px;}
            #tva {margin-left:73px;}
            #cif {margin-left:79px;}
            #adr {margin-left:58px;}
            #ba {margin-left:64px;}
            #cb {margin-left:25px;}
        </style>
    </head>

    <body>

        <h1> Chitanță nouă </h1>
        
        <?php include '../webparts/topmenu.html';?>
        
        <?php
            
            include '../webparts/conector.php';
            
            // 	Elozo nyugta + 1
            $sql = "SELECT nr_chit+1 AS 'nyugtaszam' FROM chitante ORDER BY nr_chit DESC LIMIT 1"; 
            $result = $conn->query($sql);
            while($rows = $result->fetch_assoc())
                {
                $nr_chit = $rows['nyugtaszam'];
                }
            
            // Date for input autofill
            $date = date("j-m-Y");
        ?>

        <form id="date_client" action="incarca_chitanta.php" method="post">
            Serie: <input type="text" name="serie_chit" id="sn" value="D" size="1">
            Numar: <input type="number" name="nr_chit" value="<?php echo $nr_chit; ?>" id="nr" size="4">
            Data: <input type="text" name="data_chit" value="<?php echo $date; ?>" id="data_chit" size="5">
            Valoare: <input type="number" name="val_chit" id="val" size="5">
            Serie Factura: <input type="text" name="serie_factura" value="D" id="fac" size="1">
            Numar Factura: <input type="number" name="numar_factura" id="fac" size="5">
            <input type="submit" value="Inregistreaza">
        </form>

            
    </body>

</html>
