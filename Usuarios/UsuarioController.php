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

	
	public function getAllUsuarios()
	{
		return $this->modeloObj->getAllUsuarios();
	}
	public function buscarDNI($dni){
		return $this->modeloObj -> buscarDNI($dni);
	}
	public function crearUsuario($nombre, $apellido, $cedula, $mail, $a2f,$contrasenia){
		return $this->modeloObj->crearUsuario($nombre,$cedula,$apellido,$contrasenia,$mail, $a2f);
	}
	public function loguearUsuario($mail, $contrasenia){
		return $this->modeloObj->loguearUsuario($mail, $contrasenia);
	}
}