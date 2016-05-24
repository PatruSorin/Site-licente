<?php
/**
 * Created by PhpStorm.
 * User: ChriS
 * Date: 24-May-16
 * Time: 9:02
 */
require_once('..\mysqli_connect.php');

$user_two=$_SERVER['QUERY_STRING'];

$reply=$_POST['reply'];

echo "<script type='text/javascript'>alert('$reply');</script>";

$user_one=$_SESSION['username'];

$query = "INSERT INTO conversatie (user_one,user_two) VALUES ('$user_one','$user_two')";
$response = @mysqli_query($dbc, $query);
if($response)
{
    $query="SELECT id FROM conversatie WHERE user_one='$user_one' ORDER BY id DESC limit 1";
    $response2 = @mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($response2);
    $c_id = $row['id'];
    $query = "INSERT INTO conversatie_reply (reply,user_id_fk,c_id_fk) VALUES ('$reply','$user_one','$c_id')";
    $response3 = @mysqli_query($dbc, $query);
    if($response)
        $status="Mesajul a fost trimis.";
    else
        $status="Mesajul nu a fost trimis.";
}


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
				<a href="../index.html" title="LicenteFMI"><img src="../img/fmi.png" alt=" " /></a>
			</div>

			<div id="quickLinks">
				<div id="header_links">
					<a href="../login.html"  title="cont companii">cont companii</a> |
					<a href="../login.html"  title="cont studenti">cont studenti</a> |
					<a href="../login.html"  title="cont profesori">cont profesori</a>
				</div>
			</div>

			<br/>

			<ul id="mainMenu">
				<li><a href="../index.html"  title="index">Home</a></li>
				<li><a href="../despre.html"  title="despre">despre</a></li>
				<li><a href="../listalicente.php"  title="licente">Lista licente</a></li>
				<li><a href="../contact.html"  title="contact">contact</a></li>
				<li><a href="../chat.html" title="chat">Chat</a></li>
			</ul>
		</div>
	</div>

	<div id="wrapper_all" class="row">
		<div id="wrapper" class="col-sm-10">
<div id="content">';
echo $status;
//<form action="php\trimite.php" method="post"><input type="submit" value="Trimite" name="submit"></form>
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
