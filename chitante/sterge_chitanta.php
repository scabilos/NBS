<?php

   header("Location:lista_chitante.php");
     
  	include '../webparts/conector.php';

  	$nr_chit = $_GET['nr_chit'];

	
   	$sql = "DELETE FROM chitante WHERE nr_chit='$nr_chit'";
 
 	if ($conn->query($sql) === TRUE) {
 		echo "Record updated successfully";
 	} else {
 		echo "Error updating record: " . $conn->error;
 	}
 
 	$conn->close();

?>
