<?php 
    include 'partials/header.php';
    
    require_once __DIR__ . "/../models/obra.php";

    $animes = Obra::listar();
?>

<h1>Catálogo de Animes</h1>
<div class="animes-grid">
    <?php foreach ($animes as $anime): ?>
        <a href="<?= BASE_URL ?>/animes/ver/<?= $anime['id_obra'] ?>" class="anime-card-link">
            <div class="anime-card">
                <img src="<?= $anime['link_imagem'] ?>" alt="<?= $anime['titulo'] ?>">
                <h3><?= $anime['titulo'] ?></h3>
                <p><strong>Gênero:</strong> <?= $anime['genero'] ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php include 'partials/footer.php'; ?>
