<?php
class testAplica extends PHPUnit_Framework_TestCase
{
	public function testapl()
	{
		$str = "1-Patru%20Sorin";
		$date = explode("-",$str);
		$id = $date[0];
		$date = explode("%20",$date[1]);
		$nume = $date[0] . " " . $date[1];
		require_once('../mysqli_connect.php');
		
		$query = "SHOW TABLES LIKE '%$id'";
		$response = @mysqli_query($dbc, $query);
		$tableExists = is_null(mysqli_fetch_array($response)) > 0;
		$nume_tabel= "licenta_".$id;
		if($tableExists){
			$query = "CREATE TABLE $nume_tabel (
            id INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            nume_aplicant TEXT NOT NULL
            )";
            $this->assertTrue($dbc->query($query));
		}
		
		$query = "SELECT * FROM $nume_tabel WHERE nume_aplicant = '$nume'";
		$response = @mysqli_query($dbc, $query);
		$exista_nume = is_null(mysqli_fetch_array($response)) > 0 ? 'yes' : 'no';

		if(strcmp ( $exista_nume , "yes" )==0) {
			$query = "INSERT INTO $nume_tabel (nume_aplicant) VALUES ('$nume')";
			$this->assertTrue($dbc->query($query));
			}
	}	
}
?>