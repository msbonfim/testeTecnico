<?php
// /models/Usuario.php

require_once __DIR__ . '/../config/db.php';

class Usuario {
    private $conn;
    private $table = 'tab_usuario';

    // Propriedades Públicas
    public $id;
    public $per_codigo;
    public $nome;
    public $login_acesso;
    public $senha;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Listar todos os usuários com o nome do perfil (JOIN)
    public function lerTodos() {
        $query = "SELECT
                    u.usu_codigo,
                    u.usu_nome,
                    u.usu_login_acesso,
                    p.per_descricao
                  FROM
                    {$this->table} u
                  LEFT JOIN
                    tab_perfil p ON u.per_codigo = p.per_codigo
                  ORDER BY
                    u.usu_nome ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Criar um novo usuário
    public function criar() {
        $query = "INSERT INTO {$this->table}
                  SET
                    usu_nome=:nome,
                    usu_login_acesso=:login_acesso,
                    usu_senha=:senha,
                    per_codigo=:per_codigo";

        $stmt = $this->conn->prepare($query);

        // Limpa os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->login_acesso = htmlspecialchars(strip_tags($this->login_acesso));
        $this->per_codigo = htmlspecialchars(strip_tags($this->per_codigo));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        
        // Criptografa a senha
        $this->senha = password_hash($this->senha, PASSWORD_BCRYPT);

        // Associa os dados
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':login_acesso', $this->login_acesso);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':per_codigo', $this->per_codigo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // ------------------------------------------------------------------- //
    // MÉTODOS ADICIONADOS PARA EDIÇÃO, ATUALIZAÇÃO E EXCLUSÃO
    // ------------------------------------------------------------------- //

    /**
     * Lê os dados de um único usuário para preencher o formulário de edição.
     */
    public function lerUm() {
        $query = "SELECT usu_nome, usu_login_acesso, per_codigo
                  FROM " . $this->table . "
                  WHERE usu_codigo = ?
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->nome = $row['usu_nome'];
            $this->login_acesso = $row['usu_login_acesso'];
            $this->per_codigo = $row['per_codigo'];
            return true;
        }
        return false;
    }

    public function lerDetalhes($id) {
        $query = "SELECT
                    u.usu_codigo,
                    u.usu_nome,
                    u.usu_login_acesso,
                    p.per_descricao
                  FROM
                    " . $this->table . " u
                  LEFT JOIN
                    tab_perfil p ON u.per_codigo = p.per_codigo
                  WHERE
                    u.usu_codigo = :id
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar() {
        $query = "UPDATE " . $this->table . "
                  SET
                    usu_nome = :nome,
                    usu_login_acesso = :login_acesso,
                    per_codigo = :per_codigo";
        
        if (!empty($this->senha)) {
            $query .= ", usu_senha = :senha";
        }
        
        $query .= " WHERE usu_codigo = :id";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->login_acesso = htmlspecialchars(strip_tags($this->login_acesso));
        $this->per_codigo = htmlspecialchars(strip_tags($this->per_codigo));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':login_acesso', $this->login_acesso);
        $stmt->bindParam(':per_codigo', $this->per_codigo);
        $stmt->bindParam(':id', $this->id);


        if (!empty($this->senha)) {
            $this->senha = password_hash($this->senha, PASSWORD_BCRYPT);
            $stmt->bindParam(':senha', $this->senha);
        }

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deletar() {
        $query = "DELETE FROM " . $this->table . " WHERE usu_codigo = ?";
        
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>