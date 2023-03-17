 
<!DOCTYPE html>

<html>

<head>
    <title>Imprima chitanta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../facturi/factura.css">
    <style>
        #div_prod {height:330px;}
    </style>
</head>

    <body>

        <?php
            include '../webparts/conector.php';
           
            $numar_factura = $_GET['numar_factura'];
            $cumparator = $_GET['cumparator'];
            $nume = $cumparator;
            

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
            




        <?php
            include '../webparts/chitanta_common_code.php';
        ?>

        <pre>




        </pre>

        <?php
            include '../webparts/conector.php';
            include '../webparts/chitanta_common_code.php';
        ?>




    </body>
</html>
