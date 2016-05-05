<?php

require_once('mysqli_connect.php');
// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

//placeholder pana la finalizarea DB
$sql="SELECT * FROM utilizatori WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1) {
    session_start();
    $_SESSION['login'] = "1";
    header ("Location: http://www.google.com");
}
else {
    session_start();
    $_SESSION['login'] = '';
    header ("Location: http://www.yahoo.com");
}
?>

