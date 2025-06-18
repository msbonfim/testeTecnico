<?php
require_once __DIR__ . '/../config/db.php';

class Perfil {
    private $conn;
    private $table = 'tab_perfil';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function lerTodos() {
        $query = "SELECT per_codigo, per_descricao FROM " . $this->table . " ORDER BY per_descricao";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>