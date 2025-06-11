<?php include 'partials/header.php'; ?>

<h1>Catálogo de Animes</h1>
<div class="animes-grid">
    <?php foreach ($animes as $anime): ?>
        <div class="anime-card">
            <img src="/assets/imagens/<?= $anime['imagem'] ?>" alt="<?= htmlspecialchars($anime['titulo']) ?>">
            <h3><?= htmlspecialchars($anime['titulo']) ?></h3>
            <p><?= htmlspecialchars($anime['descricao']) ?></p>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($anime['categoria']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'partials/footer.php'; ?>
