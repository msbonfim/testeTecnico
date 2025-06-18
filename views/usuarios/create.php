<?php
require_once __DIR__ . '/../partials/header.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Novo Usuário</h1>
    <a href="<?= $basePath ?>/usuarios" class="btn btn-secondary">Voltar para a lista</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Preencha os dados do novo usuário</h5>

        <form action="<?= $basePath ?>/usuarios/store" method="post">
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="mb-3">
                <label for="login_acesso" class="form-label">Login de Acesso</label>
                <input type="text" class="form-control" id="login_acesso" name="login_acesso" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>

            <div class="mb-3">
                <label for="per_codigo" class="form-label">Perfil</label>
                <select class="form-select" id="per_codigo" name="per_codigo" required>
                    <option value="" selected disabled>Selecione um perfil</option>
                    <?php if (!empty($perfis)): ?>
                        <?php foreach ($perfis as $perfil): ?>
                            <option value="<?= $perfil['per_codigo'] ?>">
                                <?= htmlspecialchars($perfil['per_descricao']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i> Salvar Usuário</button>

        </form>
    </div>
</div>

<?php 
require_once __DIR__ . '/../partials/footer.php'; 
?>