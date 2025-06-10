<?php include 'partials/header.php'; ?>

<h1>Categorias</h1>
<ul class="categorias-lista">
    <?php foreach ($categorias as $categoria): ?>
        <li>
            <a href="/categorias/<?= $categoria['id'] ?>">
                <?= htmlspecialchars($categoria['nome']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include 'partials/footer.php'; ?>

