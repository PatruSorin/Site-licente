<?php

//Obtinem id-ul licentei pentru care trebuie sa generam pagina
$id=$_SERVER['QUERY_STRING'];

//Interogare baza de date si introducere informatii intr-un vector
require_once('../mysqli_connect.php');
$query = "SELECT cale_fisier FROM licente WHERE id='$id'";
$response = @mysqli_query($dbc, $query);

$row = mysqli_fetch_array($response);

header('Content-disposition: attachement; filename=Documentatie.pdf');
header('Content-type: application/pdf');
readfile('../'.$row['cale_fisier']);
