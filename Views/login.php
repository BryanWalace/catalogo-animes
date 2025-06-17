<?php 
    include 'partials/header.php'; 
?>

<h1>Login</h1>

<form action="<?= BASE_URL ?>/auth/login" method="POST">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="submit">Entrar</button>
</form>

<p>Não tem conta? <a href="<?= BASE_URL ?>/cadastro">Cadastre-se</a></p>
