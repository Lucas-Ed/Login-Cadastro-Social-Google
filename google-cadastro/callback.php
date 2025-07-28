<?php
require 'config.php';
require 'db.php';

if (!isset($_GET['state']) || $_GET['state'] !== $_SESSION['oauth2state']) {
    unset($_SESSION['oauth2state']);
    exit('Estado inválido!');
}

try {
    $token = $google->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    $user = $google->getResourceOwner($token);
    $dados = $user->toArray();

    $googleId = $conn->real_escape_string($dados['sub']);
    $nome     = $conn->real_escape_string($dados['name']);
    $email    = $conn->real_escape_string($dados['email']);

    $query = "SELECT * FROM usuarios WHERE google_id = '$googleId' OR email = '$email' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        $fotourl = $conn->real_escape_string($dados['picture']);

        $stmt = $conn->prepare("
            INSERT INTO usuarios (nome, email, tipo, termos, google_id, login_social, foto_url)
            VALUES (?, ?, 'cliente', 1, ?, 'google', ?)
        ");
        $stmt->bind_param('ssss', $nome, $email, $googleId, $fotourl);
        $stmt->execute();

        $usuario = [
            'idusuarios' => $stmt->insert_id,
            'nome'       => $nome,
            'email'      => $email,
            'foto_url'   => $fotourl
        ];
    }

    $_SESSION['usuario'] = [
        'id'    => $usuario['idusuarios'],
        'nome'  => $usuario['nome'],
        'email' => $usuario['email'],
        'foto'  => $usuario['foto_url'] ?? null
    ];

    header('Location: index.php');
    exit;

} catch (Exception $e) {
    exit('Erro ao autenticar: ' . $e->getMessage());
}
?>