<?php
	require_once "../includes/config.php";
	$lapsed = 'SELECT L_nimi, Synniaeg, Elukoht FROM SYNNID';
	$resultLapsed = $conn->query($lapsed);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ülesanne 14</title>
		<link rel="stylesheet" href="../includes/styles.css">
	</head>
	<body>
		<h1>Ülesanne 14. Ühenduse loomine andmebaasiga ja andmete kuvamine tabelist</h1>
		<h2>LAPSED tabel</h2>
		<table>
			<tr>
				<th>Lapse nimi</th>
				<th>Sünniaeg</th>
				<th>Elukoht</th>
			</tr>
			<?php
				while($row = $resultLapsed->fetch_assoc()) {
					echo "<tr><td>".$row['L_nimi']."</td><td>".$row['Synniaeg']."</td><td>".$row['Elukoht']."</td></tr>";
				}
				$resultLapsed->free();
			?>
		</table>
		<?php $conn->close(); ?>
	</body>
</html>