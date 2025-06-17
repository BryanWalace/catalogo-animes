<?php 
    include 'partials/header.php';
?>
<h1>Animes de <?= htmlspecialchars($generoDecodificado) ?></h1>
<a href="<?= BASE_URL ?>/categorias" class="link-como-botao">Voltar para todas as categorias</a>

<div class="animes-grid">
    <?php if (!empty($animes)): ?>
        <?php foreach ($animes as $anime): ?>
            <a href="<?= BASE_URL ?>/animes/ver/<?= $anime['id_obra'] ?>" class="anime-card-link">
                <div class="anime-card">
                    <img src="<?= htmlspecialchars($anime['link_imagem']) ?>" alt="<?= htmlspecialchars($anime['titulo']) ?>">
                    <h3><?= htmlspecialchars($anime['titulo']) ?></h3>
                    <p><strong>Tipo:</strong> <?= htmlspecialchars($anime['tipo_midia']) ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum anime encontrado nesta categoria.</p>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>
