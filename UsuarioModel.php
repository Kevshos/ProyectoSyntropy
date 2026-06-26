<?php
class UsuarioModel
{
    private $CI;
    private $Nombre;
    private $Apellido;
    private $Contrasena;
    private $Mail;
    private $A2F;
    private $conexion;

    public function __construct($bd)
    {
        $this->conexion = $bd;
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
