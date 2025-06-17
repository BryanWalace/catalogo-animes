<?php 
// O header já inclui a BASE_URL
include __DIR__ . '/../partials/header.php'; 

// A variável $obra com os dados do anime é fornecida pelo AnimeController::editar()
?>

<h1>Editar Anime: <?= htmlspecialchars($obra->titulo) ?></h1>

<form action="<?= BASE_URL ?>/animes/atualizar" method="POST">
    
    <!--enviar o ID da obra que está sendo editada -->
    <input type="hidden" name="id_obra" value="<?= $obra->id_obra ?>">

    <label>Titulo</label>
    <input type="text" name="titulo" value="<?= $obra->titulo ?>" required>

    <label>Tipo de Midia:</label>
    <select name="tipo_midia" required>
        <option value="Anime" <?= $obra->tipo_midia == 'Anime' ? 'selected' : '' ?>>Anime</option>
        <option value="Filme" <?= $obra->tipo_midia == 'Filme' ? 'selected' : '' ?>>Filme</option>
        <option value="OVA" <?= $obra->tipo_midia == 'OVA' ? 'selected' : '' ?>>OVA</option>
    </select>

    <label>Genero</label>
    <input type="text" name="genero" value="<?= $obra->genero ?>" required>

    <label>Duracao</label>
    <input type="text" name="duracao" value="<?= $obra->duracao ?>" required>

    <label>Descricao</label>
    <textarea name="descricao" required><?= $obra->descricao ?></textarea>

    <label>Link da Imagem</label>
    <input type="text" name="link_imagem" value="<?= $obra->link_imagem ?>" required>

    <button type="submit">Atualizar</button>
</form>

<?php include __DIR__ . '/../partials/footer.php'; ?>
