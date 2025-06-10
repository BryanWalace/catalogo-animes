<?php include 'partials/header.php'; ?>

<h1>Recuperar Senha</h1>
<form action="/auth/recuperar" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">

    <label>CPF:</label>
    <input type="text" name="cpf" required>

    <label>Data de Nascimento:</label>
    <input type="date" name="nascimento" required>

    <button type="submit">Recuperar Senha</button>
</form>

<?php include 'partials/footer.php'; ?>
