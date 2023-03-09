 
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
            $numar_factura = $_GET['numar_factura'];
        ?>


       <!-- <span>
        MEGOLDANI

        - numar_factura-val kihalaszni a kliens nevet es betolteni valtozoba
        Select nume from facturi where numar_factura = $numar_factura
        $nume_client = echo row[nume]
        Ha nem muxik, akkor myArray
        </span>-->



        <?php
        include '../webparts/conector.php';
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
