<?php
header('Content-Type: application/json');
require_once 'ContenedoresController.php';
$controladorContenedor= new ContenedoresController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET';
		$Matricula = '';

		if($uri === '/Proyecto/ProyectoSyntropy/Gestion/miApi/Contenedores'){
					
			echo json_encode( $controladorContenedor->getAllContenedores() );
		}
	
        
break;
    case 'POST';
    if($uri === '/Proyecto/ProyectoSyntropy/Gestion/miApi/RegistrarContenedor'){
			echo json_encode($controladorContenedor->crearContenedor());
			
		}
break; 
		case 'DELETE':
		if ($uri === '/Proyecto/ProyectoSyntropy/Gestion/miApi/EliminarContenedor') {
			echo json_encode($controladorContenedor->eliminarContenedor());
		}
		break;
		case 'PATCH';
		if ($uri === '/Proyecto/ProyectoSyntropy/Gestion/miApi/ActualizarContenedor') {
			echo json_encode($controladorContenedor->actualizarContenedor());
		}
		break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
	//case 'POST':
	
	//default:
		// Maneja métodos no permitidos

}