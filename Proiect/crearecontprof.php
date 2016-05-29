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
				<form action="php\contprof.php" method="post" enctype="multipart/form-data">
					CREARE CONT
					<br>
					Nume:
					<input type="text" name="nume"><br>
					<br>
					Prenume:
					<input type="text" name="prenume"><br>
					<br>
					E-mail:
					<input type="email" name="mail">
					<br><br>
					Data nasterii:
						<select name="Month" onChange="changeDate(this.options[selectedIndex].value);">
							<option value="na">Month</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select name="day" id="day">
							<option value="na">Day</option>
						</select>
						<select name="year" id="year">
							<option value="na">Year</option>
						</select>

						<script language="JavaScript" type="text/javascript">
							function changeDate(i){
								var e = document.getElementById('day');
									while(e.length>0)
										e.remove(e.length-1);

								var j=-1;

								if(i=="na")
									k=0;
								else if(i==2)
										k=28;
								else if(i==4||i==6||i==9||i==11)
										k=30;
								else
									k=31;

								while(j++<k){
									var s=document.createElement('option');
									var e=document.getElementById('day');
									if(j==0){
										s.text="Day";
										s.value="na";
									try{
										e.add(s,null);}
									catch(ex){
										e.add(s);}}
									else{
										s.text=j;
										s.value=j;
									try{
										e.add(s,null);}
									catch(ex){
										e.add(s);
									}}
								}
							}

							y = 2000;
							while (y>=1940){
								var s = document.createElement('option');
								var e = document.getElementById('year');
								s.text=y;
								s.value=y;
								try{
									e.add(s,null);}
								catch(ex){
									e.add(s);
								}
								y--;
							}

					</script><br><br>
					Facultate:
					<input type="text" name="facultate"><br>
					<br>
					Materie predata:
					<input type="text" name="materie"><br>
					<br>
					Username:
					<input type="text" name="username"><br>
					<br>
					Parola:
					<input type="password" name="password"><br>
					<br>
					Confirmare parola:
					<input type="password" name="password"><br>
					<br>
					<input type="submit" value="Creaza cont!">
				</form>
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
