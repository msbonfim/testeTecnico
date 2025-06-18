<?php 

require_once __DIR__ . '/../partials/header.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Editar Usuário</h1>
    <a href="<?= $basePath ?>/usuarios" class="btn btn-secondary">Voltar para a lista</a>
</div>

<?php if (!empty($usuario) && $usuario->id): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Alterando dados de: <?= htmlspecialchars($usuario->nome) ?></h5>

            <form action="<?= $basePath ?>/usuarios/update?id=<?= htmlspecialchars($usuario->id) ?>" method="post">
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($usuario->nome) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="login_acesso" class="form-label">Login de Acesso</label>
                    <input type="text" class="form-control" id="login_acesso" name="login_acesso" value="<?= htmlspecialchars($usuario->login_acesso) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="per_codigo" class="form-label">Perfil</label>
                    <select class="form-select" id="per_codigo" name="per_codigo" required>
                        <option value="">Selecione um perfil</option>
                        <?php if (!empty($perfis)): ?>
                            <?php foreach ($perfis as $p): ?>
                                <option value="<?= $p['per_codigo'] ?>" <?= ($p['per_codigo'] == $usuario->per_codigo) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($p['per_descricao']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Nova Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">
                        Deixe este campo em branco para não alterar a senha atual.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>

            </form>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
        Usuário não encontrado ou ID inválido.
    </div>
<?php endif; ?>


<?php 
require_once __DIR__ . '/../partials/footer.php'; 
?>