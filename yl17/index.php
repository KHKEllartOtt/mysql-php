<?php
    require_once "../includes/config.php";
    //Andmete kuvamine
    $koik_lapsed = 'SELECT * FROM SYNNID';
	$result = $conn->query($koik_lapsed);
    
    //Andmete kustutamine
    if(!empty($_GET['kustutaID'])){
        $id = $_GET['kustutaID'];
        $paring = "DELETE FROM SYNNID WHERE L_id=".$id."";
        $conn->query($paring);
    }
?>
    <!DOCTYPE html>
    <html lang="et">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ülessane 17</title>
        <link rel="stylesheet" href="includes/style.css">
    </head>
    <body>
        <h1>Ülesanne 17. Andmete kustutamine andmebaasist</h1>
        <table>
            <tr>
                <th>Ema id</th>
                <th>Lapse nimi</th>
                <th>Elukoht</th>
				<th>Sünnikuupäev</th>
				<th>Sünniaeg</th>
				<th>Sünnikaal</th>
				<th>Sünnipikkus</th>
				<th>Sugu</th>
                <th>Kustuta</th>
            </tr>
			<?php
				while($row = $result->fetch_assoc()) {
				   echo "<tr>
							<td>".$row['Ema_id']."</td>
							<td>".$row['L_nimi']."</td>
							<td>".$row['Elukoht']."</td>
							<td>".$row['Synnikuupaev']."</td>
							<td>".$row['Synniaeg']."</td>
							<td>".$row['Synnikaal']."</td>
							<td>".$row['Synnipikkus']."</td>
							<td>".$row['Sugu']."</td>
							<td><a href='?kustutaID=".$row['L_id']."' onclick='return confirm(\"Oled kindel?\");' >Kustuta</a></td>
						</tr>";
				}
			?>
        </table>
        <?php $conn->close(); ?>
    </body>
</html>