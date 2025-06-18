<?php 

require_once __DIR__ . '/../partials/header.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Detalhes do Usuário</h1>
    <a href="<?= $basePath ?>/usuarios" class="btn btn-secondary">Voltar para a lista</a>
</div>

<?php if (!empty($usuario)): ?>
    <div class="card">
        <div class="card-header">
            Informações do Usuário ID: <?= htmlspecialchars($usuario['usu_codigo']) ?>
        </div>
        <div class="card-body">
            <dl class="row">

                <dt class="col-sm-3">Nome:</dt>
                <dd class="col-sm-9"><?= htmlspecialchars($usuario['usu_nome']) ?></dd>

                <dt class="col-sm-3">Login de Acesso:</dt>
                <dd class="col-sm-9"><?= htmlspecialchars($usuario['usu_login_acesso']) ?></dd>

                <dt class="col-sm-3">Perfil:</dt>
                <dd class="col-sm-9"><?= htmlspecialchars($usuario['per_descricao']) ?></dd>
            </dl>
        </div>
        <div class="card-footer text-end">
             <a href="<?= $basePath ?>/usuarios/edit?id=<?= $usuario['usu_codigo'] ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar este usuário</a>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
        Não foi possível carregar os dados do usuário.
    </div>
<?php endif; ?>


<?php 
require_once __DIR__ . '/../partials/footer.php'; 
?>