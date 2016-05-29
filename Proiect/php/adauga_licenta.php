<?php

session_start();
error_reporting(0);

//Validare informatii primite prin post de la formular (adaugalicenta.html)

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['titlu'])){


        $data_missing[] = 'Titlu';

    }else{


        $titlu = $_POST['titlu'];

    }

    if(empty($_POST['descriere'])){


        $data_missing[] = 'Descriere';

    }else{


        $descriere = $_POST['descriere'];

    }

    //------------------------Posibile modificari aici--------------------------
    $tip_usr=$_SESSION['tip_cont'];
    $nume_usr=$_SESSION['nume'];
    //-------------------------------------------------------------------------

    //Upload fisier
    if(isset($_FILES['documentatie'])){

      $UploadName = $_FILES['documentatie']['name'];
      $UploadName = rand(1,100000).$UploadName;
      $UploadTemp = $_FILES['documentatie']['tmp_name'];
      $UploadType = $_FILES['documentatie']['type'];

      $UploadName = preg_replace("#[^a-z0-9.]#i","",$UploadName);

      if(!$UploadTemp){
        die("Nu a fost incarcat nici un fisier.");
      }else if($UploadType=="application/pdf"){
        move_uploaded_file($UploadTemp, "../upload/$UploadName");
        $cale_fisier="upload/$UploadName";
      }else{
        die("Fisierul trebuie sa fie de tip .pdf");
      }
    }

    //Stocare date din formular in baza de date
        if(empty($data_missing)){

            require_once('../mysqli_connect.php');

            if(strcmp ( $tip_usr , "1" )==0)//Profesor
            $query = "INSERT INTO licente (titlu, descriere, profesor, cale_fisier) VALUES (?, ?, ?, ?)";
            else if(strcmp ( $tip_usr , "2" )==0)//Firma
            $query = "INSERT INTO licente (titlu, descriere, firma, cale_fisier) VALUES (?, ?, ?, ?)";
            else if(strcmp ( $tip_usr , "3" )==0)//Student
            {echo "Nu aveti permisiunile necesare."; die();}

            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, "ssss", $titlu, $descriere,$nume_usr,$cale_fisier);

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

        } else {

            echo 'Nu ati introdus urmatoarele date:<br />';

            foreach($data_missing as $missing){

                echo "$missing<br />";


            }

            header("Location: ../aduagalicenta.php");
            die();

        }


}




//Redirect la home
header("Location: ../index.php");
die();
