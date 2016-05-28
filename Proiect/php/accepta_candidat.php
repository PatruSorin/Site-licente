<?php
//TO DO: Metoda care determina ce tip de utilizator a dat submit la form
class info{

function tip_cont(){return "1";}
function nume(){return "Stupariu Sorin";}

}
$a= new info;

 $tip_usr=$a->tip_cont();

 //Conectare la baza de date si realizare queriy
 require_once('../mysqli_connect.php');//pozitia fisierului este luata relativ la listalicente.html (.php in cazul nostru)
 $query = "SELECT id,	titlu, descriere, cale_fisier, profesor, firma, student FROM licente";
 $response = @mysqli_query($dbc, $query);

 //Daca sa executat query-ul corect
 if($response){
       // Creare lista pentru Profesori
       if(strcmp ( $tip_usr , "1" )==0){


                 echo '<table align="left"
                 cellspacing="5" cellpadding="8">

                 <tr><td align="left"><b>Titlu</b></td>
                 <td align="left"><b>Firma</b></td>
                 <td align="left"><b>Documentatie</b></td>
                 </tr>';

                 while($row = mysqli_fetch_array($response)){
                   if(strcmp ( $row['profesor'] , $a->nume() )==0){
                       echo '<tr><td align="left">' .
                       $row['titlu'] . '</td><td align="left">' .
                       $row['firma'] . '</td><td align="left">' .
                       '<form action="lista_aplicanti.php?' . $row['id'] . '" method="post"><input type="submit" value="Candidati" name="submit"></form>' .
                       '</td><td align="left">' .
                       '<td align="left">';
                       echo '</tr>';
                   }

                 }
                 echo '</table>';


       }

 }
