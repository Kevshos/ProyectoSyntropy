<?php
class UsuarioController
{
	private $modeloObj;

	public function __construct()
	{
		$conexionbd = mysqli_connect("localhost","root","","prueba");
		if (!$conexionbd){
			die("Error de conexion ". mysqli_connect_error());
		}
		require "UsuarioModel.php";
		$this->modeloObj = new UsuarioModel($conexionbd);
	}

	//Mostrar todos los usuarios
	public function getAllUsuarios()
	{
		return $this->modeloObj->getAllUsuarios();
	}

	//Buscar usuario
	public function buscarMail($mail){
		return $this->modeloObj -> buscarMail($mail);
	}
	public function buscarContrasenia($contra){
		return $this->modeloObj-> buscarContrasenia($contra);
	}

	//Registrar Usuario
	//public function crearUsuario($nombre, $apellido, $mail, $a2f,$contrasenia){
		public function crearUsuario(){
			$json = file_get_contents('php://input');
		$datos = json_decode($json);
//validar datos
		if (!$datos || !isset($datos->mail) || !isset($datos->contrasenia) || !isset($datos->nombre) || !isset($datos->apellido)) {
            return ["status" => "error", "mensaje" => "Faltan campos obligatorios o el JSON está mal formado."];
        }

        $mail = $datos->mail;
        $nombre = $datos->nombre;
        $apellido = $datos->apellido;
        $contrasenia = $datos->contrasenia;
        $a2f = isset($datos->a2f) ? $datos->a2f : 0; 
		$UsuarioExistente = $this->modeloObj->buscarMail($mail);
		if($UsuarioExistente){
			return ["status"=>"error", "mensaje" => "Este mail ya esta registrado, utilice otro mail"];
		} 
		$resultado = $this->modeloObj->crearUsuario($nombre, $apellido, $contrasenia,$mail, $a2f);
		if($resultado){
			return ["status"=>"success","mensaje"=>"Usuario creado exitosamente"];
		} else {
			return ["status"=>"error","mensaje"=>"No se pudo crear el usuario"];
		}
	}

	//Login de usuario
	public function loguearUsuario(){
		$json = file_get_contents('php://input');
		$datos = json_decode($json);
		if($this->modeloObj->buscarMail($datos->mail)===$datos->mail){
			if($this->modeloObj->buscarContrasenia($datos->contrasenia)===$datos->contrasenia){
				return $this->modeloObj->loguearUsuario($datos->mail, $datos->contrasenia);	
			}else {
				return ["status"=>"error", "mensaje"=>"Contrasenia incorrecta"];
			}
		} else {
			return ["status"=>"error","mensaje"=>"Este mail no esta registrado"];
		}

		
	}
	public function eliminarUsuario($mail){
		return $this->modeloObj->eliminarUsuario($mail);
	}
}