<?php
error_reporting(0);
require_once('mysqli_connect.php');
$tip_cont = $_SESSION['tip_cont'];
$user_one = $_SESSION['username'];
$nume_cont = $_SESSION['nume'];


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <title>LICENTE FMI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta  charset="UTF-8">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
<div id="header_all" class="row">
    <div id="header">
        <div id="logo">
            <a href="index.php" title="LicenteFMI"><img src="img/fmi.png" alt=" " /></a>
        </div>

        <div id="quickLinks">
            <div id="header_links">';
                if(isset($_SESSION['username'])) {
                    echo '<a href="php/logout.php"  title="Delogheaza-te">Logout</a>';
                }
                else {
                    echo '<a href="login.php"  title="Logheaza-te">Login</a>';
                }
                echo '
            </div>
        </div>

        <br/>

        <ul id="mainMenu">
            <li><a href="index.php"  title="index">Home</a></li>
            <li><a href="despre.php"  title="despre">despre</a></li>
            <li><a href="listalicente.php"  title="licente">Lista licente</a></li>
            <li><a href="contact.php"  title="contact">contact</a></li>
            <li><a href="chat.php" title="chat">Chat</a></li>
        </ul>
    </div>
</div>

<div id="wrapper_all" class="row">
    <div id="wrapper" class="col-sm-10">
        <div id="content">';



if (strcmp($tip_cont, "1") == 0) {
    $pquery = "SELECT * FROM licente l WHERE l.profesor='$nume_cont' AND l.student IS NOT NULL";
    $presponse = @mysqli_query($dbc, $pquery);
    $prowcount = mysqli_num_rows($presponse);
//$row = mysqli_fetch_array($presponse);
//echo "<script type='text/javascript'>alert('" . $row['student'] . "');</script>";
    if ($prowcount > 0) {
        while ($row = mysqli_fetch_array($presponse)) {

            $sstring = explode(" ", $row['student']);
            //echo "<script type='text/javascript'>alert('$pstring[1]');</script>";
            $squery = "SELECT * FROM utilizatori u WHERE u.nume = '$sstring[0]' AND u.prenume = '$sstring[1]' ";
            $response5 = @mysqli_query($dbc, $squery);
            $srow = mysqli_fetch_array($response5);
            $student = $srow['username'];

            echo '<p>Deschide o conversatie cu studentul ' . $row['student'] . '</p>' . '<form action="php\pm_nou.php?' . $student . '" method="post"><input type="submit" value="Contacteaza" name="submit"></form>';

        }
    }
    else
        echo '<p>Nu aveti studenti inregistrati la licente.</p>';

    $pquery = "SELECT * FROM licente l WHERE l.profesor='$nume_cont' AND l.firma IS NOT NULL";
    $presponse = @mysqli_query($dbc, $pquery);
    $prowcount = mysqli_num_rows($presponse);
//$row = mysqli_fetch_array($presponse);
//echo "<script type='text/javascript'>alert('" . $row['student'] . "');</script>";
    if ($prowcount > 0) {
        while ($row = mysqli_fetch_array($presponse)) {

            //$sstring = explode(" ", $row['student']);
            //echo "<script type='text/javascript'>alert('$pstring[1]');</script>";
            $firma = $row['firma'];
            $squery = "SELECT * FROM utilizatori u WHERE u.nume =' $firma ' ";
            $response5 = @mysqli_query($dbc, $squery);
            $srow = mysqli_fetch_array($response5);
            $student = $srow['username'];

            echo '<p>Deschide o conversatie cu firma ' . $row['firma'] . '</p>' . '<form action="php\pm_nou.php?' . $student . '" method="post"><input type="submit" value="Contacteaza" name="submit"></form>';

        }
    }
    else
        echo '<p>Nu supervizati licenta nici unei firme.</p>';

}
if (strcmp($tip_cont, "2") == 0) {
    $pquery = "SELECT * FROM licente l WHERE l.firma='$nume_cont' AND l.student IS NOT NULL";
    $presponse = @mysqli_query($dbc, $pquery);
    $prowcount = mysqli_num_rows($presponse);
//$row = mysqli_fetch_array($presponse);
//echo "<script type='text/javascript'>alert('" . $row['student'] . "');</script>";
    if ($prowcount > 0) {
        while ($row = mysqli_fetch_array($presponse)) {

            $sstring = explode(" ", $row['student']);
            //echo "<script type='text/javascript'>alert('$pstring[1]');</script>";
            $squery = "SELECT * FROM utilizatori u WHERE u.nume = '$sstring[0]' AND u.prenume = '$sstring[1]' ";
            $response5 = @mysqli_query($dbc, $squery);
            $srow = mysqli_fetch_array($response5);
            $student = $srow['username'];

            echo '<p>Deschide o conversatie cu studentul ' . $row['student'] . '</p>' . '<form action="php\pm_nou.php?' . $student . '" method="post"><input type="submit" value="Contacteaza" name="submit"></form>';

        }
    }
    else
        echo '<p>Nu aveti studenti inregistrati la licente.</p>';

    $pquery = "SELECT * FROM licente l WHERE l.firma='$nume_cont' AND l.profesor IS NOT NULL";
    $presponse = @mysqli_query($dbc, $pquery);
    $prowcount = mysqli_num_rows($presponse);
//$row = mysqli_fetch_array($presponse);
//echo "<script type='text/javascript'>alert('" . $row['student'] . "');</script>";
    if ($prowcount > 0) {
        while ($row = mysqli_fetch_array($presponse)) {
            $sstring = explode(" ", $row['profesor']);
            //$sstring = explode(" ", $row['student']);
            //echo "<script type='text/javascript'>alert('$pstring[1]');</script>";
            //$firma = $row['firma'];
            //$squery = "SELECT * FROM utilizatori u WHERE u.nume =' $firma ' ";
            $squery = "SELECT * FROM utilizatori u WHERE u.nume = '$sstring[0]' AND u.prenume = '$sstring[1]' ";
            $response5 = @mysqli_query($dbc, $squery);
            $srow = mysqli_fetch_array($response5);
            $student = $srow['username'];

            echo '<p>Deschide o conversatie cu profesorul ' . $row['profesor'] . '</p>' . '<form action="php\pm_nou.php?' . $student . '" method="post"><input type="submit" value="Contacteaza" name="submit"></form>';

        }
    }
    else
        echo '<p>Nu aveti profesori asociati licentelor.</p>';

}


