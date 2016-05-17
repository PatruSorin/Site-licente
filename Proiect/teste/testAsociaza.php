<?php
class testAsociaza extends PHPUnit_Framework_TestCase
{
	public function testasoc()
	{
		$str = "1-Stefanescu%20Alexandru";
		$date = explode("-",$str);
		$id = $date[0];
		$date = explode("%20",$date[1]);
		$nume = $date[0] . " " . $date[1];
		require_once('../mysqli_connect.php');
		$query = "UPDATE licente SET profesor= '$nume' WHERE id='$id'";
		$stmt = mysqli_prepare($dbc, $query);
		$this->assertTrue(mysqli_stmt_execute($stmt));
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
	}
}
?>