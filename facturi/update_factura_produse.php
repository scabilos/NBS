<?php
$numar_factura = $_GET['numar_factura'];
$nr_crt = $_GET['nr_crt'];
header("location:editeaza_factura.php?numar_factura=$numar_factura");
include '../webparts/conector.php';





$ctr = 1;
$hanyszor = $_GET['max_num'];
	for($i=1; $i<=$hanyszor; $i++)
        {   /*Itt kezdem a for ciklust*/
//         amikor tisztabban gondolkodok, ellenorizni, hogy az alabbi nr_crt szukseges-e meg
        $nr_crt = mysqli_real_escape_string($conn, $_GET["nr_crt_" . $ctr]);
        $prod = mysqli_real_escape_string($conn, $_GET["prod_" . $ctr]);
        $um = mysqli_real_escape_string($conn, $_GET["um_" . $ctr]);
        $cant = mysqli_real_escape_string($conn, $_GET["cant_" . $ctr]);
        $pret = mysqli_real_escape_string($conn, $_GET["pret_" . $ctr]);
        $valoare = mysqli_real_escape_string($conn, $_GET["valoare_" . $ctr]);
        
        $sql = "UPDATE facturi SET prod='$prod', um='$um', cant='$cant', pret='$pret', valoare='$valoare' WHERE numar_factura=$numar_factura AND nr_crt=$nr_crt";
        
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }
        $ctr++;
        }   /*Itt fejezem be a for ciklust*/

	$conn->close();


?>
