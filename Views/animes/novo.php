<?php 
include __DIR__ . '/../partials/header.php'; 
?>

<h1>Novo Anime</h1>
<form action="<?= BASE_URL ?>/animes/criar" method="POST">
    <label>Titulo</label>
    <input type="text" name="titulo" required>

    <label>Tipo de Midia:</label>
    <select name="tipo_midia" required>
        <option value="Anime">Anime</option>
        <option value="Filme">Filme</option>
        <option value="OVA">OVA</option>
    </select>

    <label>Genero</label>
    <select name="genero" required>
        <option value="">Selecione um gênero</option>
        <option value="Ação">Ação</option>
        <option value="Aventura">Aventura</option>
        <option value="Comédia">Comédia</option>
        <option value="Drama">Drama</option>
        <option value="Esporte">Esporte</option>
        <option value="Fantasia">Fantasia</option>
        <option value="Ficção Científica">Ficção Científica</option>
        <option value="Romance">Romance</option>
        <option value="Slice of Life">Slice of Life</option>
        <option value="Suspense">Suspense</option>
        <option value="Terror">Terror</option>
    </select>

    <label>Duracao</label>
    <input type="text" name="duracao" required>

    <label>Descricao</label>
    <textarea name="descricao" required></textarea>

    <label>Link da Imagem</label>
    <input type="text" name="link_imagem" required>

    <button type="submit">Cadastrar</button>
</form>

<?php 
include __DIR__ . '/../partials/footer.php'; 
?>
