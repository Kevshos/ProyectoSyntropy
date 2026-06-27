<?php
header('Content-Type: application/json');
require_once 'ContenedoresController.php';
$controladorObj = new ContenedoresController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		$Matricula = '';

		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Contenedores'){
					
			echo json_encode( $controladorObj->getAllContenedores() );
		}
		if(strpos($uri, '/miApi/Contenedores/') === 0){
			$ID = trim(str_replace('/miApi/Contenedores/', '', $uri));
		}
		if(!empty($ID)){
			echo json_encode($controladorObj -> buscarContenedor($ID));
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
