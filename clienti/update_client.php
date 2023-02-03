<?php

header("Location:lista_clienti.php");

include '../webparts/conector.php';

$id = $_GET['id'];

$nume = mysqli_real_escape_string($conn, $_POST['nume_client']);
$reg_com = mysqli_real_escape_string($conn, $_POST['reg_com_client']);
$tva = mysqli_real_escape_string($conn, $_POST['tva_client']);
$cif = mysqli_real_escape_string($conn, $_POST['cod_fiscal_client']);
$adresa = mysqli_real_escape_string($conn, $_POST['adresa_client']);
$banca = mysqli_real_escape_string($conn, $_POST['banca_client']);
$cont_bancar = mysqli_real_escape_string($conn, $_POST['cont_bancar_client']);

$sql = "UPDATE clienti SET nume='$nume', reg_com='$reg_com', tva='$tva', cif='$cif', adresa='$adresa', banca='$banca', cont_bancar='$cont_bancar' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Date actualizate cu succes";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
