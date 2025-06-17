<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/banco.php';

require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/AnimeController.php';
require_once __DIR__ . '/controllers/CategoriaController.php';
require_once __DIR__ . '/controllers/AvaliacaoController.php';

$request = $_GET['url'] ?? '';

$segments = explode('/', $request);

$main_route = $segments[0] ?? 'home';

match ($main_route) {
    'home' => HomeController::index(),
    
    'login' => AuthController::login(),
    'auth' => match($segments[1] ?? '') {
        'login' => AuthController::processarLogin(),
        'register' => AuthController::processarRegister(),
        default => header('Location: ' . BASE_URL . '/'),
    },
    'logout' => AuthController::logout(),
    'cadastro' => AuthController::register(),
    
    'animes' => match($segments[1] ?? 'index') {
        'index' => AnimeController::index(),
        'ver' => AnimeController::ver($segments[2] ?? null),
        'novo' => AnimeController::novo(),
        'criar' => AnimeController::criar(),
        'editar' => AnimeController::editar($segments[2] ?? null),
        'atualizar' => AnimeController::atualizar(),
        'apagar' => AnimeController::apagar($segments[2] ?? null),
        default => header('Location: ' . BASE_URL . '/animes'),
    },
    
    'categorias' => match($segments[1] ?? 'index') {
        'index' => CategoriaController::index(),
        'ver' => CategoriaController::ver($segments[2] ?? null),
        default => header('Location: ' . BASE_URL . '/categorias'),
    },

    'avaliacoes' => match($segments[1] ?? '') {
        'criar' => AvaliacaoController::criar(),
        default => header('Location: ' . BASE_URL . '/'),
    },
    
    'admin' => AnimeController::adminPanel(),

    default => HomeController::index(),
};

exit;