echo'      </div>

        <div id="right-side" class="col-sm-2">
            <div id="parteneriHome" class="col-sm-2" >
                <h2>Parteneri</h2>
                <table>
                    <tr>
                        <td align=\'center\' valign=\'center\' width=\'150\' height=\'80\'>
                            <a href=\'\' title=\'Amazon Development Center Romania\'><img src=\'img/amazon.jpg\' border=\'0\' alt=\'Amazon Development Center Romania\' hspace=\'0\' vspace=\'0\' /></a>
                        </td>
                        <td align=\'center\' valign=\'center\' width=\'150\' height=\'80\'>
                            <a href=\'\' title=\'SC Info World SRL\'><img src=\'img/infoworld.jpg\' border=\'0\' alt=\'SC Info World SRL\' hspace=\'0\' vspace=\'0\' /></a>
                        </td>
                    </tr>
                    <tr>
                        <td align=\'center\' valign=\'center\' width=\'150\' height=\'80\'>
                            <a href=\'\' title=\'Intel Romania Software Development Center\'><img src=\'img/intel.jpg\' border=\'0\' alt=\'Intel Romania Software Development Center\' hspace=\'0\' vspace=\'0\' /></a>
                        </td>
                        <td align=\'center\' valign=\'center\' width=\'150\' height=\'80\'>
                            <a href=\'\' title=\'TeamNet International\'><img src=\'img/teamnet.jpg\' border=\'0\' alt=\'TeamNet International\' hspace=\'0\' vspace=\'0\' /></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>';

?>