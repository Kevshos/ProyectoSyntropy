<?php
class CamionModel
{
    private $Matricula;
    private $CapCarga;
    private $Tipo;
    private $Estado;
    private $Ubicacion;
    private $conexion;

    public function __construct($bd)
    {
        $this->conexion = $bd;
    }

    public function getAllMatriculas()
    {
        $sql = "SELECT Matricula, Estado FROM Camiones";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        $camiones = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $camiones[] = $fila;
        }

        mysqli_stmt_close($stmt);
        return $camiones;
    }

    public function buscarMatricula($Matricula)
    {
        $sql = "SELECT Matricula, CapCarga, Tipo, Estado, Ubicacion FROM Camiones WHERE Matricula = ?";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $dni);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $camion = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $camion;
    }
}
