<?php
require 'config.php';

$authUrl = $google->getAuthorizationUrl([
    'scope' => [
        'openid',
        'email',
        'profile'
    ]
]);

$_SESSION['oauth2state'] = $google->getState();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login com Google</title>
</head>
<body>
    <h2>Login com Google</h2>

    <?php if (isset($_SESSION['usuario'])): ?>
        <h3>Olá, <?= $_SESSION['usuario']['nome'] ?>!</h3>
        <img src="<?= $_SESSION['usuario']['foto'] ?>" width="100">
        <p>Email: <?= $_SESSION['usuario']['email'] ?></p>
        <a href="logout.php">Sair</a>
    <?php else: ?>
        <a href="<?= htmlspecialchars($authUrl) ?>">Entrar com Google</a>
    <?php endif; ?>
</body>
</html>
