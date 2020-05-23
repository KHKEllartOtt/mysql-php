<?php require_once "../includes/config.php"; ?>
<?php
//muutmise kuvamine
if (isset($_GET['muuda']) && isset($_GET['L_id'])) {
	$query= 'SELECT L_id,L_nimi,Elukoht,Synnikuupaev FROM SYNNID WHERE L_id=?';
	$stmt = $conn->stmt_init();

	if(!$stmt->prepare($query)){
		$viga=$stmt->error; 
	} else {
		$stmt->bind_param('i', $_GET['L_id']);
		$stmt->bind_result($L_id, $L_nimi, $Elukoht, $Synnikuupaev);
		$stmt->execute();
		$stmt->fetch();
	}
//päring andmete muutmiseks andmebaasis
} elseif (isset($_GET['muudanyyd']) && isset($_GET['L_id'])) {
	$query= 'UPDATE SYNNID SET L_nimi=?,Elukoht=?,Synnikuupaev=? WHERE L_id=?';
	$stmt = $conn->stmt_init();
	if(!$stmt->prepare($query)){
		$viga=$stmt->error; 
	} else {
		$stmt->bind_param('sssi', $_GET['L_nimi'],$_GET['Elukoht'],$_GET['Synnikuupaev'],$_GET['L_id']);
		$stmt->execute();
		header("Location: index.php");
	}
}else{
   echo "Probleem";
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülesanne 18</title>
</head>
<body>
    <h1>Ülesanne 18. Järjehoidjate kasutamine SQL-käskudes andmete lisamisel, muutmisel ja kustutamisel andmebaasis</h1>
   <h2>Andmete muutmine</h2>
    <form action="" method="get">
        <input type="text" name="L_id" value="<?php echo $L_id; ?>" hidden><br>
        Eesnimi <input type="text" name="L_nimi" value="<?php echo $L_nimi; ?>"><br>
        Perenimi <input type="text" name="Elukoht" value="<?php echo $Elukoht; ?>"><br>
        Sünnikuupäev <input type="text" name="Synnikuupaev" value="<?php echo $Synnikuupaev; ?>"><br>
        <input type="submit" value="Muuda" name="muudanyyd">
    </form>
    <?php $conn->close(); ?>
</body>
</html>