<?php
header('Content-Type: application/json');
require_once 'UsuarioController.php';
$controladorObj = new UsuarioController();

$method =           $_SERVER['REQUEST_METHOD'];
$uri    = parse_url($_SERVER['REQUEST_URI'],    PHP_URL_PATH);

switch ($method) {
	case 'GET':
		$mail = '';
		$json = file_get_contents('php://input');
		$datos = json_decode($json);

		
		//Mostrar todos los usuarios
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Usuarios'){
					
			echo json_encode( $controladorObj->getAllUsuarios() );
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
			$json = file_get_contents('php://input');
			$datos = json_decode($json);
			if (!empty($datos->nombre) && !empty($datos->apellido) && !empty($datos->cedula) && !empty($datos->mail) && !empty($datos->contrasenia)){
			$a2f = isset($datos->a2f) ? $datos->a2f : 0;
			}
			echo json_encode ($controladorObj->crearUsuario($datos->nombre, $datos->apellido, $datos->cedula, $datos->mail, $a2f, $datos->contrasenia));
		} else {
			echo json_encode(['error' => 'Faltan campos obligatorios']);
		}
		//Loguear usuario
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Login'){
			echo json_encode($controladorObj->LoguearUsuario($datos->mail, $datos->contrasenia));
			}
break; 
		case 'DELETE';

		//Eliminar usuario
		if($uri === '/Proyecto/ProyectoSyntropy/Usuarios/miApi/Borrar'){
			$json = file_get_contents('php://input');
			$datos = json_decode($json);
			if(!empty($datos->mail)){
			$resultado = $controladorObj->eliminarUsuario($datos->mail);
			if($resultado){
				echo json_encode([
					"exito"=> true,
					"mensaje"=> "Usuario eliminado con exito."
				]);
			} else {
				echo json_encode([
				"exito" => false,
				"mensaje"=> "No se pudo eliminar el usuario o el correo no existe"
				]);
				}
			}
		} else{
			echo json_encode(['error'=> 'Faltan ingresar mail']);
		}
		break;
    default:
        // Maneja métodos no permitidos (POST, PUT, DELETE, etc.)
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
	
	//default:
		// Maneja métodos no permitidos

}
