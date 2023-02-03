<?php

$nr_chit = $_GET['nr_chit'];
header("Location:lista_chitante.php");

include '../webparts/conector.php';


$date = mysqli_real_escape_string($conn, $_GET['data_chit']);
$data = substr($date, -4, 4) . '-' . substr($date, -7, 2) . '-' . substr($date, 0, 2);
$val_chit = mysqli_real_escape_string($conn, $_GET['val_chit']);
$serie_factura = mysqli_real_escape_string($conn, $_GET['serie_factura']);
$numar_factura = mysqli_real_escape_string($conn, $_GET['numar_factura']);


$sql = "UPDATE chitante SET nr_chit='$nr_chit', data_chit='$data', val_chit='$val_chit', serie_factura='$serie_factura', numar_factura='$numar_factura' WHERE nr_chit='$nr_chit'";



if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


?>
