<?php include 'partials/header.php'; ?>

<h1>Cadastro</h1>
<form action="/auth/register" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Senha:</label>
    <input type="password" name="senha" required>

    <label>CPF:</label>
    <input type="text" name="cpf" required>

    <label>Data de Nascimento:</label>
    <input type="date" name="nascimento" required>

    <label>Categoria Preferida:</label>
    <select name="categoria_id">
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nome']) ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Cadastrar</button>
</form>

<?php include 'partials/footer.php'; ?>
