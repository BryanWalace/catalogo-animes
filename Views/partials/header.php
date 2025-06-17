<?php
require_once __DIR__ . '/../../config/banco.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>AniStream</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="<?= BASE_URL ?>/">Início</a>
            <a href="<?= BASE_URL ?>/animes">Animes</a>
            <a href="<?= BASE_URL ?>/categorias">Categorias</a>

            <?php if (isset($_SESSION['id_usuario'])): ?>
                <?php if ($_SESSION['tipo_usuario'] === 'admin'): ?>
                    <a href="<?= BASE_URL ?>/admin">Painel Admin</a>
                <?php endif; ?>
                <a href="<?= BASE_URL ?>/logout">Logout</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>/login">Login</a>
                <a href="<?= BASE_URL ?>/cadastro">Cadastre-se</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
