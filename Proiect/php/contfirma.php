<?php

session_start();
error_reporting(0);
require_once('../mysqli_connect.php');

//Validare informatii primite prin post de la formular (adaugalicenta.html)


$nume = $_POST['nume'];
$email = $_POST['mail'];
$oras = $_POST['oras'];
$specializare = $_POST['specializare'];
$cui = $_POST['cui'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$tip_cont = 2;
$data = $_POST['year'] . "-" . $_POST['Month'] . "-" . $_POST['day'];

echo "<script type='text/javascript'>alert('$data');</script>";

$query = "SELECT * FROM utilizatori WHERE username='$username'";
$response = @mysqli_query($dbc, $query);
$rowcount = mysqli_num_rows($response);

if ($rowcount == 0) {

    if (strcmp($password, $password2) == 0) {


        $query = "INSERT INTO utilizatori (nume, email, data, oras, specializare, cui, username, parola, tip_cont ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssssissi", $nume, $email, $data, $oras, $specializare, $cui, $username, $password, $tip_cont);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if ($affected_rows == 1) {

            echo 'Contul a fost creat cu succes.';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'A intervenit o eroare<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

        header("Location: ../index.php");
        die();


    }
    else {
        echo "Parolele introduse nu coincid.";
        //header("Location: ../crearecontstud.html");
        die();
    }
}
else
{
    echo "Username-ul introdus exista deja.";
    //header("Location: ../crearecontstud.html");
    die();
}






//Redirect la home
//header("Location: ../index.php");
die();
