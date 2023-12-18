<?php
require_once 'Conexion.php';

class ListarEmpleados {

    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerNombreSede($idSede) {
        $conn = $this->conexion->getConexion();
        $sql = "SELECT sede FROM sedes WHERE idsede = :idsede";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idsede', $idSede);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['sede'];
    }

    public function obtenerEmpleados() {
        try {
            $conn = $this->conexion->getConexion();

            $sql = "SELECT * FROM empleados";
            $result = $conn->query($sql);

            $empleados = array();

            if ($result) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $empleados[] = $row;
                }
            }

            return $empleados;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
