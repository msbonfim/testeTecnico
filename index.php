<?php

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/projects/testeTecnico';

$baseUri = (strpos($requestUri, $basePath) === 0) ? substr($requestUri, strlen($basePath)) : $requestUri;

if (empty($baseUri) || $baseUri === '/') {
    $baseUri = '/';
}

require_once __DIR__ . '/controllers/UsuarioController.php';
$controller = new UsuarioController();

switch ($baseUri) {
    case '/':
        require __DIR__ . '/views/home.php';
        break;

    case '/usuarios':
        $controller->index();
        break;

    case '/usuarios/create':
        $controller->create();
        break;

    case '/usuarios/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store($_POST);
        } else {
            echo "Método não permitido.";
        }
        break;
    case '/usuarios/view':
        if (isset($_GET['id'])) {
            $controller->view((int)$_GET['id']);
        } else {
            echo "ID não informado.";
        }
    break;
    case '/usuarios/edit':
        if (isset($_GET['id'])) {
            $controller->edit((int)$_GET['id']);
        } else {
            echo "ID não informado.";
        }
        break;

    case '/usuarios/update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $controller->update((int)$_GET['id'], $_POST);
        } else {
            echo "Parâmetros inválidos.";
        }
        break;

    case '/usuarios/delete':
        if (isset($_GET['id'])) {
            $controller->delete((int)$_GET['id']);
        } else {
            echo "ID não informado.";
        }
        break;

    default:
        http_response_code(404);
        echo "<h1>Página não encontrada</h1>";
        echo "<p>Verifique a URL: <strong>{$baseUri}</strong></p>";
        break;
}
