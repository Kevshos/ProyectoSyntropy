<?php
class ContenedoresController
{
	private $modeloObj;

	public function __construct()
	{
		$conexionbd = mysqli_connect("localhost","root","","prueba");
		if (!$conexionbd){
			die("Error de conexion ". mysqli_connect_error());
		}
		require "CamionModel.php";
		$this->modeloObj = new ContenedorModel($conexionbd);
	}

	
	public function getAllContenedores()
	{
		return $this->modeloObj->getAllContenedores();
	}
	public function buscarContenedor($id){
		return $this->modeloObj -> buscarContenedor($id);
	}
	public function crearContenedor($cap,$t,$e,$u){
		return $this->modeloObj -> crearContenedor($cap, $t, $e, $u);
	}
	
}