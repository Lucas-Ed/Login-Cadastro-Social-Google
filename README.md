# 🔐 Login e Cadastro Social com Google usando PHP

[![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![Google Sign-In](https://img.shields.io/badge/Google%20Sign--In-Enabled-4285F4?style=flat-square&logo=google)](https://developers.google.com/identity)


> Autenticação simplificada e moderna com a API de login social do Google, desenvolvida em PHP puro. Ideal para projetos que desejam uma integração rápida com contas Google e uma UX amigável.

---

## 🚀 Tecnologias Utilizadas

- ✅ PHP 7.4 ou superior
- ✅ Google OAuth 2.0
- ✅ Bootstrap 5 (para o front-end de cadastro)
- ✅ Composer (para gerenciamento de dependências)
- ✅ OAuth 2.0 Client para autenticação segura

---

## 🧠 Funcionalidades

- 🔐 Login seguro via conta Google
- 👤 Cadastro automático do usuário com os dados da conta Google
- ☁️ Sessões seguras via PHP
- 🧹 Código limpo, comentado e fácil de adaptar

---

## 🛠️ Instalação

```bash
# 1. Clone o repositório
git clone git@github.com:Lucas-Ed/Login-Cadastro-Social-Google.git

# Entre no diretório do projeto que deseja usar:
cd google-cadastro

# ou

cd google-login

# 2. Instale as dependências:
composer install

# 3. Configure o Google API:
# - Vá até https://console.developers.google.com
# - Crie um projeto e ative a API "Google+ API"
# - Gere as credenciais OAuth 2.0
# - Configure a URI de redirecionamento: http://localhost/login-google/callback.php
# 4. Coloque suas credenciais no arquivo `.env`

# 5.È necesário criar um banco de dados MySQL com os atributos do arquivo `callback.php`, e configurar o arquivo `config.env` do projeto google-cadastro com as credenciais do banco.

# 6. Inicie o servidor embutido do PHP, no projeto que desjar, no projeto de login ou cadastro com o comando no terminal:
php -S localhost:8000
```

## 📝 Licença

Este projeto está sob a licença MIT.

Feito com 💜 por [Lucas Eduardo.](https://linktr.ee/lucas.007)