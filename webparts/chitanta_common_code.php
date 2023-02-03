

<table id="chitanta">
    <tr>
        <td style="width:50%; padding-right:15px;">
            <?php
                $sql = "SELECT * FROM cine_sunt WHERE id=1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                <b>Furnizor</b>:<br>
                <?php echo $row["nume"] ?> <br>
                <b>Nr ORC</b>: 
                <?php echo $row["reg_com"] ?> <br>
                <b>CIF</b>: 
                <?php echo $row["cif"] ?> <br>
                <b>Sediu</b>: 
                <?php echo $row["adresa"] ?> <br>
            <?php
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </td>
        
        <!-- Prepare serie & numar chitanta -->

        <?php
        $sql_date_chitanta = "SELECT serie_chit, nr_chit, data_chit FROM chitante WHERE numar_factura = $numar_factura";
        $result = $conn->query($sql_date_chitanta);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
        <td id="date_chitanta">
            <h3>Chitanța Serie, Nr: 
            <input type="text" size="5" name="betuzve" style="line-height:14px; border:1px;" value="<?php echo $row["serie_chit"] . '&nbsp;' . $row["nr_chit"]; ?>"></h3> 
            
            <b>Data</b>: 
            <input type="text" size="10" name="betuzve" style="line-height:14px; border:1px;" value="<?php echo substr($row["data_chit"], -2, 2) . '-' . substr($row["data_chit"], -5, 2) . '-' . substr($row["data_chit"], 0, 4) ; ?>">
        <?php
            }
				} else {
					echo "0 results";
				}
			$conn->close();
        ?>
        </td>
    </tr>
    <tr>
        <td id="date_client_chitanta" style="width:60%;">
<!--             A kovetkezokben emlitett $myArray a factura_common_code.php-ben van feltoltve -->
            Am încasat de la <?php echo $myArray[0][1]; ?> <br>
            Nr ORC/an: <?php echo $myArray[0][2]; ?> <br>
            CIF: <?php echo $myArray[0][4]; ?><br>
            Adresa: <?php echo $myArray[0][5]; ?> <br>

           
          
<?php
include 'conector.php';
$sql_val_chit = "SELECT val_chit, serie_factura, numar_factura FROM chitante WHERE numar_factura = $numar_factura";
$result = $conn->query($sql_val_chit);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
?>
            Suma de: <b> <?php echo number_format($row["val_chit"], 2, ',', '.'); ?> </b> lei <br>
            <input type="text" size="50" name="betuzve" style="line-height:14px; border:1px solid;"> <br>
            reprezentând contravaloare factură <b> <?php echo $row['serie_factura']; ?> <?php echo $row['numar_factura']; ?> </b>
<?php
            }
				} else {echo "0 results";}

				$conn->close();

				?>

        </td>
  
        <td style="text-align:right; padding-right:30px;">
            Semnătură și ștampilă
        </td>
    </tr>
</table>
