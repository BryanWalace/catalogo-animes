<?php 
    include 'partials/header.php'; 

    require_once __DIR__ . "/../models/obra.php";

    $categorias = Obra::buscarPorGenero("Ação");
?>

<h1>Categorias</h1>
<div class="animes-grid">
    <?php foreach ($categorias as $anime): ?>
        <div class="anime-card">
            <img src="<?= $anime['link_imagem'] ?>" alt="<?= htmlspecialchars($anime['titulo']) ?>">
            <h3><?= htmlspecialchars($anime['titulo']) ?></h3>
            <p><?= htmlspecialchars($anime['descricao']) ?></p>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($anime['genero']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'partials/footer.php'; ?>

