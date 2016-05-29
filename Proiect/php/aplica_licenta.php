<?php

//Obtinem id-ul licentei pentru care trebuie sa generam pagina

error_reporting(0);
$str = $_SERVER['QUERY_STRING'];
$date = explode("-",$str);

//Introducem datele din vector in variabile cu nume mai explicite pentru comoditate
$id = $date[0];

//Rescriem numele pentru a avea formatarea corecta
$date = explode("%20",$date[1]);
$nume = $date[0] . " " . $date[1];

require_once('../mysqli_connect.php');

//Verificam daca exista un tabel pentru aplicantii de la licenta cu id-ul x
  $query = "SHOW TABLES LIKE '%$id'";
  $response = @mysqli_query($dbc, $query);
  $tableExists = is_null(mysqli_fetch_array($response)) > 0;

$nume_tabel= "licenta_".$id;

//Daca nu exista cream tabelul
if($tableExists){
    $query = "CREATE TABLE $nume_tabel (
            id INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            nume_aplicant TEXT NOT NULL
            )";

            if ($dbc->query($query) === TRUE) {
                echo "Tabel creat cu succes";
            } else {
                echo "Eroare: " . $dbc->error;
            }
}

//Verificam daca studentul a aplicat deja la aceasta licenta
 $query = "SELECT * FROM $nume_tabel WHERE nume_aplicant = '$nume'";
 $response = @mysqli_query($dbc, $query);
$exista_nume = is_null(mysqli_fetch_array($response)) > 0 ? 'yes' : 'no';

if(strcmp ( $exista_nume , "yes" )==0) {
      //Adauga numele studentului la lista de aplicanti pentru licenta cu id-ul X
      $query = "INSERT INTO $nume_tabel (nume_aplicant) VALUES ('$nume')";

      if ($dbc->query($query) === TRUE) {
          echo "Date introduse cu succes.";
      } else {
          echo "Eroare: " . $dbc->error;
      }
}





$dbc->close();
