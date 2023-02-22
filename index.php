<!DOCTYPE html>
<HTML>
	<head>
		<title>NBS - Network Billing Software</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
            html {display:table; margin: auto;}
            body {border:1px solid; width:450px; height:800px;}
            h1, h3 {text-align:center;}
            h1 {font-size:2.5em;}
            h3 {font-size:1.5em;}
            table {margin:auto; border-spacing:0 35px; width:65%; margin-top:30px;}
            td {border:1px solid; text-align:center; height:75px; font-size:2em; background-color:orange; border-radius:15px; color:#44f; font-weight:bold;}
            td a {text-decoration: none;}
		</style>
    </head>

    
    <body>
    
        <h1>NBS</h1>
        
        <h3>Network Billing Software</h3>
        
        <table>
            <tr><td><a href="facturi/lista_facturi.php">Facturi</a></td></tr>
            <tr><td><a href="chitante/lista_chitante.php">Chitanțe</a></td></tr>
            <tr><td><a href="clienti/lista_clienti.php">Clienți</a></td></tr>
            <tr><td><a href="config/editeaza_cine_sunt.php">Setări</a></td></tr>
        </table>
        
        <div style="text-align:center;"><span><?php include 'webparts/version.txt';?></span></div>
        <div style="text-align:center;"><span>&#169;Copyright: Bocskai Csaba Intreprindere Individuala</span></div>
        
    </body>
</html>
