<?php

require_once 'ClienteController.php';
$controladorObj = new ClienteController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		if($uri === '/miApi/Usuarios'){
					
			echo json_encode( $controladorObj->getAllClientes() );
		}
		break;
	//case 'POST':
	
	//default:
		// Maneja métodos no permitidos

}