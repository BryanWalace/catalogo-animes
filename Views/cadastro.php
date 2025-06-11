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
    <select name="categoria_id" required>
        <option value="1">Ação</option>
        <option value="2">Aventura</option>
        <option value="3">Comédia</option>
        <option value="4">Drama</option>
        <option value="5">Fantasia</option>
        <option value="6">Romance</option>
        <option value="7">Terror</option>
        <option value="8">Esporte</option>
        <option value="9">Ficção Científica</option>
    </select>

    <button type="submit">Cadastrar</button>
</form>

<?php include 'partials/footer.php'; ?>
