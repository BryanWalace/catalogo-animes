<?php include 'partials/header.php'; ?>

<h1>Cadastro</h1>

<form action="<?= BASE_URL ?>/auth/register" method="POST">

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
    <select name="categoria_preferida" required>
        <option value="Ação">Ação</option>
        <option value="Aventura">Aventura</option>
        <option value="Comédia">Comédia</option>
        <option value="Drama">Drama</option>
        <option value="Fantasia">Fantasia</option>
        <option value="Romance">Romance</option>
        <option value="Terror">Terror</option>
        <option value="Esporte">Esporte</option>
        <option value="Ficção Científica">Ficção Científica</option>
    </select>

    <button type="submit">Cadastrar</button>
</form>

<?php include 'partials/footer.php'; ?>
