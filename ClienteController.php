<?php
class ClienteController
{
	private $modeloObj;

	public function __construct()
	{
		require "ClienteModel.php";
		$this->modeloObj = new ClienteModel();
	}

	
	public function getAllClientes()
	{
		return $this->modeloObj->getAllClientes();
	}
	
}