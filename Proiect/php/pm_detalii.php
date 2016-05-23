<?php
require_once('../mysqli_connect.php');
$c_id=$_SERVER['QUERY_STRING'];
$query= "SELECT R.cr_id,R.reply,U.username,U.email FROM utilizatori U, conversatie_reply R WHERE R.user_id_fk=U.username and R.c_id_fk='$c_id' ORDER BY R.cr_id ASC LIMIT 20";
$response = @mysqli_query($dbc, $query);
if($response) {
    while($row=mysqli_fetch_array($response)) {
        $cr_id = $row['cr_id'];
        $reply = $row['reply'];
        $username = $row['username'];
        $email = $row['email'];
        echo $reply;
//HTML Output
    }
}
else
    die("NU.");
?>