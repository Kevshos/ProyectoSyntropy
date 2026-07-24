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
	public function buscarContenedor(){
		$json = file_get_contents('php://input');
			$datos = json_decode($json);
		return $this->modeloObj -> buscarContenedor($datos->idContenedor);
	}
	public function crearContenedor(){
		$json = file_get_contents('php://input');
			$datos = json_decode($json);
			if(!$datos|| !isset($datos->capCarga) || !isset($datos->tipo) || !isset($datos->estado) || !isset($datos->calle) || !isset($datos->numero) || !isset($datos->barrio)){
				http_response_code(400);
				echo json_encode(['error' => 'Faltan campos obligatorios']);
				exit;
			}
			$cap = $datos->capCarga;
			$t = $datos->tipo;
			$e = $datos->estado;
			$c = $datos->calle;
			$n = $datos->numero;
			$b = $datos->barrio;

		return $this->modeloObj -> crearContenedor($cap, $t, $e, $c,$n,$b);
	}
	public function eliminarContenedor()
	{
		$json = file_get_contents('php://input');
			$datos = json_decode($json);
			$id = $datos->idContenedor;
		return $this->modeloObj->eliminarContenedor($id);
	}
	public function actualizarContenedor()
	{
		$json = file_get_contents('php://input');
		$datos = json_decode($json);
		if (!$datos || !isset($datos->idContenedor) || !isset($datos->capCarga) || !isset($datos->tipo) || !isset($datos->estado) || !isset($datos->calle) || !isset($datos->numero) || !isset($datos->barrio)) {
			http_response_code(400);
			echo json_encode(['error' => 'Faltan campos obligatorios']);
			exit;
		}
		$id = $datos->idContenedor;
		$cap = $datos->capCarga;
		$t = $datos->tipo;
		$e = $datos->estado;
		$c = $datos->calle;
		$n = $datos->numero;
		$b = $datos->barrio;

		return $this->modeloObj->actualizarContenedor($id, $cap, $t, $e, $c, $n, $b);
	}
}