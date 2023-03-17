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
			tr:hover {background-color:#ddd;}
			td, th {padding:5px 10px; text-align:center;}
			#nume_client {text-align:left;}
			#imprima {border-right:none;}
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
			
			<th id="serie_chit">Serie și <br /> Număr</th>
            <th id="data_chit">Data</th>
            <th id="val_chit">Valoare</th>
            <th id="nume">Client</th>
            <th id="factura">Serie și Nr. <br /> Factură</th>
            <th id="operatii" colspan="4">Operații</th>
            
				<?php

				error_reporting(E_ALL);

				$sql = "
                    select a.serie_chit, a.nr_chit, a.data_chit, a.val_chit, a.serie_factura, a.numar_factura, b.numar_factura, b.nume
                    from chitante a
                    inner join facturi b on a.numar_factura = b.numar_factura
                    group by nr_chit order by nr_chit desc;";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
//                      prepare date format
                        $datum = $row["data_chit"];
                        $roman_datum = substr($datum, 8, 2) . '-' . substr($datum, 5, 2) . '-' . substr($datum, 0, 4);
						echo
                            '<tr>' . 
                                
                                '<td id="chitanta">' . $row["serie_chit"] . " " . $row["nr_chit"] . '</td>' . "\r\n" .
                                '<td>' . $roman_datum . '</td>' . "\r\n" .
                                '<td id="val_chit">' . $row["val_chit"] . '</td>' . "\r\n" .
                                '<td id="nume_client">' . $row["nume"] . '</td>' . "\r\n" .
                                '<td>' . $row["serie_factura"] . " " . $row["numar_factura"] . '</td>' . "\r\n" .
                                '<td><a href="editeaza_chitanta.php?nr_chit=' . $row[nr_chit] . '">Editeaza</a></td>' . "\r\n" .
                                '<td><a href="sterge_chitanta.php?nr_chit=' . $row[nr_chit] . '" onClick="return confirmare();">Sterge</a></td>' . "\r\n" .
                                '<td id="imprima"><a href="imprima_chitanta.php?numar_factura=' . $row[numar_factura] . '&cumparator=' . $row[nume] . '" target="_blank">Imprima</a></td>' . "\r\n" .
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
