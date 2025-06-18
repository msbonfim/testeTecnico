<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ocorreu um Erro</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .error-container { border: 1px solid #d9534f; background-color: #f2dede; padding: 15px; border-radius: 4px; }
        h1 { color: #a94442; }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Ocorreu um Erro na Aplicação</h1>
        <p>A seguinte mensagem de erro foi gerada:</p>
        <pre><?= isset($errorMessage) ? htmlspecialchars($errorMessage) : 'Não foi possível obter a mensagem de erro específica.' ?></pre>
        <p><a href="<?= $basePath ?? '/projects/testeTecnico' ?>">Voltar para a página inicial</a></p>
    </div>
</body>
</html>