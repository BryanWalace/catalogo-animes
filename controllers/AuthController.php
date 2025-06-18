<?php
// Inclui o arquivo de configuração para ter acesso à constante BASE_URL
require_once __DIR__ . '/../config/banco.php';
require_once __DIR__ . '/../models/usuario.php';

class AuthController {

    // Exibe a view de login
    public static function login() {
        require __DIR__ . '/../views/login.php';
    }
    
    // Exibe a view de cadastro
    public static function register() {
        require __DIR__ . '/../views/cadastro.php';
    }

    // Processa a tentativa de login
    public static function processarLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            if (Usuario::autenticao($email, $senha)) {
                // CORREÇÃO: Adicionado BASE_URL ao redirecionamento de sucesso
                $redirect_url = ($_SESSION['tipo_usuario'] === 'admin') ? '/admin' : '/';
                header("Location: " . BASE_URL . $redirect_url);
                exit;
            } else {
                // CORREÇÃO: Adicionado BASE_URL ao redirecionamento de erro
                header("Location: " . BASE_URL . "/login?erro=1");
                exit;
            }
        }
    }
    
    // Processa o novo cadastro
    public static function processarRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Usuario::cadastrar(
                $_POST['nome'],
                $_POST['email'],
                $_POST['senha'],
                $_POST['cpf'],
                $_POST['nascimento'],
                $_POST['categoria_preferida']
            );
            // CORREÇÃO: Adicionado BASE_URL ao redirecionamento pós-cadastro
            header("Location: " . BASE_URL . "/login?sucesso=1");
            exit;
        }
    }

    // Faz o logout do usuário
    public static function logout() {
        session_start();
        session_destroy();
        // CORREÇÃO: Adicionado BASE_URL ao redirecionamento de logout
        header("Location: " . BASE_URL . "/login");
        exit;
    }
}
