    <?php
class ContenedorModel
{
    private $idContenedor;
    private $CapCarga;
    private $Estado;
    private $Tipo;
    private $Ubicacion;
    private $conexion;

    public function __construct($bd)
    {
        $this->conexion = $bd;
    }

    public function getAllContenedores()
    {
        $sql = "SELECT idContenedor, Estado FROM Contenedores";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        $contenedores= [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $contenedores[] = $fila;
        }

        mysqli_stmt_close($stmt);
        return $contenedores;
    }

    public function buscarContenedor($id)
    {
        $sql = "SELECT idContenedor, CapCarga, Tipo, Estado, Ubicacion FROM Camiones WHERE idContenedor = ?";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $contenedor = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $contenedor;
    }
}
