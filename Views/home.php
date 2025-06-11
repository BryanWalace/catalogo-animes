<?php include 'partials/header.php'; ?>

<section class="hero">
    <h1>Bem-vindo ao AniStream</h1>
    <p>Explore o melhor dos animes em um só lugar!</p>
    <a href="animes.php" class="btn">Ver Catálogo</a>
</section>

<section class="categorias-destaque">
    <h2>Categorias em Destaque</h2>
    <div class="categorias-lista">
        <?php foreach ($categorias as $categoria): ?>
            <a href="/categorias/<?= $categoria['id'] ?>" class="categoria">
                <?= htmlspecialchars($categoria['nome']) ?>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
