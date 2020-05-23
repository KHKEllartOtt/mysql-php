<?php
    require_once "../includes/config.php";
    //andmete kuvamine
    $query = 'SELECT L_nimi, Elukoht, L_id 
			FROM SYNNID
			WHERE L_nimi LIKE ? OR Elukoht LIKE ? OR L_id LIKE ?';
	$stmt = $conn->stmt_init();
	if(!$stmt->prepare($query)){
		$viga=$stmt->error;
	} else {
		$otsi = '%'.$_GET['otsi'].'%';
		$stmt->bind_param('ssi', $otsi, $otsi, $otsi);
        $stmt->bind_result($L_nimi, $Elukoht, $L_id);
		$stmt->execute();
	}
    //veateade
    if($conn->error){
        $viga = $conn->error;
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
	<form action="" method="get">
		<input type="text" name="otsi">
		<input type="submit" value="otsi">
	</form>
    <?php
        //kuvame päringu vastuse
        while($stmt->fetch()) {
            echo $L_nimi.' '.$Elukoht.' - '.$Synnikuupaev.
            ' <strong><a href="kustuta.php?kustuta=1&L_id='.$L_id.'">kustuta</a> 
            | <a href="muuda.php?muuda=1&L_id='.$L_id.'">muuda</a></strong><br>';
        }
    ?>
    <?php $conn->close(); ?>
</body>
</html>