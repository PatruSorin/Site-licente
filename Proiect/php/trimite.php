<?php
error_reporting(0);
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
}

header("Location: ../chat.php");
die();