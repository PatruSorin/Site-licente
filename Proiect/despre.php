<!DOCTYPE html>
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
				<div id="header_links">
					<?php
                session_start();
                if(isset($_SESSION['username'])) {
                    echo '<a href="php/logout.php"  title="Delogheaza-te">Logout</a>';
                }
                else {
                    echo '<a href="login.php"  title="Logheaza-te">Login</a>';
                }
                ?>
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
			<div id="content">
			<h1>Despre FMI</h1>
				<h3>Scurt istoric</h3>
				La infiintarea Universitatii din Bucuresti, in anul 1864, prin decret al domnitorului Al.I.Cuza, s-a constituit in cadrul ei o Facultate de Stiinte, cu o sectie de Matematica. In 1949, din Facultatea de Stiinte s-a desprins Facultatea de Matematica si Fizica cu sectii de matematica si fizica. In 1962, sectia de matematica s-a desprins si a luat fiinta Facultatea de Matematica. Din 2002, aceasta se numeste Facultatea de Matematica si Informatica.
				<h3>Informatii generale</h3>
				Facultatea noastra este cea mai buna dintre cele de profil din tara, fiind clasificata in categoria A in cele doua domenii principale de studiu, Matematica si Informatica. Absolventii nostri nu au nici o problema in a-si gasi locuri de munca (unii lucreaza inca din timpul studiilor) in informatica, industrie, cercetare aplicata, mediul bancar si de asigurari, invatamant de toate gradele; cei care doresc pot continua studiile in scolile doctorale din tara sau din strainatate, unde sunt acceptati usor.
			</div>

			<div id="right-side" class="col-sm-2">
				<div id="parteneriHome" class="col-sm-2" >
					<h2>Parteneri</h2>
					<table>
						<tr>
							<td align='center' valign='center' width='150' height='80'>
								<a href='' title='Amazon Development Center Romania'><img src='img/amazon.jpg' border='0' alt='Amazon Development Center Romania' hspace='0' vspace='0' /></a>
							</td>
							<td align='center' valign='center' width='150' height='80'>
								<a href='' title='SC Info World SRL'><img src='img/infoworld.jpg' border='0' alt='SC Info World SRL' hspace='0' vspace='0' /></a>
							</td>
						</tr>
						<tr>
							<td align='center' valign='center' width='150' height='80'>
								<a href='' title='Intel Romania Software Development Center'><img src='img/intel.jpg' border='0' alt='Intel Romania Software Development Center' hspace='0' vspace='0' /></a>
							</td>
							<td align='center' valign='center' width='150' height='80'>
								<a href='' title='TeamNet International'><img src='img/teamnet.jpg' border='0' alt='TeamNet International' hspace='0' vspace='0' /></a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
