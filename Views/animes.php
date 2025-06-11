<?php 
    include 'partials/header.php';
    
    require_once __DIR__ . "/../models/obra.php";

    $animes = Obra::listar();
?>

<h1>Catálogo de Animes</h1>
<div class="animes-grid">
    <?php foreach ($animes as $anime): ?>
        <div class="anime-card">
            <img src="<?= $anime['link_imagem'] ?>" alt="<?= htmlspecialchars($anime['titulo']) ?>">
            <h3><?= htmlspecialchars($anime['titulo']) ?></h3>
            <p><?= htmlspecialchars($anime['descricao']) ?></p>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($anime['genero']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'partials/footer.php'; ?>
