<?php
require_once __DIR__ . '/../configuracion/database.php';

class Usuario {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function registrar($nombre, $email, $password, $id_rol = 3) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $estado = 1;
        $query = "INSERT INTO usuarios (nombre, email, password, estado, id_rol) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("sssii", $nombre, $email, $hashed_password, $estado, $id_rol);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function emailExiste($email) {
        $query = "SELECT id_usuario FROM usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            $num_rows = $stmt->num_rows;
            $stmt->close();
            return $num_rows > 0;
        }
        return false;
    }
}
?>