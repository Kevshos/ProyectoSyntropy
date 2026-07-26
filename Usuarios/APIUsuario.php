<?php
error_reporting(0); 
ini_set('display_errors', 0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PATCH, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
require_once 'UsuarioController.php';
$controladorObj = new UsuarioController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		$mail = '';
		//Mostrar todos los usuarios
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Usuarios'){
					
			echo json_encode( $controladorObj->getAllUsuarios() );
		}
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/ListarPendientes'){
			echo json_encode( $controladorObj->getAllPendientes() );
		}

		//Buscar usuario
		if(strpos($uri, '/miApi/Usuario/') === 0){
			$mail = trim(str_replace('/miApi/Usuario/', '', $uri));
		}
		if(!empty($mail)){
			echo json_encode($controladorObj -> buscarMail($mail));
			}
        
break;
		case 'POST';
		
		//Registrar un usuario
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Registrar'){
			//$json = file_get_contents('php://input');
			//$datos = json_decode($json);
			echo json_encode ($controladorObj->crearUsuario());
		//Loguear usuario
		}
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Login'){
			echo json_encode($controladorObj->LoguearUsuario());
			}
break;
		case 'DELETE';

		//Eliminar usuario
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Borrar'){
			echo json_encode($resultado = $controladorObj->eliminarUsuario());
			}
		break;
		case 'PATCH';
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Actualizar'){
			echo json_encode($controladorObj->responderSolicitud());
			}
			if ($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Modificar') {
    		echo json_encode($controladorObj->modificarUsuario());
}
		break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
	
 

}
