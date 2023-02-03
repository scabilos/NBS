<!DOCTYPE html>
<HTML>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Poziții facturi</title>
        <link rel="stylesheet" href="../webparts/style.css">
		<style>
			table {border:1px solid; font-size:14px; margin:auto;}
			table th, table td {border-right:1px solid;}
			th {border-bottom:1px solid; background-color:#ddd;}
			td {padding:10px 5px 0px;}
			#nr_crt {width:20px;}
			#cant, #serie, #aviz, #nr_crt {text-align:center;}
			tr:hover {background-color:#ddd;}
		</style>
	</head>

	
	<BODY>


		<h1 style="text-align:center;"> Poziții facturi </h1>

        <?php include '../webparts/topmenu.html';?>
	

	
	
        <?php include '../webparts/conector.php';?>


		<table>
			<tr>
                <th>ID</th>
                <th id="serie">Serie</th>
                <th id="numar_factura">Numar</th>
                <th id="aviz">Aviz</th>
                <th id="data">Data</th>
                <th id="nume">Nume Client</th>
                <th id="nr_crt">Nr crt</th>
                <th id="prod">Produs sau serviciu</th>
                <th id="um">U.M.</th>
                <th id="cant">Cant</th>
                <th id="pret">Pret un.</th>
                <th id="valoare">Valoare</th>
                <th id="operatii" colspan="4">Operatii</th>
            </tr>
				<?php

				error_reporting(E_ALL);

				$sql = "SELECT * FROM facturi ORDER BY numar_factura";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo
                            '<tr>' . 
                                '<td id="id">' . $row["id"] . '</td>' . "\r\n" .
                                '<td id="serie">' . $row["serie"] . '</td>' . "\r\n" .
                                '<td>' . $row["numar_factura"] . '</td>' . "\r\n" .
                                '<td id="aviz">' . $row["aviz"] . '</td>' . "\r\n" .
                                '<td>' . $row["data"] . '</td>' . "\r\n" .
                                '<td>' . $row["nume"] . '</td>' . "\r\n" .
                                '<td id="nr_crt">' . $row["nr_crt"] . '</td>' . "\r\n" .
                                '<td>' . $row["prod"] . '</td>' . "\r\n" .
                                '<td>' . $row["um"] . '</td>' . "\r\n" .
                                '<td id="cant">' . $row["cant"] . '</td>' . "\r\n" .
                                '<td>' . $row["pret"] . '</td>' . "\r\n" .
                                '<td>' . $row["valoare"] . '</td>' . "\r\n" .
                                '<td><a href="editeaza_pozitii.php?id=' . $row[id] . '">Editeaza</a></td>' . "\r\n" .
                                '<td><a href="sterge_pozitie.php?id=' . $row[id] . '&addr=pozitii_facturi.php" onClick="return confirmare();">Sterge</a></td>' . "\r\n" .
                            '</tr>' . "\r\n" .
                            '<script type=\'text/javascript\'>
                            function confirmare() {
                            return confirm("Șterg factura ' . $row[numar_factura] . ' ' . $row[nume] . '?")
                                }
                            </script>'
                            ;
					}
				} else {
					echo "0 results";
				}

				$conn->close();

				?>
		</table>

<pre>


</pre>

</BODY>
</HTML>
 
