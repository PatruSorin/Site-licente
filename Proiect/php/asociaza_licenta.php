<?php

//Obtinem id-ul licentei pentru care trebuie sa generam pagina
$str = $_SERVER['QUERY_STRING'];
$date = explode("-",$str);

//Introducem datele din vector in variabile cu nume mai explicite pentru comoditate
$id = $date[0];

//Rescriem numele pentru a avea formatarea corecta
$date = explode("%20",$date[1]);
$nume = $date[0] . " " . $date[1];

//Interogare baza de date si introducere informatii intr-un vector
require_once('../mysqli_connect.php');
$query = "UPDATE licente SET profesor= '$nume' WHERE id='$id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1){

    echo 'Date introduse cu succes';

    mysqli_stmt_close($stmt);

    mysqli_close($dbc);

} else {

    echo 'A intervenit o eroare<br />';
    echo mysqli_error();

    mysqli_stmt_close($stmt);

    mysqli_close($dbc);

}
