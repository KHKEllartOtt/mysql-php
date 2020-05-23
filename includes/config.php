<?php
    @$conn = new mysqli('localhost', 'ottellar_testija', 'parool', 'ottellar_abis118');
    if (mysqli_connect_errno()) {
        printf("Oi oi: %s\n", mysqli_connect_error());
        exit();
    }
	$conn->set_charset('utf8');
	date_default_timezone_set('Europe/Tallinn');
?>