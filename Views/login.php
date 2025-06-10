<?php include 'partials/header.php'; ?>

<h1>Login</h1>
<form action="/auth/login" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit">Entrar</button>
</form>

<p><a href="recuperar_senha.php">Esqueceu a senha?</a></p>
<p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>

<?php include 'partials/footer.php'; ?>

