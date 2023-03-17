<!DOCTYPE html>
<HTML>
	<head>
        <title>Listă facturi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webparts/style.css">
		<style>
            body {max-width:fit-content; display: block; margin:auto;}
            #dropdown-content {background:none;}
            #dropdown-content a {color:#44f; font-size:0.75em; font-weight:bold; margin-top:8px;}
            #dropdown-content a:hover {background-color:yellow;}
            table {border:1px solid; font-size:14px; margin-bottom:50px;}
 			table th, table td {border-right:1px solid;}
			td {padding:10px 5px 0px;}
			#nr_crt {width:20px;}
			#cant, #serie, #aviz, #nr_crt {text-align:center;}
			tr:hover {background-color:#ddd;}
		</style>
	</head>


	
    <BODY>

        <?php include '../webparts/version.txt';?>

        <h1>Listă facturi</h1>

        <?php include '../webparts/topmenu.html';?>
        
        
        <div id="factura_noua" style="margin-top:75px; margin-bottom:30px;">   <!-- Tennivalo: Hover-nel legyen inline, nem fuggoleges-->
            <div id="dropdown">
                <button id="dropbtn">Factură nouă</button>
                <div id="dropdown-content">
                    <a href="../facturi/generator_factura_cu_chitanta.php">cu chitanță</a>
                    <a href="../facturi/generator_factura.php">fără chitanță</a>
                </div>
            </div>
            <a id="dropbtn" style="text-decoration:none; padding-left:25px;" href="../facturi/pozitii_facturi.php">Poziții facturi</a>
        </div>


        <table id="lista_facturi">
            
            <th id="serie">Serie</th>
            <th id="numar_factura">Numar</th>
            <th id="aviz">Aviz</th>
            <th id="data">Data</th>
            <th id="nume">Nume Client</th>
            <th id="total">Valoare</th>
            <th id="operatii" colspan="4">Operatii</th>
            
            <?php

            error_reporting(E_ALL);
            
            include '../webparts/conector.php';

            $sql = "SELECT serie, numar_factura, aviz, data, nume, SUM(valoare) AS total FROM facturi GROUP BY numar_factura ORDER BY numar_factura DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
//                  prepare date format
                    $datum = $row["data"];
                    $roman_datum = substr($datum, 8, 2) . '-' . substr($datum, 5, 2) . '-' . substr($datum, 0, 4);
                    echo
                        '<tr>' . 
                            '<td id="serie">' . $row["serie"] . '</td>' . "\r\n" .
                            '<td>' . $row["numar_factura"] . '</td>' . "\r\n" .
                            '<td id="aviz">' . $row["aviz"] . '</td>' . "\r\n" .
                            '<td>' . $roman_datum . '</td>' . "\r\n" .
                            '<td>' . $row["nume"] . '</td>' . "\r\n" .
                            '<td>' . $row["total"] . '</td>' . "\r\n" .
                            '<td><a href="editeaza_factura.php?numar_factura=' . $row[numar_factura] . '">Editeaza</a></td>' . "\r\n" .
                            '<td><a href="sterge_factura.php?numar_factura=' . $row[numar_factura] . '" onClick="return confirmare();">Sterge</a></td>' . "\r\n" .
                            '<td><a href="imprima_factura.php?numar_factura=' . $row[numar_factura] . ' &nume=' . $row[nume] . '" target="_blank">Imprima</a></td>' . "\r\n" .
                            '<td><a href="imprima_factura_cu_chitanta.php?numar_factura=' . $row[numar_factura] . ' &nume=' . $row[nume] . '" target="_blank">Imp. cu chitanță</a></td>' . "\r\n" .
                        '</tr>' . "\r\n" .
                        '<script type=\'text/javascript\'>
                        function confirmare() {
                        return confirm("Șterg factura?")
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
