<?php
header('Content-Type: application/json');
require_once 'UsuarioController.php';
$controladorObj = new UsuarioController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		$cedula = '';

		if($uri === '/Proyecto/ProyectoSyntropy/miApi/Usuarios'){
					
			echo json_encode( $controladorObj->getAllUsuarios() );
		}
		if(strpos($uri, '/miApi/Usuario/') === 0){
			$cedula = trim(str_replace('/miApi/Usuario/', '', $uri));
		}
		if(!empty($cedula)){
			echo json_encode($controladorObj -> buscarDNI($cedula));
			}
        
break;
    default:
        // Maneja métodos no permitidos (POST, PUT, DELETE, etc.)
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
	//case 'POST':
	
	//default:
		// Maneja métodos no permitidos

}
