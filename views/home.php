<?php 
require_once __DIR__ . '/partials/header.php'; 
?>
<style>
    
    @keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
    }
    
    70% {
        transform: scale(1.05);
        box-shadow: 0 0 10px 20px rgba(0, 123, 255, 0);
    }
    
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
    }
    }

    .btn-pulse {animation: pulse 2s infinite;border-radius: 50px;font-size: 1.25rem;}
</style>
<div class="text-center" style="padding: 80px 20px;">
    <h1 class="display-4">Bem-vindo ao Sistema</h1>
    <p class="lead">Um sistema simples de gestão de usuários construído com PHP.</p>
    <hr class="my-4">
    <p>Comece a gerenciar os usuários clicando no botão abaixo.</p>
    
    <a class="btn btn-primary btn-lg btn-pulse" href="<?= $basePath ?>/usuarios" role="button">
        Ir para Lista de Usuários
    </a>
</div>

<?php 
require_once __DIR__ . '/partials/footer.php'; 
?>