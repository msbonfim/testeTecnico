<?php

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Perfil.php';

class UsuarioController {
    private $basePath = '/projects/testeTecnico';

    public function index() {
        try {
            $usuarioModel = new Usuario();
            $usuarios = $usuarioModel->lerTodos();
            
            $basePath = $this->basePath;
            require __DIR__ . '/../views/usuarios/index.php';
            
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    public function create() {
        try {
            $perfilModel = new Perfil();
            $perfis = $perfilModel->lerTodos();

            $basePath = $this->basePath;
            require __DIR__ . '/../views/usuarios/create.php';

        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    public function store($data) {
        try {
            $usuario = new Usuario();
            
            $usuario->nome = $data['nome'] ?? '';
            $usuario->login_acesso = $data['login_acesso'] ?? '';
            $usuario->senha = $data['senha'] ?? '';
            $usuario->per_codigo = $data['per_codigo'] ?? '';

            if ($usuario->criar()) {
                $this->redirect('/usuarios');
            } else {
                throw new Exception("Erro ao criar usuário.");
            }
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    public function view($id) {
        try {
            $usuarioModel = new Usuario();
            
            $usuario = $usuarioModel->lerDetalhes($id);

            if (!$usuario) {
                 throw new Exception("Usuário com ID {$id} não foi encontrado.");
            }

            $basePath = $this->basePath;

            require __DIR__ . '/../views/usuarios/view.php';
            
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    public function edit($id) {
        try {

            $usuario = new Usuario();
            $perfilModel = new Perfil();
            

            $usuario->id = $id;

            if (!$usuario->lerUm()) {
                 throw new Exception("Usuário com ID {$id} não foi encontrado.");
            }

            $perfis = $perfilModel->lerTodos();

            $basePath = $this->basePath;

            require __DIR__ . '/../views/usuarios/edit.php';
            
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    public function update($id, $data) {
        try {
            $usuario = new Usuario();

            $usuario->id = $id;
            $usuario->nome = $data['nome'] ?? '';
            $usuario->login_acesso = $data['login_acesso'] ?? '';
            $usuario->per_codigo = $data['per_codigo'] ?? '';
            
            $usuario->senha = $data['senha'] ?? '';

            if ($usuario->atualizar()) {
                $this->redirect('/usuarios');
            } else {
                throw new Exception("Erro ao atualizar o usuário.");
            }
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    public function delete($id) {
        try {
            $usuario = new Usuario();
            $usuario->id = $id;

            if ($usuario->deletar()) {
                $this->redirect('/usuarios');
            } else {
                throw new Exception("Erro ao deletar o usuário.");
            }
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    private function redirect($path) {
        header("Location: {$this->basePath}{$path}");
        exit;
    }

    private function handleError(Exception $e) {
        $basePath = $this->basePath;
        $errorMessage = "Ocorreu um erro: " . $e->getMessage();
        
        error_log($e->getMessage()); 
        
        require __DIR__ . '/../views/error.php';
        exit;
    }


}
?>