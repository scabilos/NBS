<?php
include '../webparts/conector.php';
header("Location:client_nou.php");


$nume = mysqli_real_escape_string($conn, $_POST['nume_client']);
$reg_com = mysqli_real_escape_string($conn, $_POST['reg_com_client']);
$tva = mysqli_real_escape_string($conn, $_POST['tva_client']);
$cif = mysqli_real_escape_string($conn, $_POST['cod_fiscal_client']);
$adresa = mysqli_real_escape_string($conn, $_POST['adresa_client']);
$banca = mysqli_real_escape_string($conn, $_POST['banca_client']);
$cont_bancar = mysqli_real_escape_string($conn, $_POST['cont_bancar_client']);


$sql = "INSERT INTO clienti (nume, reg_com, tva, cif, adresa, banca, cont_bancar) VALUES ('$nume', '$reg_com', '$tva', '$cif', '$adresa', '$banca', '$cont_bancar')";




if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


// close connection
mysqli_close($conn);



?>
