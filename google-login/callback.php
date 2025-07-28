<?php
require 'config.php';

if (!isset($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit('Estado inválido!');
}

if (isset($_GET['error'])) {
    exit('Erro: ' . htmlspecialchars($_GET['error_description']));
}

try {
    // Obtem token com o "code" retornado
    $token = $google->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Recupera dados do usuário
    $user = $google->getResourceOwner($token);
    $dados = $user->toArray();

    $_SESSION['usuario'] = [
        'id' => $dados['sub'],
        'nome' => $dados['name'],
        'email' => $dados['email'],
        'foto' => $dados['picture'],
    ];

    // Aqui você pode salvar no banco de dados, se necessário
    header('Location: index.php');
    exit;

} catch (Exception $e) {
    exit('Erro ao autenticar: ' . $e->getMessage());
}
?>