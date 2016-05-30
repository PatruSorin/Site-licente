<?php

error_reporting(0);
session_start();

 $tip_usr=$_SESSION['tip_cont'];

//TO DO: Verifica daca a fost cautat ceva prin post si realizeaza un query (functia de search a site-ului)

//Conectare la baza de date si realizare queriy
require_once('mysqli_connect.php');//pozitia fisierului este luata relativ la listalicente.html (.php in cazul nostru)
$query = "SELECT id,titlu, descriere, cale_fisier, profesor, firma, student FROM licente";
$response = @mysqli_query($dbc, $query);
$rowcount = mysqli_num_rows($response);

if(isset($_SESSION['username'])) {
//Daca sa executat query-ul corect
    if ($response && $rowcount != 0) {
        // Creare lista pentru Profesori
        if (strcmp($tip_usr, "1") == 0) {
            echo '<table
                cellspacing="5" cellpadding="8">
                <tr><td><b>Titlu</b></td>
                <td><b>Firma</b></td>
                <td><b>Documentatie</b></td>
                </tr>';

            while ($row = mysqli_fetch_array($response)) {
                if (strcmp($row['profesor'], "") == 0) {
                    echo '<tr><td>' .
                        $row['titlu'] . '</td><td>' .
                        $row['firma'] . '</td><td>' .
                        '<form action="php\pagina_licenta.php?' . $row['id'] . '" method="post"><input type="submit" value="Detalii" name="submit"></form>' .
                        '</td>';
                    echo '</tr>';
                }

            }
            echo '</table>';


        }
        // Creare lista pentru Studenti si Firme

        if (strcmp($tip_usr, "2") == 0 || strcmp($tip_usr, "3") == 0) {

            echo '<table
        cellspacing="5" cellpadding="8">

        <tr><td><b>Titlu</b></td>
        <td><b>Profesor</b></td>
        <td><b>Firma</b></td>
        <td><b>Documentatie</b></td>
        </tr>';

            while ($row = mysqli_fetch_array($response)) {
                if (strcmp($row['profesor'], "") != 0 && strcmp($row['student'], "") == 0) {
                    echo '<tr><td>' .
                        $row['titlu'] . '</td><td>' .
                        $row['profesor'] . '</td><td>' .
                        $row['firma'] . '</td><td>' .
                        '<form action="php\pagina_licenta.php?' . $row['id'] . '" method="post"><input type="submit" value="Detalii" name="submit"></form>' .
                        '</td>' ;

                    echo '</tr>';
                }
            }
            echo '</table>';


        }
    } else
        echo '<p>Nu exista licente.</p>';
}
else
    echo '<p>Nu sunteti logat.</p>';

