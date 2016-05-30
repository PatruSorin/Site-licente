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

//Conectre la baza de date
require_once('../mysqli_connect.php');//pozitia fisierului este luata relativ la listalicente.html (.php in cazul nostru)

//Introducem numele studentului in lista de licente
$query = "UPDATE licente SET student= '$nume' WHERE id='$id'";
$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

echo '<!DOCTYPE html>
<html lang="en">
<head>
	<title>LICENTE FMI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta  charset="UTF-8">
	<link href="../css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
	<div id="header_all" class="row">
		<div id="header">
			<div id="logo">
				<a href="../index.php" title="LicenteFMI"><img src="../img/fmi.png" alt=" " /></a>
			</div>

			<div id="quickLinks">
				<div id="header_links"> ';
					if(isset($_SESSION['username'])) {
                    echo '<a href="../php/logout.php"  title="Delogheaza-te">Logout</a>';
                }
                else {
                    echo '<a href="../login.php"  title="Logheaza-te">Login</a>';
                }
			echo	'</div>
			</div>

			<br/>

			<ul id="mainMenu">
				<li><a href="../index.php"  title="index">Home</a></li>
				<li><a href="../despre.php"  title="despre">despre</a></li>
				<li><a href="../listalicente.php"  title="licente">Lista licente</a></li>
				<li><a href="../contact.php"  title="contact">contact</a></li>
				<li><a href="../chat.php" title="chat">Chat</a></li>
			</ul>
		</div>
	</div>

	<div id="wrapper_all" class="row">
		<div id="wrapper" class="col-sm-10">';

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

echo '</div>

			<div id="right-side" class="col-sm-2">
				<div id="parteneriHome" class="col-sm-2" >
					<h2>Parteneri</h2>
					<table>
						<tr>
							<td align="center" valign="center" width="150" height="80">
								<a href="../" title="Amazon Development Center Romania"><img src="../img/amazon.jpg" border="0" alt="Amazon Development Center Romania" hspace="0" vspace="0" /></a>
							</td>
							<td align="center" valign="center" width="150" height="80">
								<a href="../" title="SC Info World SRL"><img src="../img/infoworld.jpg" border="0" alt="SC Info World SRL" hspace="0" vspace="0" /></a>
							</td>
						</tr>
						<tr>
							<td align="center" valign="center" width="150" height="80">
								<a href="../" title="Intel Romania Software Development Center"><img src="../img/intel.jpg" border="0" alt="Intel Romania Software Development Center" hspace="0" vspace="0" /></a>
							</td>
							<td align="center" valign="center" width="150" height="80">
								<a href="../" title="TeamNet International"><img src="../img/teamnet.jpg" border="0" alt="TeamNet International" hspace="0" vspace="0" /></a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>';




//Redirectionare
header("Location: ../index.html");
die();