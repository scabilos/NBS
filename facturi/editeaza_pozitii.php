<!DOCTYPE html>
<HTML>
    <head>
        <title>Editare poziții</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            input[type=text] {width:350px;}
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
    
    
    <BODY>

        <p>
            <a href="adauga_pozitie_factura.php">Adauga pozitie</a>
        </p>


        <?php
            include '../webparts/conector.php';
            $id = $_GET['id'];
        ?>
            
        <form id="date_client" action="update_pozitii.php?id=<?php echo $id; ?>" method="POST">

            <?php
                $sql = "SELECT * FROM facturi WHERE id = $id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo
                                'Serie: <input type="text" name="serie" value = "' . $row["serie"] . '"> <br />' . "\r\n" .
                                'Numar: <input type="text" name="numar_factura" value = "' . $row["numar_factura"] . '"> <br />' . "\r\n" .
                                'Aviz: <input type="text" name="aviz" value = "' . $row["aviz"] . '"> <br />' . "\r\n" .
                                'Data: <input type="text" name="data" value = "' . 
                                    substr($row["data"], -2, 2) . '-' . substr($row["data"], -5, 2) . '-' . substr($row["data"], 0, 4) . 
                                    '"> <br />' . "\r\n" .
                                'Client: <input type="text" name="nume" value = "' . $row["nume"] . '"> <br />' . "\r\n" . 
                                'Nr crt: <input type="text" name="nr_crt" value = "' . $row["nr_crt"] . '"> <br />' . "\r\n" .
                                'Produs: <input type="text" name="prod" value = "' . $row["prod"] . '"> <br />' . "\r\n" .
                                'U.M.: <input type="text" name="um" value = "' . $row["um"] . '"> <br />' . "\r\n" .
                                'Cantitate: <input type="text" name="cant" value = "' . $row["cant"] . '"> <br />' . "\r\n" .
                                'Pret: <input type="text" name="pret" value = "' . $row["pret"] . '"> <br />' . "\r\n" .
                                'Valoare: <input type="text" name="valoare" value = "' . $row["valoare"] . '"> <br />' . "\r\n" .
                                '<input type="submit" value="Actualizeaza">' . "\r\n" .
                                '<hr>' . "\r\n"
                                ;
                            }
                    } else {
                        echo "0 results";
                    }

            
                    $conn->close();

            ?>
            
            
        </form>


    </BODY>
</HTML>
