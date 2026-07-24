<?php
class UsuarioModel
{
    private $nickname;
    private $Nombre;
    private $Apellido;
    private $Contrasenia;
    private $Mail;
    private $A2F;
    private $rol;
    private $conexion;
    private $fecha;
    private $estado;

    public function __construct($bd)
    {
        $this->conexion = $bd;
    }




    //Registrar usuario---------------------------------------------------


   public function crearUsuario($n, $a, $co, $m, $a2f, $u){
    try {
        // 1. Insertar PRIMERO en la tabla usuario
        $sql = "INSERT INTO usuario (nombre, apellido, mail, contrasena, a2f, rol, nickname) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conexion, $sql);
        
        if (!$stmt) {
            throw new Exception("Error al preparar 'usuario': " . mysqli_error($this->conexion));
        }

        $this->Nombre = $n;
        $this->Apellido = $a;
        $this->Contrasenia = password_hash($co, PASSWORD_DEFAULT);
        $this->Mail = $m;
        $this->A2F = $a2f;
        $this->nickname = $u;
        $this->rol = 'Vecino';
        
        $stmt->bind_param('ssssiss', $this->Nombre, $this->Apellido, $this->Mail, $this->Contrasenia, $this->A2F, $this->rol, $this->nickname);
        
        if (!$stmt->execute()) {
            throw new Exception("Error al insertar en 'usuario': " . $stmt->error);
        }
        $stmt->close();

        // 2. Insertar SEGUNDO en la tabla registro (ahora que el usuario ya existe)
        $sql2 = "INSERT INTO registro (mail, fecha, estado) VALUES (?,?,?)"; 
        $stmt2 = mysqli_prepare($this->conexion, $sql2);
        
        if (!$stmt2) {
            throw new Exception("Error al preparar 'registro': " . mysqli_error($this->conexion));
        }
        date_default_timezone_set('America/Montevideo');
        $this->fecha = date('Y-m-d H:i:s');
        $this->estado = 'Pendiente';
        
        // Corregido a 'sss'
        $stmt2->bind_param('sss', $this->Mail, $this->fecha, $this->estado);
        
        if (!$stmt2->execute()) {
            throw new Exception("Error al insertar en 'registro': " . $stmt2->error);
        }
        $stmt2->close();
        
        return true;

    } catch (Exception $e) {
        // Guardamos el error real en el archivo log del servidor
        error_log("Error en crearUsuario: " . $e->getMessage());
        
        // Muestra el error exacto en pantalla para saber qué falló en 'registro'
        echo "Error detectado: " . $e->getMessage(); 
        
        return false;
    }
}
    
//------------------------------------------------------------------------------------

    //Obtener todos los usuarios ----------------------------------------------
    public function getAllUsuarios()
    {
        $sql = "SELECT Nombre FROM Usuarios";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        $usuarios = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $usuarios[] = $fila;
        }

        mysqli_stmt_close($stmt);
        return $usuarios;
    }
//--------------------------------------------------------------------------------------

    //Buscar usuario---------------------------------------------------------------------


    public function buscarMail($mail)
    {
        $sql = "SELECT * FROM usuario WHERE mail = ?";
        $stmt = mysqli_prepare($this->conexion, $sql);
        if (!$stmt) {
        die(json_encode(["error" => "Error en SQL: " . mysqli_error($this->conexion)]));
    }
        mysqli_stmt_bind_param($stmt, "s", $mail);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $usuario;
    }

//---------------------------------------------------------------------------------------------------
    //Buscar contrasenia
    public function buscarContrasenia($contra){
        $sql = "SELECT Nombre, Apellido, Mail, A2F, Contrasenia FROM Usuarios WHERE Contrasenia =?";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $mail);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);
        return $usuario;
    }
//----------------------------------------------------------------------------------------------

    //Eliminar usuario------------------------------------------------------------------------------
    public function eliminarUsuario($m){
    $sql = "DELETE FROM Usuarios where Mail = ?";
    $stmt = mysqli_prepare($this->conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $m);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
    }

//-------------------------------------------------------------------------------------------------
//Guardar registro del login
    public function registrarAcceso($mail, $estado){
        $sql = "INSERT INTO historiallogin (Estado, fecha, mail) VALUES (?,?,?)";
        $stmt = mysqli_prepare($this->conexion, $sql);
        date_default_timezone_set('America/Montevideo');
        $fecha = date('Y-m-d H:i:s');
        mysqli_stmt_bind_param($stmt, "sss", $estado, $fecha, $mail);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
    }

    //------------------------------------------------------------------------------
    //Mostrar todos los usuarios pendientes
    public function getUsuariosPendientes(){
        $sql = "SELECT Nombre, Apellido, Mail FROM Usuarios WHERE Estado = 'Pendiente'";
        $stmt = mysqli_prepare($this->conexion, $sql);
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
        }
    
    //-------------------------------------------------------------------------------------
    
    public function actualizarEstadoUsuario($mail, $nuevoEstado){
        $sql = "UPDATE registro SET estado = ?  WHERE mail = ?";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $nuevoEstado, $mail);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
    }
    public function buscarEstado($mail){
        $sql = "SELECT * FROM registro WHERE Mail = ?";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $mail);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $estado = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);
        return $estado;
}
    public function getAllPendientes(){
        $sql = "SELECT u.nombre, u.apellido, u.mail, r.estado FROM usuario u JOIN registro r ON u.mail = r.mail WHERE r.estado = 'Pendiente'";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        $usuariosPendientes = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $usuariosPendientes[] = $fila;
        }

        mysqli_stmt_close($stmt);
        return $usuariosPendientes;
    }
}

