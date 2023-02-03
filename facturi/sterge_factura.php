<?php

  header("Location:lista_facturi.php");
     
 	include '../webparts/conector.php';

 	$numar_factura = $_GET['numar_factura'];

  	$sql = "DELETE FROM facturi WHERE numar_factura=$numar_factura";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();

?>
