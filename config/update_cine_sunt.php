<html>
    
    <head>
    </head>
    
    <body>
    
        <?php

            header("Location:../index.php");
        
            include '../webparts/conector.php';

            $id = 1;

            $nume = mysqli_real_escape_string($conn, $_POST['nume_cine_sunt']);
            $reg_com = mysqli_real_escape_string($conn, $_POST['reg_com_cine_sunt']);
            $tva = mysqli_real_escape_string($conn, $_POST['tva_cine_sunt']);
            $cif = mysqli_real_escape_string($conn, $_POST['cod_fiscal_cine_sunt']);
            $adresa = mysqli_real_escape_string($conn, $_POST['adresa_cine_sunt']);
            $banca = mysqli_real_escape_string($conn, $_POST['banca_cine_sunt']);
            $cont_bancar = mysqli_real_escape_string($conn, $_POST['cont_bancar_cine_sunt']);

            $sql = "UPDATE cine_sunt SET nume='$nume', reg_com='$reg_com', tva='$tva', cif='$cif', adresa='$adresa', banca='$banca', cont_bancar='$cont_bancar' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Date actualizate cu succes";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();

        ?>

    </body>
</html>
