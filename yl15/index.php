<?php
	if (isset($_GET['otsi'])) {
		require_once "../includes/config.php";
		$otsi = $conn->real_escape_string($_GET['otsi']);
		$lapsed = 'SELECT L_nimi, Elukoht FROM SYNNID WHERE L_nimi LIKE "%'.$otsi.'%"';
		$resultLapsed = $conn->query($lapsed);
		
		if($conn->error){
			$viga = $conn->error;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ülesanne 15</title>
		<link rel="stylesheet" href="../includes/styles.css">
	</head>
	<body>
		<h1>Ülesanne 15. Ühenduse loomine andmebaasiga ja andmete kuvamine tabelist kasutades otsinguvormi.</h1>
		<h2>Otsing</h2>
		<form action="" method="get">
			<input type="text" name="otsi">
			<input type="submit" value="Otsi"> 
		</form>
			<?php
				if (isset($viga)) {
					echo "<p>$viga</p>";
				} elseif (isset($resultLapsed)) {
					if ($resultLapsed->num_rows > 0) {
						echo "<table><tr><th>Lapse nimi</th><th>Elukoht</th></tr>";
						while($row = $resultLapsed->fetch_assoc()) {
							echo "<tr><td>".$row['L_nimi']."</td><td>".$row['Elukoht']."</td></tr>";
						}
						echo "</table>";
					} else {
						echo "<p>Ei leidnud lapsi, andke andeks</p>";
					}
					$resultLapsed->free();
					$conn->close();
				}
			?>
		</table>
	</body>
</html>