<?php
class ClienteModel
{
	private $conn;
	
	public function __construct()
	{		
		$this->conn = mysqli_connect("localhost","root" ,"","prueba");
 	}

	
	public function getAllClientes()
	{
		$sql = "SELECT * FROM clientes";
		$stmt = mysqli_prepare($this->conn, $sql);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		$Clientes = [];
		while($row = mysqli_fetch_assoc($result)) {
			$Clientes[] = $row;
		}
		mysqli_stmt_close($stmt);
		return $Clientes;
	}
	
}
