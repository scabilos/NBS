<!DOCTYPE html>
<HTML>
    <head>
        <title>Editare factura</title>
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

        <h1>Editează factură</h1>


        <?php include '../webparts/topmenu.html';?>


        
        
        <?php
            include '../webparts/conector.php';
            $numar_factura = $_GET['numar_factura'];
            

        ?>
            
        <form id="date_client" action="update_factura_antet.php" method="GET" style="margin-bottom:35px;">


            <?php
                $sql_antet = "SELECT serie, numar_factura, aviz, data, nume FROM facturi WHERE numar_factura = $numar_factura  LIMIT 1";
                    $result = $conn->query($sql_antet);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo
                                'Serie: <input type="text" name="serie" value = "' . $row["serie"] . '" size="1"> 
                                Numar: <input type="text" name="numar_factura" value = "' . $row["numar_factura"] . '" size="4"> 
                                Aviz: <input type="text" name="aviz" value = "' . $row["aviz"] . '" size="3"> 
                                Data: <input type="text" name="data" value = "' . 
                                    substr($row["data"], -2, 2) . '-' . substr($row["data"], -5, 2) . '-' . substr($row["data"], 0, 4) . 
                                    '" size="8"> '
                                ;
                            }
                    } else {
                        echo "0 results";
                    }
        ?>

        Client:
        <select name="nume">
        <?php	
            //  Kliens lista. Kell a szelektorhoz.
            $sql_clienti = "select distinct clienti.nume from clienti left join facturi on clienti.nume = facturi.nume order by numar_factura = $numar_factura desc, nume asc";
            $result = $conn->query($sql_clienti);

            while($rows = $result->fetch_assoc())
                {
                $nume = $rows['nume'];
                echo '<option id="alege_client" value="' . $nume . '">' . $nume . '</option>';
                }
        ?>
        </select>

            <input type="submit" value="Actualizeaza">
            
            
        </form>



            

        <?php
                echo '<form id="date_produse" action="update_factura_produse.php" method="GET">' . "\r\n";
                $ctr = 0;
                $sql_pozitii = "SELECT * FROM facturi WHERE numar_factura = $numar_factura";
                    $result = $conn->query($sql_pozitii);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $ctr++;
                            echo
                                '<input id="nr_crt" name="nr_crt_' . $ctr . '" value = "' . $row["nr_crt"] . '" size="1" readonly>' . $row["nr_crt"] . "\r\n" .
                                'Produs: <input id="prod" type="text" name="prod_' . $ctr . '" value = "' . $row["prod"] . '" size="40">' . "\r\n" .
                                'U.M.: <input id="um" type="text" name="um_' . $ctr . '" value = "' . $row["um"] . '" size="3">' . "\r\n" .
                                'Cantitate: <input id="cant_' . $ctr . '" type="text" name="cant_' . $ctr . '" value = "' . $row["cant"] . '" size="3" onblur="calculate_' . $row['id'] . '()">' . "\r\n" .
                                'Pret: <input id="pret_' . $ctr . '" type="text" name="pret_' . $ctr . '" value = "' . $row["pret"] . '" size="4" onblur="calculate_' . $row['id'] . '()">' . "\r\n" .
                                'Valoare: <input id="valoare_' . $ctr . '" type="text" name="valoare_' . $ctr . '" value = "' . $row["valoare"] . '" size="7">' . "\r\n" .
                                '<a href="sterge_pozitie.php?id=' . $row["id"] . '&addr=editeaza_factura.php?numar_factura=' . $row["numar_factura"] . '">Sterge</a>' . "\r\n" . 
                                '<script>
                                calculate_' . $row['id'] . ' = function()
                                {
                                    var cantitate = document' . '.' . 'getElementById("cant_' . $ctr . '").'.'value;
                                    var pret = document' . '.' . 'getElementById("pret_' . $ctr . '").'.'value;
                                    document' . '.' . 'getElementById("valoare_' . $ctr . '").'.'value = parseFloat(cantitate).toFixed(2)*parseFloat(pret).toFixed(2);
                                    }
                                </script>' . "\r\n" . 
                                '<hr>' . "\r\n"
                                ;
                            }
                    } else {
                        echo "no results";
                    }
                
        // 		Utolso sor (nr_crt) szama. Kell a feltolteshez.
        // 		Csak utana zarom a form-ot.
                $max_nr_crt = "SELECT nr_crt FROM facturi WHERE numar_factura = $numar_factura ORDER BY nr_crt DESC LIMIT 1";
                $result = $conn->query($max_nr_crt);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $max_num = $row["nr_crt"];
                            }
                    } else {
                        echo "no results";
                    }	
                    
                    
                    
                    echo 
                    '<input type="hidden" name="max_num" value = "' . $max_num . '">' . "\r\n" . 
                    '<input type="hidden" name="numar_factura" value = "' . $numar_factura . '">' . "\r\n" . 
                    '<input type="submit" value="Actualizeaza">' . "\r\n" . 
                    '</form>' . "\r\n"
                    ;
                    
        // 		Adauga pozitie cu campuri precompletate partial	
                $sql_last_position = "SELECT serie, numar_factura, aviz, data, nume FROM facturi WHERE numar_factura = $numar_factura ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql_last_position);	
                        while($row = $result->fetch_assoc()) {
                            echo
                                '<a id="adauga" href="adauga_pozitie.php?max_num=' . $max_num . '&serie=' . $row["serie"] . '&numar_factura=' . $row["numar_factura"] . '&aviz=' . $row["aviz"] . '&data=' . $row["data"] . '&nume=' . $row["nume"] . '">Adaugă poziție</a>';
                            }
                

            
                    $conn->close();

            ?>



    </BODY>
</HTML>
 
