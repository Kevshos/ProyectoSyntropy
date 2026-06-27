<?php
header('Content-Type: application/json');
require_once 'CamionController.php';
$controladorObj = new CamionController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		$Matricula = '';

		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Camiones'){
					
			echo json_encode( $controladorObj->getAllMatriculas() );
		}
		if(strpos($uri, '/miApi/Camion/') === 0){
			$Matricula = trim(str_replace('/miApi/Camion/', '', $uri));
		}
		if(!empty($Matricula)){
			echo json_encode($controladorObj -> buscarMatricula($Matricula));
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
