<html>
<?php

//TO DO: Metoda care determina ce tip de utilizator a dat submit la form
class info{

function tip_cont(){return "1";}

}
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
      //TO DO: Verificari mai amanuntite pentru documentatie
    if(empty($_POST['documentatie'])){


        $data_missing[] = 'Documentatie';

    }else{


        $documentatie = $_POST['documentatie'];

    }
//Stocare date din formular in baza de date
    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO licente (titlu, descriere) VALUES (?, ?)";

        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ss", $titlu, $descriere);

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

        echo 'Nu ati introdus urmatoarele date<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";


        }

    }

}


//TO DO: Salvare fisier uploadat in folderul /documentatie_licente

//Redirect la home
header("Location: ../index.html");
die();
?>
</html>
