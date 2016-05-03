<?php

//TO DO: Metoda care determina ce tip de utilizator a dat submit la form
class info{

function tip_cont(){return "2";}
function nume(){return "4psa";}

}
//Validare informatii primite prin post de la formular (adaugalicenta.html)

$a= new info;

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
    $tip_usr=$a->tip_cont();
    $nume_usr=$a->nume();
    //-------------------------------------------------------------------------

  
    //Stocare date din formular in baza de date
        if(empty($data_missing)){

            require_once('../mysqli_connect.php');

            if(strcmp ( $tip_usr , "1" )==0)//Profesor
            $query = "INSERT INTO licente (titlu, descriere, profesor) VALUES (?, ?, ?)";
            else if(strcmp ( $tip_usr , "2" )==0)//Firma
            $query = "INSERT INTO licente (titlu, descriere, firma) VALUES (?, ?, ?)";
            else if(strcmp ( $tip_usr , "3" )==0)//Student
            {echo "Nu aveti permisiune"; die();}

            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, "sss", $titlu, $descriere,$nume_usr);

            mysqli_stmt_execute($stmt);

            $affected_rows = mysqli_stmt_affected_rows($stmt);

            if($affected_rows == 1){

                echo 'Date introduse cu succes';

                mysqli_stmt_close($stmt);

                mysqli_close($dbc);
                sleep(5);
            } else {

                echo 'A intervenit o eroare<br />';
                echo mysqli_error();

                mysqli_stmt_close($stmt);

                mysqli_close($dbc);
                sleep(5);
            }

        } else {

            echo 'Nu ati introdus urmatoarele date:<br />';

            foreach($data_missing as $missing){

                echo "$missing<br />";


            }
            sleep(5);
            header("Location: ../aduagalicenta.html");
            die();

        }


}




//Redirect la home
header("Location: ../index.html");
die();
