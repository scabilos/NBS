<?php 

$max_num = $_GET["max_num"];
$nr_crt = ++$max_num;
echo $nr_crt;
$serie = $_GET["serie"];
$numar_factura = $_GET["numar_factura"];
$aviz = $_GET["aviz"];
$data = $_GET["data"];
$nume = $_GET["nume"];

header("Location:editeaza_factura.php?numar_factura=$numar_factura");

include '../webparts/conector.php';




$sql = "INSERT INTO facturi (nr_crt, serie, numar_factura, aviz, data, nume) VALUES ('$nr_crt', '$serie', '$numar_factura', '$aviz', '$data', '$nume')";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
