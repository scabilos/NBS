<!DOCTYPE html>
<html>
    <head>
        <title>Client nou</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webparts/style.css">
        <style>
            span {display: inline-block; width:110px; text-align:right;}
            #date_client input {margin-bottom:15px;}
        </style>
    </head>


    <body>

        <?php include '../webparts/topmenu.html';?>
    
        <form id="date_client" action="genereaza_client.php" method="post">
            <span> Nume client: </span> <input type="text" name="nume_client" size="60"> <br />
            <span> Reg. Com.: </span> <input type="text" name="reg_com_client" size="12"> <br />
            <span> TVA: </span> <input type="text" name="tva_client" size="5"> <br />
            <span> CIF: </span> <input type="text" name="cod_fiscal_client" size="12"> <br />
            <span> Adresa: </span> <input type="text" name="adresa_client" onfocus="this.value=''" value="localitate, strada, cladire, judet" size="80"> <br />
            <span> Banca: </span> <input type="text" name="banca_client" size="30"> <br />
            <span> Cont bancar: </span> <input type="text" name="cont_bancar_client" size="30"> <br />
            <input type="submit" value="Inregistreaza">
        </form>

            
    </body>

</html>
