<?php
class UsuarioController
{
	private $modeloObj;

	public function __construct()
	{
		$conexionbd = mysqli_connect("localhost","root","","Syntropy");
		if (!$conexionbd){
			die("Error de conexion ". mysqli_connect_error());
		}
		require "UsuarioModel.php";
		$this->modeloObj = new UsuarioModel($conexionbd);
	}

	//Mostrar todos los usuarios
	public function getAllUsuarios()
	{
		return $this->modeloObj->getAllUsuarios();
	}

	//Buscar usuario
	public function buscarMail($mail){
		return $this->modeloObj -> buscarMail($mail);
	}

	//Registrar Usuario
	//public function crearUsuario($nombre, $apellido, $mail, $a2f,$contrasenia){
		public function crearUsuario(){
			$json = file_get_contents('php://input');
		$datos = json_decode($json);
//validar datos
		if (!$datos || !isset($datos->mail) || !isset($datos->contrasenia) || !isset($datos->nombre) || !isset($datos->apellido)|| !isset($datos->usuario)) {
            return ["status" => "error", "mensaje" => "Faltan campos obligatorios o el JSON está mal formado."];
        }
		$usuario = $datos->usuario;
        $mail = $datos->mail;
        $nombre = $datos->nombre;
        $apellido = $datos->apellido;
        $contrasenia = $datos->contrasenia;
        $a2f = isset($datos->a2f) ? $datos->a2f : 0; 
		$UsuarioExistente = $this->modeloObj->buscarMail($datos->mail);
		if($UsuarioExistente){
			return ["status"=>"error", "mensaje" => "Este mail ya esta registrado, utilice otro mail"];
		} 
		$resultado = $this->modeloObj->crearUsuario($nombre, $apellido, $contrasenia,$mail, $a2f, $usuario);
		if($resultado){
			return ["status"=>"success","mensaje"=>"Solicitud enviada. Su cuenta se encuentra en espera de aprobacion por un administrador."];
		} else {
			return ["status"=>"error","mensaje"=>"No se pudo crear el usuario"];
		}
	}

	//Login de usuario
	public function loguearUsuario(){
        if(session_start()=== PHP_SESSION_NONE){
            session_start();
        }
    $json = file_get_contents('php://input');
    $datos = json_decode($json);
    
    if (!$datos || !isset($datos->contrasenia) || (empty($datos->mail) && empty($datos->nickname))) {
        return ["status" => "error", "mensaje" => "Faltan datos de login."];
    }

    $usuarioEncontrado = null;

    if (!empty($datos->mail)) {
        $usuarioEncontrado = $this->modeloObj->buscarMail($datos->mail);
    }

    if ($usuarioEncontrado) {
        
        if (password_verify($datos->contrasenia, $usuarioEncontrado['contrasena'])) {
            
            if ($usuarioEncontrado['estado'] === 'Pendiente') {
                $this->modeloObj->registrarAcceso($usuarioEncontrado['mail'], 'Fallido - Cuenta pendiente');
                return ["status" => "error", "mensaje" => "Cuenta pendiente."];
                
            } elseif ($usuarioEncontrado['estado'] === 'Rechazado') {
                $this->modeloObj->registrarAcceso($usuarioEncontrado['mail'], 'Fallido - Cuenta rechazada');
                return ["status" => "error", "mensaje" => "Cuenta rechazada."];
                
            } else {
                $this->modeloObj->registrarAcceso($usuarioEncontrado['mail'], 'Exitoso');
                unset($usuarioEncontrado['contrasena']);
                $_SESSION['rol']=$usuarioEncontrado['rol'];
                return ["status" => "success", "usuario" => $usuarioEncontrado];
            }
            
        } else {
            return ["status" => "error", "mensaje" => "Contraseña incorrecta"];
        }
        
    } else {
        return ["status" => "error", "mensaje" => "Este usuario/mail no está registrado"];
    }
}
	public function eliminarUsuario($mail){
		return $this->modeloObj->eliminarUsuario($mail);
	}

	public function responderSolicitud() {
    $json = file_get_contents('php://input');
    $datos = json_decode($json);

    if (!isset($datos->mail) || !isset($datos->decision)) {
        return ["status" => "error", "mensaje" => "Faltan datos de decisión."];
    }

    if (!in_array($datos->decision, ['Aceptado', 'Rechazado'])) {
        return ["status" => "error", "mensaje" => "Decisión inválida."];
    }

    $resultado = $this->modeloObj->actualizarEstadoUsuario($datos->mail, $datos->decision);

    if ($resultado) {
        return ["status" => "success", "mensaje" => "Usuario " . strtolower($datos->decision) . " con éxito."];
    }
    return ["status" => "error", "mensaje" => "No se pudo procesar la solicitud."];
}
}