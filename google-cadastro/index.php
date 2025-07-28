<?php
require 'config.php';

// echo '<pre>';
// var_dump($_SESSION['usuario']);
// echo '</pre>';

$authUrl = $google->getAuthorizationUrl([
    'scope' => ['openid', 'email', 'profile']
]);

$_SESSION['oauth2state'] = $google->getState();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login com Google</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h2 class="text-center mb-4">Login com Google</h2>

   <?php if (isset($_SESSION['usuario'])): ?>
    <div class="text-center">
        <?php if (!empty($_SESSION['usuario']['foto'])): ?>
            <img src="<?= htmlspecialchars($_SESSION['usuario']['foto']) ?>"
                 alt="Foto do usuário"
                 width="80"
                 class="rounded-circle mb-3 border border-2">
        <?php else: ?>
            <img src="https://via.placeholder.com/80"
                 alt="Foto padrão"
                 width="80"
                 class="rounded-circle mb-3 border border-2">
        <?php endif; ?>
                <p class="fs-5">Olá, <strong><?= htmlspecialchars($_SESSION['usuario']['nome']) ?></strong></p>
                <p class="text-muted"><?= htmlspecialchars($_SESSION['usuario']['email']) ?></p>
                <a href="logout.php" class="btn btn-danger mt-3">Sair</a>
            </div>
        <?php else: ?>

        <div class="text-center mt-4">
            <p class="fw-semibold mb-2" style="color: #444;">Ou cadastre-se com:</p>

            <a href="<?= htmlspecialchars($authUrl) ?>" 
               class="btn btn-light w-100 mb-2 d-flex align-items-center justify-content-center"
               style="border: 2px solid #db4437; color: #db4437; border-radius: 10px;">
                <i class="bi bi-google me-2" style="font-size: 1.2rem;"></i> Cadastrar com Google
            </a>
        </div>
    <?php endif; ?>

</body>
</html>