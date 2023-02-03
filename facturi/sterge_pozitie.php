<?php

$addr = $_GET["addr"];

  header("Location:$addr");
     
 	include '../webparts/conector.php';

 	$id = $_GET['id'];

  	$sql = "DELETE FROM facturi WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();

?>
 
