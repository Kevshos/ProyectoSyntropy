<?php
class CamionController
{
	private $modeloObj;

	public function __construct()
	{
		$conexionbd = mysqli_connect("localhost","root","","prueba");
		if (!$conexionbd){
			die("Error de conexion ". mysqli_connect_error());
		}
		require "CamionModel.php";
		$this->modeloObj = new CamionModel($conexionbd);
	}

	
	public function getAllMatriculas()
	{
		return $this->modeloObj->getAllMatriculas();
	}
	public function buscarMatricula($Matricula){
		return $this->modeloObj -> buscarMatricula($Matricula);
	}
	
}