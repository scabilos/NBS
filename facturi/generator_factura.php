 
<?php

    header("Location:editeaza_factura.php");
//     header("Location:test_incarca.php");
    
    include '../webparts/conector.php';
        
    session_start();
    
    
    
    $serie = "D";
    
// 	Elozo szamla + 1
    $sql2 = "SELECT numar_factura+1 AS 'szamlaszam' FROM facturi ORDER BY numar_factura DESC LIMIT 1"; 
    
    
    $result2 = $conn->query($sql2);
    while($rows = $result2->fetch_assoc())
        {
        $_SESSION['numar_factura'] = $rows['szamlaszam'];
        $numar_factura = $_SESSION['numar_factura'];
        }
    $aviz = "-";
    
    $datum = date("j-m-Y");
    // Meg kell forditanom a datumot, hogy MySQL tudja fogadni a formatumot
    $data = substr($datum, -4, 4) . '-' . substr($datum, -7, 2) . '-' . substr($datum, 0, 2);
    
    $nr_crt = 1;

    $sql = "INSERT INTO facturi (serie, numar_factura, aviz, data, nr_crt) 
            VALUES 
            ('$serie', '$numar_factura', '$aviz', '$data', '$nr_crt')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }
    

    
        
?>
