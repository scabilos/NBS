<!DOCTYPE html>
<HTML>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lista chitante</title>
		<link rel="stylesheet" href="../webparts/style.css">
		<style>
            body {max-width:fit-content; display: block; margin:auto;}
            #wrapper {display: inline-block; margin:auto;}
			table {border:1px solid; font-size:14px; margin-bottom:50px;}
			table th, table td {border-right:1px solid;}
			td {padding:10px 5px 0px; text-align:center;}
			#nr_crt {width:20px;}
			#cant, #serie, #aviz, #nr_crt {text-align:center;}
			tr:hover {background-color:#ddd;}
		</style>
	</head>

	
	<BODY>


		<h1>Listă chitanțe</h1>

        <?php include '../webparts/topmenu.html';?>
		
		
        <div id="new_stuff" style="width:150px;">
            <a href="chitanta_noua.php">Chitanță nouă</a>
        </div>



        
        <?php include '../webparts/conector.php';?>

		<table>
			
			<th id="serie_chit">Serie</th>
			<th id="nr_chit">Număr</th>
            <th id="data_chit">Data</th>
            <th id="val_chit">Valoare</th>
            <th id="factura">Serie Factură</th>
            <th id="factura">Nr. Factură</th>
            <th id="operatii" colspan="4">Operații</th>
            
				<?php

				error_reporting(E_ALL);

				$sql = "SELECT * FROM chitante GROUP BY nr_chit ORDER BY nr_chit DESC";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo
                            '<tr>' . 
                                
                                '<td id="serie_chit">' . $row["serie_chit"] . '</td>' . "\r\n" .
                                '<td id="nr_chit">' . $row["nr_chit"] . '</td>' . "\r\n" .
                                '<td>' . $row["data_chit"] . '</td>' . "\r\n" .
                                '<td id="val_chit">' . $row["val_chit"] . '</td>' . "\r\n" .
                                '<td>' . $row["serie_factura"] . '</td>' . "\r\n" .
                                '<td>' . $row["numar_factura"] . '</td>' . "\r\n" .
                                '<td><a href="editeaza_chitanta.php?nr_chit=' . $row[nr_chit] . '">Editeaza</a></td>' . "\r\n" .
                                '<td><a href="sterge_chitanta.php?nr_chit=' . $row[nr_chit] . '" onClick="return confirmare();">Sterge</a></td>' . "\r\n" .
                                '<td><a href="imprima_chitanta.php?numar_factura=' . $row[numar_factura] . '" target="_blank">Imprima</a></td>' . "\r\n" .
                            '</tr>' . "\r\n" .
                            '<script type=\'text/javascript\'>
                            function confirmare() {
                            return confirm("Șterg chitanța?")
                                }
                            </script>' . "\r\n"
                            ;
					}
				} else {
					echo "0 results";
				}

				$conn->close();

				?>
		</table>

		
		
    </BODY>
</HTML>
