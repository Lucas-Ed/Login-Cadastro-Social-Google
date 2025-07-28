<?php
require_once __DIR__ . '/vendor/autoload.php';

use League\OAuth2\Client\Provider\Google;
use Dotenv\Dotenv;

session_start();

// Carrega variáveis de ambiente
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Cria provedor OAuth2 do Google
$google = new Google([
    'clientId'     => $_ENV['GOOGLE_CLIENT_ID'],
    'clientSecret' => $_ENV['GOOGLE_CLIENT_SECRET'],
    'redirectUri'  => $_ENV['GOOGLE_REDIRECT_URI'],
]);
?>