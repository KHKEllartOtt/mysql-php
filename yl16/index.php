<?php
	
	require_once "../includes/config.php";
		
	$emaQuery = 'SELECT Ema_id, Ema_nimi FROM EMAD';
	$emad = $conn->query($emaQuery);
	
	$lnimi = $_GET['nimi'];
	$sugu = $_GET['sugu'];
	$synnikpv = $_GET['synnipaev'];
	$elukoht = $_GET['elukoht'];
	$synniaeg = $_GET['synniaeg'];
	$synnikaal = $_GET['synnikaal'];
	$synnipikkus = $_GET['synnipikkus'];
	$emaId = $_GET['eid'];
	
	$koikOlemas = isset($_GET['nimi']) && isset($_GET['sugu']) && isset($_GET['synnipaev']) && isset($_GET['elukoht']) && isset($_GET['synniaeg']) && isset($_GET['synnikaal']) && isset($_GET['synnipikkus']) && isset($_GET['eid']);
	if ($koikOlemas) {
		
		$kasOlemas = 'SELECT * FROM LAPSED WHERE Ema_id="'.$emaId.'" AND Sünnikuupaev="'.$synnikpv.'" AND L_nimi="'.$lnimi.'" AND Elukoht="'.$elukoht.'" AND Synniaeg="'.$synniaeg.'" AND Synnikaal="'.$synnikaal.'" AND Synnipikkus="'.$synnipikkus.'" AND Sugu="'.$sugu.'"';
		$result = mysqli_query($conn, $kasOlemas);
		$data = mysqli_fetch_array($result, MYSQLI_NUM);
		
		if ($data[0] > 1) {
			echo "Selline laps juba sisestati!";
		} else {
		
			$paring = "INSERT INTO SYNNID(Synnikuupaev, Ema_id, L_nimi, Elukoht, Synniaeg, Synnikaal, Synnipikkus, Sugu) 
					VALUES ('".$synnikpv."', '".$emaId."', '".$lnimi."', '".$elukoht."', '".$synniaeg."', '".$synnikaal."', '".$synnipikkus."', '".$sugu."')";
			//saadame päringu teele
			$conn->query($paring);

			if ($conn->error) {
				$viga = $conn->error;
				echo "<p>$viga</p>";
			}

			echo "Lisatud ridu: ".$conn->affected_rows."<br>";
			echo "Viimati lisatud ID".$conn->insert_id;
			$conn->close();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ülesanne 16</title>
		<link rel="stylesheet" href="../includes/styles.css">
	</head>
	<body>
		<h1>Ülesanne 16. Andmete sisestamine andmebaasi (vormi loomine ja andmete saatmine andmetabelisse)</h1>
		<h2>Uue lapse lisamine</h2>
		<div id="saada">
			<form action="" method="get">
				Sugu:<select name="sugu" required>
					<option value="p">Poiss</option>
					<option value="t">Tüdruk</option>
				</select>
				<div>Sünnikuupäev:<input type="date" name="synnipaev" required></div>
				Lapse nimi:<input type="name" name="nimi" required>
				Lapse elukoht:<input type="name" name="elukoht" required>
				Lapse sünniaeg:<input type="time" id="synniaeg" name="synniaeg" required>
				Lapse sünnikaal:<input type="number" id="synnikaal" name="synnikaal" required>
				Lapse sünnipikkus:<input type="number" id="synnipikkus" name="synnipikkus" required>
				Ema id:
				<select name="eid" id="eid">
					<?php
						while($row = $emad->fetch_assoc()) {
							echo '<option value="'.$row['Ema_id'].'">'.$row['Ema_nimi'].'</option>';
						}
						$emad->free();
						$conn->close();
					?>
				</select>
				<div>
					<input type="submit" value="saada"> 
					<input type="reset" value="tühjenda">
				</div>
			</form>
		</div>
	</body>
</html>