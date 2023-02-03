<!DOCTYPE html>

<html>

    <head>
        <title>Factura cu chitanta</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="factura.css">
        <style>
            #div_prod {height:330px;}
        </style>
    </head>

    
    <body>


        <?php

        include '../webparts/conector.php';

        $plata = "Cash";

        include '../webparts/factura_common_code.php';

        include '../webparts/chitanta_common_code.php';

        ?>


    </body>
</html>
 
