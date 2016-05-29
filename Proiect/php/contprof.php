<?php

session_start();
error_reporting(0);
require_once('../mysqli_connect.php');

//Validare informatii primite prin post de la formular (adaugalicenta.html)


    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $email = $_POST['mail'];
    $facultate = $_POST['facultate'];
    $materie = $_POST['materie'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $tip_cont = 1;
    $data = $_POST['year'] . "-" . $_POST['Month'] . "-" . $_POST['day'];

    echo "<script type='text/javascript'>alert('$data');</script>";

    $query = "SELECT * FROM utilizatori WHERE username='$username'";
    $response = @mysqli_query($dbc, $query);
    $rowcount = mysqli_num_rows($response);

    if ($rowcount == 0) {

        if (strcmp($password, $password2) == 0) {


                $query = "INSERT INTO utilizatori (nume, prenume, email, data, facultate, materie, username, parola, tip_cont ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, "ssssssssi", $nume, $prenume, $email, $data, $facultate, $materie, $username, $password, $tip_cont);

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
            header("Location: ../crearecontprof.html");
            die();
        }
    }
    else
    {
        echo "Username-ul introdus exista deja.";
        header("Location: ../crearecontprof.html");
        die();
    }






//Redirect la home
//header("Location: ../index.php");
die();
