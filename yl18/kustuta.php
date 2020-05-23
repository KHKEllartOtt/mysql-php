<?php
header("Location: index.php");
?>
<?php
    require_once "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP</title>
</head>
<body>
    <h1><?php
header("Location: index.php");
?>
<?php
    require_once "../includes/config.php";
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
    <?php
    //muutmise kuvamine
    if (isset($_GET['kustuta']) && isset($_GET['L_id'])) {
        $query= 'DELETE FROM SYNNID WHERE L_id=?';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($query)){
            $viga=$stmt->error; 
        } else {
            $stmt->bind_param('i', $_GET['L_id']);
            $stmt->execute();
            header("Location: index.php"); 
        }
    }else{
       echo "Probleem";
    }
    ?>
	<?php $conn->close(); ?>
</body>
</html></h1>
    <?php
    //muutmise kuvamine
    if (isset($_GET['kustuta']) && isset($_GET['L_id'])) {
        $query= 'DELETE FROM SYNNID WHERE L_id=?';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($query)){
            $viga=$stmt->error; 
        } else {
            $stmt->bind_param('i', $_GET['L_id']);
            $stmt->execute();
            header("Location: index.php"); 
        }
    }else{
       echo "Probleem kustutamisega";
    }
    ?>
	<?php $conn->close(); ?>
</body>
</html>