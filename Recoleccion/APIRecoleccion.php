<?php
header('Content-Type: application/json');
require_once 'CamionController.php';
$controladorCamion = new CamionController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		$Matricula = '';

		if($uri === '/Proyecto/ProyectoSyntropy/Recoleccion/miApi/Camiones'){
					
			echo json_encode( $controladorCamion->getAllMatriculas() );
		}
		if(strpos($uri, '/miApi/Camion/') === 0){
			$Matricula = trim(str_replace('/miApi/Camion/', '', $uri));
			echo json_encode( $controladorCamion->buscarMatricula($Matricula) );
		}
		
        
break;
    case 'POST';
	if($uri === '/Proyecto/ProyectoSyntropy/Recoleccion/miApi/RegistrarCamion'){
			echo json_encode($controladorCamion->crearCamion());
			}
break; 
	case 'PATCH';
		if($uri === '/Proyecto/ProyectoSyntropy/Recoleccion/miApi/ActualizarCamion'){
			echo json_encode($controladorCamion->actualizarCamion());
			}	
break;

	case 'DELETE';
		if($uri === '/Proyecto/ProyectoSyntropy/Recoleccion/miApi/EliminarCamion'){
			echo json_encode($controladorCamion->eliminarCamion());
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