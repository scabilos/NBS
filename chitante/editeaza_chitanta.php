<!DOCTYPE html>
<HTML>
    <head>
        <title>Editare chitanta</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../webparts/style.css">
        <style>
            input[type=text] {margin-bottom:15px;}
            #date_client input {margin-bottom:20px;}
            /* #nc {margin-left:25px;} */
            #nr_crt {margin-right:20px; margin-left:25px;}
            #rc {margin-left:35px;}
            #tva {margin-left:73px;}
            #cif {margin-left:79px;}
            #adr {margin-left:58px;}
            #ba {margin-left:64px;}
            #cb {margin-left:25px;}
            hr {margin-bottom:20px; margin-left:20px; border-top:1px dotted;}
            #adauga {margin-left:25px}
        </style> 
    </head>
    
    
    <BODY>

        <h1>Editează chitanta</h1>


        <?php include '../webparts/topmenu.html';?>


        <?php
            include '../webparts/conector.php';
            $nr_chit = $_GET['nr_chit'];
        ?>
            
            
            
        <form id="date_chitanta" action="update_chitanta.php" method="GET" style="margin-bottom:35px;">

            <?php
                $sql_chit = "SELECT * FROM chitante WHERE nr_chit = '$nr_chit'";
                    $result = $conn->query($sql_chit);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo
                                'Serie: <input type="text" name="serie_chit" value = "' . $row["serie_chit"] . '" size="1">
                                Numar: <input type="text" name="nr_chit" value = "' . $row["nr_chit"] . '" size="4">
                                Data: <input type="text" name="data_chit" value = "' . 
                                    substr($row["data_chit"], -2, 2) . '-' . substr($row["data_chit"], -5, 2) . '-' . substr($row["data_chit"], 0, 4) . 
                                    '" size="10">
                                Valoare: <input type="text" name="val_chit" value = "' . $row["val_chit"] . '" size="8"> 
                                Serie factura: <input type="text" name="serie_factura" value = "' . $row["serie_factura"] . '" size="8">
                                Numar Factura: <input type="text" name="numar_factura" value = "' . $row["numar_factura"] . '" size="8"> '
                                ;
                            }
                    } else {
                        echo "0 results";
                    }
        ?>

            <input type="submit" value="Actualizeaza">
            
            
        </form>





    </BODY>
</HTML>
 
