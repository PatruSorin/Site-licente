<?php
if(isset($_POST['submit'])) {

    //Verificare existenta informatii

    $data_missing = array();

    if (empty($_POST['username'])) {


        $data_missing[] = 'Username';

    } else {


        $username = $_POST['username'];

    }

    if (empty($_POST['password'])) {


        $data_missing[] = 'Parola';

    } else {


        $password = $_POST['password'];

    }

    if (empty($data_missing)) {

        require_once('../mysqli_connect.php');

        //protectic sql injection
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($dbc, $username);
        $password = mysqli_real_escape_string($dbc, $password);

        //cautare username si parola in bd
        $query = "SELECT * FROM utilizatori WHERE username='$username' and parola='$password'";
        $response = @mysqli_query($dbc, $query);
        if ($response) {
            //daca a fost realizat query-ul verificam ca nr de linii returnat sa fie 1 => un utilizator gasit
            $rowcount = mysqli_num_rows($response);
            $row = mysqli_fetch_array($response);
            if ($rowcount == 1) {
                //setare variabile de sesiune
                session_start();
                $_SESSION['tip_cont'] = $row['tip_cont'];
                if (strcmp($row['tip_cont'], '2') == 0)
                    $_SESSION['nume'] = $row['nume'];
                else {
                    $_SESSION['nume'] = $row['nume'] . ' ' . $row['prenume'];
                }
            }
            else
            {
                echo 'Combinatia username/parola nu a fost gasita<br />';
            }
        }
        else
        {
            echo 'A intervenit o eroare<br />';
        }

    } else {

        echo 'Nu ati introdus urmatoarele date:<br />';

        foreach ($data_missing as $missing) {

            echo "$missing<br />";
            sleep(5);
            header("Location: ../login.html");
            die();

        }
    }
}

header("Location: ../index.html");
die();