<?php

error_reporting(0);
session_start();

$nume_usr = $_SESSION['nume'];
$tip_usr = $_SESSION['tip_cont'];

//Obtinem id-ul licentei pentru care trebuie sa generam pagina
$id = $_SERVER['QUERY_STRING'];

//Interogare baza de date si introducere informatii intr-un vector
require_once('../mysqli_connect.php');
$query = "SELECT titlu, descriere, cale_fisier, profesor, firma FROM licente WHERE id='$id'";
$response = @mysqli_query($dbc, $query);

$row = mysqli_fetch_array($response);


//--------------------------------------------HTML------------------------------------------------------

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
				<div id="header_links">';
if (isset($_SESSION['username'])) {
    echo '<a href="php/logout.php"  title="Delogheaza-te">Logout</a>';
} else {
    echo '<a href="login.php"  title="Logheaza-te">Login</a>';
}
echo '</div>
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

//-----------------------------------------------------------------------------------------------------------------
//-------------------------------------CONTINUT PAGINA-------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
echo '<div id="content">';

echo "<div><p id='p_titlu'>" . $row['titlu'] . "</p><br>";
echo "<p id='p_descriere'>" . $row['descriere'] . "</p><br>";
echo "<p id='p_profesor'>" . $row['profesor'] . "</p><br>";
echo "<p id='p_firma'>" . $row['firma'] . "</p><br>";

// Buton de download
echo "<a href='download.php?" . $id . "'><p>Download</p></a>";

//Buton pentru profesori pentru a se asocia la o licenta postata de o firma
if (strcmp($tip_usr, "1") == 0 && strcmp($row['profesor'], "") == 0)
    echo "<a href='asociaza_licenta.php?" . $id . "-" . $nume_usr . "'><p>Asociaza-te la aceasta licenta!</p></a>";

if (strcmp($tip_usr, "3") == 0 && strcmp($row['profesor'], "") != 0)
    echo "<a href='aplica_licenta.php?" . $id . "-" . $nume_usr . "'><p>Aplica pentru aceasta licenta!</p></a>";

//-----------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
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
