<?php
namespace Crud;

use Crud\Database;
use PDO;
use PDOException;

class User
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Crear
    public function crear($nombre, $correo, $mensaje)
    {
        try {
            $sql = "INSERT INTO datos (nombre, correo, mensaje) VALUES (:nombre, :correo, :mensaje)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':mensaje', $mensaje);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear: " . $e->getMessage();
            return false;
        }
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM datos WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Leer todos
    public function leer()
    {
        try {
            $sql = "SELECT * FROM datos ORDER BY id ASC";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al leer: " . $e->getMessage();
            return [];
        }
    }

    // Actualizar
    public function actualizar($id, $nombre, $correo, $mensaje)
    {
        try {
            $sql = "UPDATE datos SET nombre = :nombre, correo = :correo, mensaje = :mensaje WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':mensaje', $mensaje);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar: " . $e->getMessage();
            return false;
        }
    }

    // Eliminar
    public function eliminar($id)
    {
        try {
            $sql = "DELETE FROM datos WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar: " . $e->getMessage();
            return false;
        }
    }
}
