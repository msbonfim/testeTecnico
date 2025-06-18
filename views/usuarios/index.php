<?php 

require_once __DIR__ . '/../partials/header.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Usuários</h1>
    <a href="<?= $basePath ?>/usuarios/create" class="btn btn-primary">Novo Usuário</a>
</div>

<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Login de Acesso</th>
                <th scope="col">Perfil</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <th scope="row"><?= htmlspecialchars($u['usu_codigo'] ?? '') ?></th>
                        <td><?= htmlspecialchars($u['usu_nome'] ?? '') ?></td>
                        <td><?= htmlspecialchars($u['usu_login_acesso'] ?? '') ?></td>
                        <td><?= htmlspecialchars($u['per_descricao'] ?? 'N/A') ?></td>
                        <td>
                            <a href="<?= $basePath ?>/usuarios/view?id=<?= $u['usu_codigo'] ?>" class="btn btn-success btn-sm"><i class="bi bi-eye"></i> Ver</a>
                            <a href="<?= $basePath ?>/usuarios/edit?id=<?= $u['usu_codigo'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                            <a href="<?= $basePath ?>/usuarios/delete?id=<?= $u['usu_codigo'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Confirma a exclusão deste usuário?')"><i class="bi bi-trash"></i> Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">
                        <?= isset($usuarios) ? 'Nenhum usuário encontrado' : 'Erro ao carregar usuários' ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
require_once __DIR__ . '/../partials/footer.php'; 
?>