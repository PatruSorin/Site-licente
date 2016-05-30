<?php
error_reporting(0);
require_once('mysqli_connect.php');
$tip_cont = $_SESSION['tip_cont'];
$user_one = $_SESSION['username'];
$nume_cont = $_SESSION['nume'];


if(isset($_SESSION['username'])) {
    $query = "SELECT c.id,u.username,u.email
 FROM conversatie c, utilizatori u
 WHERE
 (CASE
 WHEN c.user_one = '$user_one'
 THEN c.user_two = u.username
 WHEN c.user_two = '$user_one'
 THEN c.user_one= u.username
 END)
 AND (
 c.user_one ='$user_one'
 OR c.user_two ='$user_one'
 )
 Order by c.id DESC Limit 20";
// or die(mysql_error());
    $response = @mysqli_query($dbc, $query);
    $rowcount = mysqli_num_rows($response);
    if ($rowcount != 0) {
        echo '<table align="left"
                cellspacing="5" cellpadding="8">

                <tr><td align="left"><b>ID</b></td>
                <td align="left"><b>User 1</b></td>
                <td align="left"><b>User 2</b></td>
                <td align="left"><b>Detalii</b></td>
                </tr>';
        while ($row = mysqli_fetch_array($response)) {
            $c_id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $cquery = "SELECT R.cr_id,R.reply FROM conversatie_reply R WHERE R.c_id_fk='$c_id' ORDER BY R.cr_id DESC LIMIT 1"; // or die(mysql_error());
            $response2 = @mysqli_query($dbc, $cquery);
            //$crow=mysqli_fetch_array($response2);
            //$cr_id=$crow['cr_id'];
            //$reply=$crow['reply'];


            while ($crow = mysqli_fetch_array($response2)) {
                echo '<tr><td align="left">' .
                    $crow['cr_id'] . '</td><td align="left">' .
                    $user_one . '</td><td align="left">' .
                    $username . '</td><td align="left">' .
                    '<form action="php\pm_detalii.php?' . $crow['cr_id'] . '" method="post"><input type="submit" value="Detalii" name="submit"></form>' .
                    '</td><td align="left">' .
                    '<td align="left">';
                echo '</tr>';

            }

//HTML Output.
        }
        echo '</table>';
        echo '<br>';
    } else if (strcmp($tip_cont, "3") == 0) {

        $squery = "SELECT * FROM licente l WHERE l.student='$nume_cont' ";
        $response3 = @mysqli_query($dbc, $squery);
        $rowcount2 = mysqli_num_rows($response3);
        $row = mysqli_fetch_array($response3);
        if ($rowcount2 == 1) {
            $pstring = explode(" ", $row['profesor']);
            //echo "<script type='text/javascript'>alert('$pstring[1]');</script>";
            $pquery = "SELECT * FROM utilizatori u WHERE u.nume = '$pstring[0]' AND u.prenume = '$pstring[1]' ";
            $response4 = @mysqli_query($dbc, $pquery);
            $row = mysqli_fetch_array($response4);
            $profesor = $row['username'];

            echo '<p>Nu exista conversatii.</p>';
            echo '<p>Deschide o conversatie cu profesorul ' . $profesor . '</p>' . '<form action="php\pm_nou.php?' . $profesor . '" method="post"><input type="submit" value="Contacteaza" name="submit"></form>';
        } else {
            echo '<p>Nu sunteti asociat unei licente.</p>';
        }

    }
}
else
    echo '<p>Nu sunteti logat.</p>';
?>
