<?php
class testPaginaLic extends PHPUnit_Framework_TestCase
{
	public function testpg()
	{
		$id=1;
		require_once('../mysqli_connect.php');
		$query = "SELECT titlu, descriere, cale_fisier, profesor, firma FROM licente WHERE id=$id";
		$response = @mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($response);
		$expected=array("yo","ye","a","Stefanescu Alin","");
		for($i=0;$i<=4;$i++)
			$this->assertEquals($expected[$i],$row[$i]);
	}
}
?>