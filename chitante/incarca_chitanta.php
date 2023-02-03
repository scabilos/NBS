<?php
require '../webparts/conector.php';
header("Location:lista_chitante.php");


$serie_chit = mysqli_real_escape_string($conn, $_POST['serie_chit']);
$numar_chit = mysqli_real_escape_string($conn, $_POST['nr_chit']);
$data_chit = mysqli_real_escape_string($conn, $_POST['data_chit']);
$valoare_chit = mysqli_real_escape_string($conn, $_POST['val_chit']);
$serie_factura = mysqli_real_escape_string($conn, $_POST['serie_factura']);
$numar_factura = mysqli_real_escape_string($conn, $_POST['numar_factura']);


$sql = "INSERT INTO chitante (serie_chit, nr_chit, data_chit, val_chit, serie_factura, numar_factura) VALUES ('$serie_chit', '$numar_chit', '$data_chit', '$valoare_chit', '$serie_factura', '$numar_factura')";




if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}


// close connection
mysqli_close($conn);



?>
