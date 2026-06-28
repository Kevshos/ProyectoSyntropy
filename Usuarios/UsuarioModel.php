<?php
class UsuarioModel
{
    private $CI;
    private $Nombre;
    private $Apellido;
    private $Contrasenia;
    private $Mail;
    private $A2F;
    private $conexion;

    public function __construct($bd)
    {
        $this->conexion = $bd;
    }

    public function crearUsuario($n, $c, $a, $co, $m, $a2f){
            $sql = "INSERT INTO Usuarios (CI, Nombre, Apellido, Contrasenia, Mail, A2F) VALUES (?,?,?,?,?,?)";
            $stmt = mysqli_prepare($this->conexion, $sql);
            $this->Nombre = $n;
            $this->CI = $c;
            $this->Apellido = $a;
            $this->Contrasenia = password_hash($co, PASSWORD_DEFAULT);
            $this->Mail = $m;
            $this->A2F = $a2f;

            $stmt->bind_param('issssi', $this->CI, $this->Nombre, $this->Apellido, $this->Contrasenia, $this->Mail, $this->A2F);
            if($stmt->execute()){
                $stmt->close();
                return true;
            }else {
                $stmt->close();
                return false;
            }

        }
    

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

    public function buscarDNI($dni)
    {
        $sql = "SELECT CI, Nombre, Apellido, Mail, A2F FROM Usuarios WHERE CI = ?";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $dni);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $usuario;
    }
}
