<?php

header("Location:pozitii_facturi.php");

include '../webparts/conector.php';

$id = $_GET['id']; /*Muszaly GET-el atvenni. POST-al nem megy*/

$serie = mysqli_real_escape_string($conn, $_POST['serie']);
$numar_factura = mysqli_real_escape_string($conn, $_POST['numar_factura']);
$aviz = mysqli_real_escape_string($conn, $_POST['aviz']);
$date = mysqli_real_escape_string($conn, $_POST['data']);
$data = substr($date, -4, 4) . '-' . substr($date, -7, 2) . '-' . substr($date, 0, 2);
$nume = mysqli_real_escape_string($conn, $_POST['nume']);
$nr_crt = mysqli_real_escape_string($conn, $_POST['nr_crt']);
$prod = mysqli_real_escape_string($conn, $_POST['prod']);
$um = mysqli_real_escape_string($conn, $_POST['um']);
$cant = mysqli_real_escape_string($conn, $_POST['cant']);
$pret = mysqli_real_escape_string($conn, $_POST['pret']);
$valoare = mysqli_real_escape_string($conn, $_POST['valoare']);



$sql = "UPDATE facturi SET serie='$serie', numar_factura='$numar_factura', aviz='$aviz', data='$data', nume='$nume', nr_crt='$nr_crt', prod='$prod', um='$um', cant='$cant', pret='$pret', valoare='$valoare' WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


?>
 
