<?php
class UsuarioController
{
	private $modeloObj;

	public function __construct()
	{
		require "UsuarioModel.php";
		$this->modeloObj = new UsuarioModel();
	}

	
	public function getAllUsuarios()
	{
		return $this->modeloObj->getAllUsuarios();
	}
	public function buscarDNI($dni){
		return $this->modeloObj -> buscarDNI($dni);
	}
	
}