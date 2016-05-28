<?php

//Obtinem id-ul licentei pentru care trebuie sa generam pagina
$str = $_SERVER['QUERY_STRING'];

//Introducem datele din vector in variabile cu nume mai explicite pentru comoditate
$id = $str[0];

require_once('../mysqli_connect.php');

$table ='licenta_'.$id;

$query = "SELECT nume_aplicant FROM $table";
$response = @mysqli_query($dbc, $query);
 if($response){
echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr>
<td align="left"><b>Aplicant</b></td>
<td align="left"><b>Acepta aplicant</b></td>
</tr>';

while($row = mysqli_fetch_array($response)){

      echo '<tr><td align="left">' .
      $row['nume_aplicant'] . '</td><td align="left">' .
      '<form action="accepta_aplicant.php?' . $id.'-'.$row['nume_aplicant'] . '" method="post"><input type="submit" value="Candidati" name="submit"></form>' .
      '</td><td align="left">' .
      '<td align="left">';
      echo '</tr>';


}
echo '</table>';
}
