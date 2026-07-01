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
		}
		if(!empty($Matricula)){
			echo json_encode($controladorCamion -> buscarMatricula($Matricula));
			}
        
break;
    case 'POST';
	if($uri === '/Proyecto/ProyectoSyntropy/Recoleccion/miApi/RegistrarCamion'){
			$json = file_get_contents('php://input');
			$datos = json_decode($json);
			if (!empty($datos->Matricula) && !empty($datos->capCarga) && !empty($datos->Tipo) && !empty($datos->Estado) && !empty($datos->Ubicacion)){
			}
			echo json_encode ($controladorCamion->crearCamion($datos->Matricula, $datos->capCarga, $datos->Tipo, $datos->Estado, $datos->Ubicacion));
		} else {
			echo json_encode(['error' => 'Faltan campos obligatorios']);
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