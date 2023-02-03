<!DOCTYPE html>
<HTML>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lista clienti</title>
		<link rel="stylesheet" href="../webparts/style.css">
		<style>
			table {border:1px solid; font-size:14px; margin:auto;}
			tr {padding-bottom:10px;}
			#elso_sor td {border-bottom:1px solid;}
			td {padding-left:15px;}
			#id {width:25px;}
			#nume {min-width:100px; max-width:150px;}
			#cif {min-width:65px; max-width:80px;}
			#adresa {min-width:100px; max-width:350px;}
			#banca {min-width:75px; max-width:100px;}
			#cont_bancar {width:135px;}
			tr:hover {background-color:#ddd;}
		</style>
	</head>

	
	<BODY>


		<h1 style="text-align:center;"> Lista clienti </h1>

        <?php include '../webparts/topmenu.html';?>
        
        <div id="topmenu" style="width:115px; margin-left:170px;">
            <a href="client_nou.php">Client nou</a>
        </div>
        
        <?php include '../webparts/conector.php';?>

		<table style="margin-bottom:100px;">
			<tr id="elso_sor">
                <th hidden id="id">Nr<br>crt</th>
                <th id="nume">Nume client</th>
                <th id="reg_com">Reg. Com.</th>
                <th id="tva">TVA</th>
                <th id="cif">CIF</th>
                <th id="adresa">Adresa</th>
                <th id="banca">Banca</th>
                <th id="cont_bancar">Cont bancar</th>
                <th colspan="2">Functii</th>
            </tr>
				<?php

				error_reporting(E_ALL);

				$sql = "SELECT * FROM clienti ORDER BY nume";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo
						'<tr class="tobbi_sor">' . "\r\n" .  
						'<td hidden>' . $row["id"] . '</td>' . "\r\n" . 
						'<td>' . $row["nume"] . '</td>' . "\r\n" . 
						'<td>' . $row["reg_com"] . '</td>' . "\r\n" . 
						'<td>' . $row["tva"] . '</td>' . "\r\n" . 
						'<td>' . $row["cif"] . '</td>' . "\r\n" . 
						'<td id="adresa">' . $row["adresa"] . '</td>' . "\r\n" . 
						'<td>' . $row["banca"] . '</td>' . "\r\n" . 
						'<td id="cont_bancar">' . $row["cont_bancar"] . '</td>' . "\r\n" . 
						'<td id="editeaza">' . '<a href="editeaza_client.php?id=' . $row[id] . '">Editeaza</a>' . '</td>' . "\r\n" . 
						'<td id="sterge">' .  '<a href = "sterge_client.php?id=' . $row[id] . '" onClick="return confirmare();">Sterge</a>' . '</td>' . "\r\n" .
						'</tr>' . "\r\n" . 
'<script type=\'text/javascript\'>
function confirmare() {
return confirm("Șterg client?")
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





    </BODY>
</HTML>
