<?php
class testDownload extends PHPUnit_Framework_TestCase
{
	public function testdl()
	{
		$id=1;
		require_once('../mysqli_connect.php');
		$query = "SELECT cale_fisier FROM licente WHERE id=$id";
		$response = @mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($response);
		$expected = array('a');
		$this->assertEquals($expected[0],$row[0]);
	}
}
?>