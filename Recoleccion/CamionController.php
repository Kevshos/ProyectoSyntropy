<?php
class CamionController
{
	private $modeloObj;

	public function __construct()
	{
		$conexionbd = mysqli_connect("localhost","root","","syntropy");
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
	public function buscarMatricula(){
		$json = file_get_contents('php://input');
		$datos = json_decode($json);
		$Matricula = $datos->matricula;
		return $this->modeloObj -> buscarMatricula($Matricula);
	}
	public function crearCamion(){
		$json = file_get_contents('php://input');
		$datos = json_decode($json);
		if(!$datos || !isset($datos->matricula) || !isset($datos->capacidadCarga) || !isset($datos->tipo) || !isset($datos->estado) || !isset($datos->ubicacion)){
			http_response_code(400);
			return['status'=>'error', 'mensaje' => 'Faltan campos obligatorios'];
		}
		$m = $datos->matricula;
		$cap = $datos->capacidadCarga;
		$t = $datos->tipo;
		$e = $datos->estado;
		$u = $datos->ubicacion;
		$resultado = $this->modeloObj -> crearCamion($m, $cap, $t, $e, $u);
		if($resultado){
			return ['status'=>'success', 'mensaje' => 'Camión creado correctamente'];
		}else{
			return ['status'=>'error', 'mensaje' => 'Error al crear el camión'];
		}
	}
	public function actualizarCamion(){
		$json = file_get_contents('php://input');
		$datos = json_decode($json);
		if(!$datos || !isset($datos->matricula) || !isset($datos->capacidadCarga) || !isset($datos->tipo) || !isset($datos->estado) || !isset($datos->ubicacion)){
			http_response_code(400);
			return['status'=>'error', 'mensaje' => 'Faltan campos obligatorios'];
		}
		$m = $datos->matricula;
		$cap = $datos->capacidadCarga;
		$t = $datos->tipo;
		$e = $datos->estado;
		$u = $datos->ubicacion;
		$resultado = $this->modeloObj -> actualizarCamion($m, $cap, $t, $e, $u);
		if($resultado){
			return ['status'=>'success', 'mensaje' => 'Camión actualizado correctamente'];
		}else{
			return ['status'=>'error', 'mensaje' => 'Error al actualizar el camión'];
		}
	}
	public function eliminarCamion()
	{
		$json = file_get_contents('php://input');
		$datos = json_decode($json);
		if (!$datos || !isset($datos->matricula)) {
			http_response_code(400);
			return ['status' => 'error', 'mensaje' => 'Faltan campos obligatorios'];
		}
		$m = $datos->matricula;
		$resultado = $this->modeloObj->eliminarCamion($m);
		if($resultado){
			return ['status'=>'success', 'mensaje' => 'Camión eliminado correctamente'];
		}else{
			return ['status'=>'error', 'mensaje' => 'Error al eliminar el camión'];
		}
	}
	
}