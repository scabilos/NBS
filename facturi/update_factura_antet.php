<?php

$numar_factura = $_GET['numar_factura'];
header("location:editeaza_factura.php?numar_factura=$numar_factura");


include '../webparts/conector.php';


$serie = mysqli_real_escape_string($conn, $_GET['serie']);
$aviz = mysqli_real_escape_string($conn, $_GET['aviz']);
$date = mysqli_real_escape_string($conn, $_GET['data']);
$data = substr($date, -4, 4) . '-' . substr($date, -7, 2) . '-' . substr($date, 0, 2);
$nume = mysqli_real_escape_string($conn, $_GET['nume']);



$sql = "UPDATE facturi SET serie='$serie', numar_factura='$numar_factura', aviz='$aviz', data='$data', nume='$nume' WHERE numar_factura=$numar_factura";



if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


?>
