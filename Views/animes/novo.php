<?php include 'partials/header.php'; ?>

<h1>Novo Anime</h1>
<form action="/animes/criar" method="POST">
    <label>Titulo</label>
    <input type="text" name="titulo" required>

    <label>Tipo de Midia:</label>
    <input type="text" name="tipo_midia" required>

    <label>Genero</label>
    <input type="text" name="genero" required>

    <label>Duracao</label>
    <input type="text" name="duracao" required>

    <label>Descricao</label>
    <textarea name="descricao" required></textarea>

    <label>Link da Imagem</label>
    <input type="text" name="link_imagem" required>

    <button type="submit">Cadastrar</button>
</form>

<?php include 'partials/footer.php'; ?>