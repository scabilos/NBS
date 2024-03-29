<!DOCTYPE html>

<html>
    <head>
        <title>Generator Factura cu Chitanta</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webparts/style.css">
        <style>
            h1, #topmenu {text-align:left; margin-left:10px;}
            form {display:inline;}
            input {margin-bottom:15px;}
        </style>
    </head>
    
    
    <body>

        <h1>Generează factură cu chitanță</h1>

        <?php include '../webparts/topmenu.html';?>


        
        
        <?php
            include '../webparts/conector.php';
            
        //  Kliens lista
            $sql = "SELECT nume FROM clienti ORDER BY nume";
            $result = $conn->query($sql);
            
        // 	Elozo szamla + 1
            $sql2 = "SELECT numar_factura+1 AS 'szamlaszam' FROM facturi ORDER BY numar_factura DESC LIMIT 1"; 
            $result2 = $conn->query($sql2);
            while($rows = $result2->fetch_assoc())
                {
                $numar_factura = $rows['szamlaszam'];
                }

        $date = date("j-m-Y");
            
        ?>




        <form action="generator_factura_cu_chitanta.php" method="post" style="margin-bottom:35px; margin-right:15px;">
            Numar pozitii 
            <select name="max_num" onchange="this.form.submit();">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </form>




        <form action="incarca_factura_cu_chitanta.php" method="post"> 
            Serie <input type="text" name="serie" value="D" size="1"> 
            Număr <input type="number" name="numar_factura" value="<?php echo $numar_factura; ?>" size="4"> 
            Aviz <input type="text" name="aviz" value="-" size="4"> 
            Data <input type="text" name="data" value="<?php echo $date; ?>" size="10"> 
            <input type="hidden" name="max_num_send" <?php echo 'value="' . $_POST[max_num] . '"' ; ?> size="6"> 
            <select name="nume" style="margin-bottom:35px;">
                <?php	
                    while($rows = $result->fetch_assoc())
                        {
                        $nume = $rows['nume'];
                        echo "<option value='$nume'>$nume</option>" . "\r\n"  ;
                        }
                ?>
            </select>


            <br>
            <?php

            $szamlalo = 1;
            $max_num = $_POST["max_num"];
            for($i=1; $i<=$max_num; $i++)
                {
                echo
                'Nr crt <input type="text" name="nr_crt_' . $szamlalo . '" value="' . $szamlalo . '" size="2">
                Prod-Serv <input type="text" name="prod_' . $szamlalo . '" style="width:450px;">
                UM <input type="text" name="um_' . $szamlalo . '" size="5">
                Cantitate <input id="cant_' . $szamlalo . '" type="text" name="cant_' . $szamlalo . '" size="6" onblur="calculate_' . $szamlalo . '()" />
                Preț unitar <input id="pret_' . $szamlalo . '" type="text" name="pret_' . $szamlalo . '" size="6" onblur="calculate_' . $szamlalo . '()" />
                Valoarea <input id="valoare_' . $szamlalo . '" type="text" name="valoare_' . $szamlalo . '" size="6" /><br>
            <script>
            calculate_' . $szamlalo . ' = function()
            {
                var cantitate = document' . '.' . 'getElementById("cant_' . $szamlalo . '").'.'value;
                var pret = document' . '.' . 'getElementById("pret_' . $szamlalo . '").'.'value;
                document' . '.' . 'getElementById("valoare_' . $szamlalo . '").'.'value = parseFloat(cantitate).toFixed(2)*parseFloat(pret).toFixed(2);
                    
                }
            </script>
                ';
                
                $szamlalo++;
                }

                        
            ?>


            <br>
                <h2> Chitanta noua </h2>
                    
                    <?php
                    // Date for input autofill
                    $date = date("j-m-Y");
                    ?>

                    Serie: <input type="text" name="serie_chit" id="sn" value="D" size="1">
                    Numar: <input type="number" name="nr_chit" id="nr" size="4">
                    Data: <input type="text" name="data_chit" id="data" value="<?php echo $date; ?>" size="5">
                    Valoare: <input type="text" name="val_chit" id="val" size="8">
                    Serie Factura: <input type="text" name="serie_factura" id="fac" value="D" size="5">
                    Numar Factura: <input number="text" name="numar_factura" id="fac" size="5">
                            
                    <p></p>
                    
                <input type="submit" value="Genereaza Factura cu Chitanta">
            </form>



    </body>
</html>
