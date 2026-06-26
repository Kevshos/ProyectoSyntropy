<?php

require_once 'UsuarioController.php';
$controladorObj = new UsuarioController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		if($uri === '/miApi/Clientes'){
					
			echo json_encode( $controladorObj->getAllUsuario() );
		}
		if(strpos($uri,'/miApi/Usuario/'===0)){
			$cedula = str_replace('/miApi/Usuario', '', $uri);
		}
		if(!empty($cedula)){
			echo json_encode($controladorObj -> buscarDNI($cedula));
		break;
			}
		break;
	//case 'POST':
	
	//default:
		// Maneja métodos no permitidos

}