<?php
    header("Location:lista_facturi.php");
    
	include '../webparts/conector.php';

        $serie = $_POST["serie"];
        $numar_factura = $_POST["numar_factura"];
        $aviz = $_POST["aviz"];
        $date = $_POST["data"];
//         Meg kell forditanom a datumot, hogy MySQL tudja fogadni a formatumot
        $data = substr($date, -4, 4) . '-' . substr($date, -7, 2) . '-' . substr($date, 0, 2);
        $nume = $_POST["nume"];
  
  
	$szamlalo = 1;
	$hanyszor = $_POST['max_num_send'];
	for($i=1; $i<=$hanyszor; $i++)
        {   /*Itt kezdem a for ciklust*/
        $nr_crt = $_POST["nr_crt_" . $szamlalo];
        $prod = $_POST['prod_' . $szamlalo];
        $um = $_POST['um_' . $szamlalo];
        $cant = $_POST['cant_' . $szamlalo];
        $pret = $_POST['pret_' . $szamlalo];
        $valoare = $_POST['valoare_' . $szamlalo];
            
            
        $sql = "INSERT INTO facturi 
            (serie, numar_factura, aviz, data, nume, nr_crt, prod, um, cant, pret, valoare) 
            VALUES 
            ('$serie', '$numar_factura', '$aviz', '$data', '$nume', '$nr_crt', '$prod', '$um', '$cant', '$pret', '$valoare')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }
            
            
            
        $szamlalo++;
        }   /*Itt fejezem be a for ciklust*/
 	


		


?>


<?php


$serie_chit = mysqli_real_escape_string($conn, $_POST['serie_chit']);
$numar__chit = mysqli_real_escape_string($conn, $_POST['nr_chit']);
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


	$conn->close();



?>
