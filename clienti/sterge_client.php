<?php

    header("Location:lista_clienti.php");

    include '../webparts/conector.php';

	$id = $_GET['id'];
	echo $id;
	$sql = "DELETE FROM clienti WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();

?>
