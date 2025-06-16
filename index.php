<?php

// Mini gerenciador de rotas usando match
$url = $_GET['url'] ?? null;
$url = explode("/", $url ?? '');

$pagina = $url[0] ?? '';

if (isset($url[1])) {
    $pagina = "{$url[0]}/{$url[1]}";
}

if (!isset($_SESSION)) {
    session_start();
}

// Inclui controllers
require __DIR__ . '/controllers/HomeController.php';
require __DIR__ . '/controllers/AuthController.php';
require __DIR__ . '/controllers/AnimeController.php';
require __DIR__ . '/controllers/CategoriaController.php';
require __DIR__ . '/controllers/PostController.php';
require __DIR__ . '/controllers/UserController.php';

match ($pagina) {
    // Autenticação
    'login'         => AuthController::login(),
    'logout'        => AuthController::logout(),

    // Animes
    'animes'        => AnimeController::index(),
    'animes/novo'   => AnimeController::novo(),
    'animes/criar'  => AnimeController::criar(),
    'animes/apagar' => AnimeController::apagar($url[2] ?? null),

    // Categorias
    'categorias'            => CategoriaController::index(),
    'categorias/novo'       => CategoriaController::novo(),
    'categorias/apagar'     => CategoriaController::apagar($url[2] ?? null),
    'categorias/criar'      => CategoriaController::criar(),

    // Posts se necessario pra quem for fazer essa parte, (não é obrigatório)
    'posts'                 => PostController::index(),
    'posts/novo'            => PostController::novo(),
    'posts/apagar'          => PostController::apagar($url[2] ?? null),
    'posts/criar'           => PostController::criar(),

    // Usuários
    'usuarios'              => UserController::index(),
    'usuarios/novo'         => UserController::novo(),
    'usuarios/apagar'       => UserController::apagar($url[2] ?? null),
    'usuarios/criar'        => UserController::criar(),

    // Página inicial
    default                 => HomeController::index(),
};

exit;