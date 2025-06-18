<?php

class Database {
    private $host = '127.0.0.1';
    private $db_name = 'teste_tecnico';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Erro de conexão com o banco de dados: " . $exception->getMessage());
        }

        return $this->conn;
    }
}
?>
